<x-form.float.input type="text" label="Nombre" id="role-name"
    name="role[name]" error-validator="role.name" value="{{ old('role.name') ?? $role->name ?? '' }}"/>
