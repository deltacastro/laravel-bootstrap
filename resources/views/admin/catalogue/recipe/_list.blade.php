<div class="table-responsive">
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Ingredientes</th>
                <th>Descripción</th>
                <th>Contenido</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->name }}</td>
                    <td>
                        @foreach ($recipe->ingredients ?? [] as $ingredient)
                            <p class="mb-1">
                                <span class="badge bg-primary text-dark">{{ $ingredient->name }}</span>
                            </p>
                        @endforeach
                    </td>
                    <td>
                        <p class="mb-0" style="white-space: pre-wrap;">{{ $recipe->description }}</p>
                    </td>
                    <td>
                        <p class="mb-0" style="white-space: pre-wrap;">{{ $recipe->content }}</p>
                    </td>
                    <td>
                        <a
                            href="#"
                            class="btn border border-2 shadow-sm border-yellow fw-bold text-gray-800 editar"
                            data-url="{{ route('admin.catalogue.recipe.edit', [$recipe->id]) }}"
                            data-target="#recipe-offcanvas"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRecipe">Editar</a>

                        <a href="#"
                            class="btn border border-2 shadow-sm border-red fw-bold text-gray-800"
                            onclick="event.preventDefault(); document.getElementById('delete-recipe-{{ $recipe->id }}').submit();"
                        >
                            Eliminar
                        </a>
                        <form id="delete-recipe-{{ $recipe->id }}"
                            action="{{ route('admin.catalogue.recipe.delete', [$recipe->id]) }}"
                            method="POST"
                            style="display: none;"
                        >
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>
