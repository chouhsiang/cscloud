<?php

namespace App\Services;

use App\Models\Chart;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Auth;

class HelmService
{

    public function shell($command)
    {
        $process = new Process(explode(' ', $command));

        $process->run();
        if (!$process->isSuccessful()) {
            dd($process->getErrorOutput());
        }
        return json_decode($process->getOutput(), true);
    }

    public static function add_repo()
    {
        $cmd = "helm repo add bitnami https://charts.bitnami.com/bitnami";
        return self::shell($cmd);
    }

    public static function list()
    {
        $user = Auth::user()->username;
        $data = self::shell("helm list -n $user -o json");

        foreach ($data as $i => $d) {
            $cmd = "helm get values {$d['name']} -n $user -o json";
            $data[$i]['domain'] =  self::shell($cmd)['ingress']['hostname'];
            $data[$i]['icon'] =  Chart::where('name', explode('-', $data[$i]['chart'])[0])->first()->icon;
        }
        return $data;
    }


    public static function install($name, $chart, $env)
    {

       
        $user = Auth::user()->username;
        $repo = Chart::firstwhere('name', $chart)->value('repo');
        $env = join(' ', preg_filter('/^/', '--set ', $env));
        $cmd = "helm install -n $user $env --create-namespace $user-$name $repo/$chart";
        return self::shell($cmd);
    }

    public static function status($name)
    {
        $user = Auth::user()->username;
        $cmd = "helm list -f $name -n $user -o json";
        $list_data = self::shell($cmd)[0];

        $cmd = "helm status $name -n $user -o json";
        $status_data = self::shell($cmd);

        $data = array_merge($list_data,  $status_data);
        $data['chart_name'] = explode('-', $data['chart'])[0];
        $data['chart_version'] = explode('-', $data['chart'])[1];
        $data['env'] = self::array_flatten($data['config']);
        $data['icon'] =  Chart::firstwhere('name', $data['chart_name'])->icon;
        $data['domain'] = explode('-', explode('.', $data['config']['ingress']['hostname'])[0])[1];
        return $data;
    }

    public static function uninstall($name) {
        $user = Auth::user()->username;
        $cmd = "helm uninstall $name -n $user";
        return self::shell($cmd);
    }

    function array_flatten($array, $prefix = '')
    {
        $result = array();
        foreach ($array as $key => $value) {
            if ($key == 'ingress') {
                continue;
            }
            if (is_array($value)) {
                $result = $result + self::array_flatten($value, $prefix . $key . '.');
            } else if (is_bool($value)) {
                $result[$prefix . $key] = $value ? 'true' : 'false';
            } else {
                $result[$prefix . $key] = $value;
            }
        }
        return $result;
    }
}
