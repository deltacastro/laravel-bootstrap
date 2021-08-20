<div class="form-floating mb-3">
    <select name="store[state_id]" class="form-select" id="store_state_id" required>
        <option selected disabled>Seleccione un estado</option>
        @foreach ($states as $state)
            <option value="{{ $state->id }}" {{ isset($store) && $store->state_id == $state->id ? 'selected' : '' }}>
                {{ $state->name }}
            </option>
        @endforeach
    </select>
    <label for="floatingSelect">Estados</label>
</div>

<x-form.input type="text" label="Nombre" id="store-name"
    name="store[name]" error-validator="store.name" value="{{ old('store.name') ?? $store->name ?? '' }}"/>

<x-form.input type="text" label="Número de sucursal" id="store-number"
    name="store[number]" error-validator="store.number" value="{{ old('store.number') ?? $store->number ?? '' }}"/>

<x-form.text-area style="height: 10vh;" label="Horarios" id="store-schedule"
    name="store[schedule]" error-validator="store.schedule"
    >{{ old('store.schedule') ?? $store->schedule ?? '' }}</x-form.text-area>

<x-form.text-area style="height: 10vh;" label="Notas" id="store-extra_data"
    name="store[extra_data]" error-validator="store.extra_data"
    >{{ old('store.extra_data') ?? $store->extra_data ?? '' }}</x-form.text-area>
