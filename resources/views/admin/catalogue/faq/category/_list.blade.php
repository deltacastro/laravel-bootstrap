<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th width="75">Nombre</th>
                <th width="25">Opciones</th>
            </tr>
        </thead>
        <tbody>

        @forelse ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <a
                        href="#"
                        class="btn border border-2 shadow-sm border-yellow fw-bold text-gray-800 editar"
                        data-url="{{ route('admin.catalogue.category.edit', [$category->id]) }}"
                        data-target="#category-offcanvas"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasCategory">Editar</a>

                    <a href="#"
                        class="btn border border-2 shadow-sm border-red fw-bold text-gray-800"
                        onclick="event.preventDefault(); document.getElementById('delete-category-{{ $category->id }}').submit();"
                    >
                        Eliminar
                    </a>
                    <form id="delete-category-{{ $category->id }}"
                        action="{{ route('admin.catalogue.category.delete', [$category->id]) }}"
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
