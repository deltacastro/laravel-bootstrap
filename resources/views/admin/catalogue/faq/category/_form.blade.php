<x-form.input type="text" label="Nombre" id="category-name"
    name="category[name]" error-validator="category.name" value="{{ old('category.name') ?? $category->name ?? '' }}"/>
