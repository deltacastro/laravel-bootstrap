<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $crearusuario = $this->command->ask('Desea crear un usuario super admin? (y)si (n)no');
        if ($crearusuario == 'y') {
            $user = array();
            // $this->command->comment('');
            // $this->command->comment('Se creara el usuario ' . $role->uiname .'.');
            $this->command->info('...................................');

            // DATOS USUARIO
            // $user['name'] = $this->command->ask('ingrese username');
            $user['email'] = $this->command->ask('Correo del usuario');
            $pass = false;
            $password = '';
            while ($pass != true) {
                $password = $this->command->secret('Password');
                $pass = $password === $this->command->secret('confirma');
                if ($pass === false) {
                    $this->command->info('las contraseñas no coinciden.');
                } else {
                    $user['password'] = $password;
                }
            }

            // DATOS PERSONA
            $people['name'] = $this->command->ask('Ingrese nombre');
            $people['last_name'] = $this->command->ask('Ingrese apellidos');
            $persona = Person::firstorcreate($people);

            $user['person_id'] = $persona->id;
            $adminUser = User::firstorcreate($user);
            $role = Role::where('name', 'super admin')->first();
            if ($role != null) {
                $this->command->comment('');
                $this->command->comment('Se agrega el usuario al rol ' . $role->uiname .'.');
                $adminUser->assignRole($role);
            }
        } else {
            $this->command->comment('Tranquilo viejo, continuemos....');
        }
    }
}
