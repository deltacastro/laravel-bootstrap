<x-form.input type="text" label="Nombre" id="recipe-name"
    name="recipe[name]" error-validator="recipe.name" value="{{ old('recipe.name') ?? $recipe->name ?? '' }}"/>

<x-form.text-area style="height: 10vh;" label="Descripción" id="recipe-description"
    name="recipe[description]" error-validator="recipe.description"
    >{{ old('recipe.description') ?? $recipe->description ?? '' }}</x-form.text-area>

<x-form.text-area style="height: 10vh;" label="Contenido" id="recipe-content"
    name="recipe[content]" error-validator="recipe.content"
    >{{ old('recipe.content') ?? $recipe->content ?? '' }}</x-form.text-area>

<label for="">Agregar ingredientes</label>
<select class="form-select ingredients-select" aria-label=".form-select example" name="ingredients[]" multiple>
    @foreach ($ingredients ?? [] as $ingredient)
        <option value="{{ $ingredient->id }}" {{ isset($recipe_ingredients_id) && in_array($ingredient->id, $recipe_ingredients_id) ? 'selected' : '' }}>
            {{ $ingredient->name }}
        </option>
    @endforeach
</select>
