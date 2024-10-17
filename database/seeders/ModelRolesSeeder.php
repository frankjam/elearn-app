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
        DB::table('permissions')->insert([
            "INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (3, 'App\\Models\\User', 1);"
        ]);
    }
}
