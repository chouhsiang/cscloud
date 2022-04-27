<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RenokiCo\PhpK8s\KubernetesCluster;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Services\HelmService as Helm;
use Illuminate\Support\Str;
use App\Models\Chart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AppController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Helm::list();
        return view('apps.index', compact('data'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chart = Chart::firstwhere('name', request()->chart);
        if (!$chart) {
            return '<script type="text/javascript">alert("App 不存在");history.back();</script>';
        }
        return view('apps.create', compact('chart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:50', 'lower_alpha_num'],
            'domain' => ['required', 'string', 'max:20', 'lower_alpha_num'],
            'env_key' => ['array'],
            'env_key.*' => ['string', 'nullable', 'max:30'],
            'env_value' => ['array'],
            'env_value.*' => ['string', 'nullable', 'max:30'],
        ])->validate();

        $user = Auth::user()->username;
        $domain =  $request->domain;
        $envs = [
            'ingress.enabled=true',
            'wordpressSkipInstall=true',
            "ingress.hostname=$user-$domain.nycucs.cloud",
            'persistence.enabled=false',
            'mariadb.primary.persistence.enabled=false'
        ];

        $e = array_filter(array_combine($request->env_key, $request->env_value));
        foreach ($e as $key => $value) {
            array_push($envs, "$key=$value");
        }

        Helm::install($request->name, $request->chart, $envs);


        return redirect('apps');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chart = Helm::status($id);
        return view('apps.show', compact('chart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chart = Helm::status($id);
        return view('apps.edit', compact('chart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Helm::uninstall($id);
        return redirect('apps');
    }
}
