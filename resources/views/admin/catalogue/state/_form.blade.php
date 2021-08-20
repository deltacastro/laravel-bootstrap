<div class="form-floating mb-3">
    <select name="state[zone_id]" class="form-select" id="zone_id" required>
        <option selected disabled>Seleccione una zona</option>
        @foreach ($zones as $zone)
            <option value="{{ $zone->id }}" {{ isset($state) && $state->zone_id == $zone->id ? 'selected' : '' }}>
                {{ $zone->name }}
            </option>
        @endforeach
    </select>
    <label for="floatingSelect">Zonas</label>
</div>

<x-form.input type="text" label="Nombre" id="state-name"
    name="state[name]" error-validator="state.name" value="{{ old('state.name') ?? $state->name ?? '' }}"/>
