<x-form.input type="text" label="Nombre" id="zone-name"
    name="zone[name]" error-validator="zone.name" value="{{ old('zone.name') ?? $zone->name ?? '' }}"/>
