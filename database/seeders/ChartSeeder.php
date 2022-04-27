<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'name' => 'wordpress',
            'repo' => 'bitnami',
            'icon' => 'https://bitnami.com/assets/stacks/wordpress/img/wordpress-stack-220x234.png',
            'description' => 'WordPress是一個以PHP和MySQL為平台的自由開源的部落格軟體和內容管理系統。',
        ], [
            'name' => 'dokuwiki',
            'repo' => 'bitnami',
            'icon' => 'https://bitnami.com/assets/stacks/dokuwiki/img/dokuwiki-stack-220x234.png',
            'description' => 'DokuWiki是一個針對小公司文件需求而開發的Wiki引擎，用程序設計語言PHP開發，並以GPL 2發布。',
        ]];
        foreach ($data as $d) {
            DB::table('charts')->insert($d);
        }
    }
}
