<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timestamp = new Carbon;
        $model = new Permission;

        $data = [
            [
                'name' => 'ver admin usuarios',
                'guard_name' => 'web',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'name' => 'crear usuarios',
                'guard_name' => 'web',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'name' => 'editar usuarios',
                'guard_name' => 'web',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'name' => 'eliminar usuarios',
                'guard_name' => 'web',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],

        ];

        $saved = $model->insertOrIgnore($data);
        $this->command->comment("Se crearon $saved registros para la tabla {$model->getTable()}");
    }
}
