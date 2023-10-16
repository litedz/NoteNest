<?php

namespace notenest\notenest\Database\Seeder;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{

    public function run() {
        DB::table('status_funcs')->insert([
            'status' => 'AWAIT',
        ]);
    }

}
