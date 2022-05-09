<p class="h4">Usuario</p>
<x-form.float.input type="email" label="Correo" id="user-email" class="mb-3"
    name="user[email]" error-validator="user.email" value="{{ old('user.email') ?? $user->email ?? '' }}"/>
<x-form.float.input type="text" label="Contraseña" id="user-password" class="mb-3"
    name="user[password]" error-validator="user.password" value="{{ old('user.password') }}"/>
<p class="h4">Datos personales</p>
<x-form.float.input type="text" label="Nombre" id="person-name" class="mb-3"
    name="person[name]" error-validator="person.name" value="{{ old('person.name') ?? $user->person->name ?? '' }}"/>
<x-form.float.input type="text" label="Apellidos" id="person-last_name" class="mb-3"
    name="person[last_name]" error-validator="person.last_name" value="{{ old('person.last_name') ?? $user->person->last_name ?? '' }}"/>
<p class="h4">Asignar Roles</p>
<select class="form-select role-select" aria-label=".form-select-lg example" name="roles[]" multiple>
    @foreach ($roles as $role)
        <option value="{{ $role->id }}" {{ isset($user_roles_id) && in_array($role->id, $user_roles_id) ? 'selected' : '' }}>{{ $role->name }}</option>
    @endforeach
</select>
