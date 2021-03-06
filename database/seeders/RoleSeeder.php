<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timestamp = new Carbon;
        $model = new Role;

        $data = [
            [
                'name' => 'super admin',
                'guard_name' => 'web',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'name' => 'cliente',
                'guard_name' => 'web',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ]
        ];

        $saved = $model->insertOrIgnore($data);
        $this->command->comment("Se crearon $saved registros para la tabla {$model->getTable()}");
    }
}
