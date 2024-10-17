<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('model_has_roles')->insert([
            [
                'role_id' => 3,
                'model_type' => "App\\Models\\User",
                'model_id' => 1,
            ]
        ]);
    }
}
