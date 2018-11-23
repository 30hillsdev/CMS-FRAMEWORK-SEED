<?php

namespace Cms_Framework_Seed;

use DB;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('clients')->insert([
            [
                'id'          => 1,
                'email'       => 'client@30hills.com',
                'password'    => bcrypt('client@cms_framework_seed'),
                'status'      => 'Active',
                'name'        => 'Client',
                'sex'         => 'Male',
                'dob'         => '2014-05-15',
                'api_token'   => str_random(60),
                'designation' => 'Super User',
                'web'         => 'http://cms_framework_seed.org',
                'created_at'  => '2015-09-15',
            ],
        ]);
    }
}
