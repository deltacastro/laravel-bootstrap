<div class="form-floating mb-3">
    <select name="manager[store_id]" class="form-select" id="manager_store_id" required>
        <option selected disabled>Seleccione una sucursal</option>
        @foreach ($stores as $store)
            <option value="{{ $store->id }}" {{ isset($manager) && $manager->store_id == $store->id ? 'selected' : '' }}>
                {{ $store->name }}
            </option>
        @endforeach
    </select>
    <label for="floatingSelect">Sucursales</label>
</div>

<x-form.input type="text" label="Nombre" id="person-name"
    name="person[name]" error-validator="person.name" value="{{ old('person.name') ?? $manager->person->name ?? '' }}"/>

<x-form.input type="text" label="Apellidos" id="person-last_name"
    name="person[last_name]" error-validator="person.last_name" value="{{ old('person.last_name') ?? $manager->person->last_name ?? '' }}"/>

<x-form.input type="email" label="Correo" id="person-email"
    name="person[email]" error-validator="person.email" value="{{ old('person.email') ?? $manager->person->email ?? '' }}"/>

<select class="form-select phones-select" aria-label=".form-select example" name="person[phones][]" multiple>
    @foreach ($manager->person->phones ?? [] as $phone)
        <option value="{{ $phone }}" selected>{{ $phone }}</option>
    @endforeach
</select>
