<div class="form-floating mb-3">
    <select name="fanpage[social_network_id]" class="form-select" id="fanpage-social_network_id" required>
        <option value="1" selected>Facebook</option>
    </select>
    <label for="floatingSelect">Red Social</label>
</div>
<div class="form-floating mb-3">
    <select name="fanpage[state_id]" class="form-select" id="fanpage_state_id" required>
        <option selected disabled>Seleccione un estado</option>
        @foreach ($states as $state)
            <option value="{{ $state->id }}" {{ isset($fanpage) && $fanpage->state_id == $state->id ? 'selected' : '' }}>
                {{ $state->name }}
            </option>
        @endforeach
    </select>
    <label for="floatingSelect">Estados</label>
</div>

<x-form.input type="text" label="Nombre" id="fanpage-name"
    name="fanpage[name]" error-validator="fanpage.name" value="{{ old('fanpage.name') ?? $fanpage->name ?? '' }}"/>

<x-form.input type="text" label="URL" id="fanpage-url"
    name="fanpage[url]" error-validator="fanpage.url" value="{{ old('fanpage.url') ?? $fanpage->url ?? '' }}"/>
