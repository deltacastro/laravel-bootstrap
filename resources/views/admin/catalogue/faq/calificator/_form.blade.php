<x-form.input type="text" label="Nombre" id="calificator-name"
    name="calificator[name]" error-validator="calificator.name" value="{{ old('calificator.name') ?? $calificator->name ?? '' }}"/>
