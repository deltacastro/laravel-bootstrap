<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th># <br> Sucursal</th>
                <th>Estado</th>
                <th>Nombre</th>
                <th>Horarios</th>
                <th>Notas</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($stores as $store)
                <tr>
                    <td>{{ $store->number }}</td>
                    <td>{{ $store->state->name }}</td>
                    <td>{{ $store->name }}</td>
                    <td>
                        <p class="mb-0" style="white-space: pre-wrap;">{{ $store->schedule }}</p>
                    </td>
                    <td>
                        <p class="mb-0" style="white-space: pre-wrap;">{{ $store->extra_data }}</p>
                    </td>
                    <td>
                        <a
                            href="#"
                            class="btn border border-2 shadow-sm border-yellow fw-bold text-gray-800 editar"
                            data-url="{{ route('admin.catalogue.store.edit', [$store->id]) }}"
                            data-target="#store-offcanvas"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasStore">Editar</a>

                        <a href="#"
                            class="btn border border-2 shadow-sm border-red fw-bold text-gray-800"
                            onclick="event.preventDefault(); document.getElementById('delete-store-{{ $store->id }}').submit();"
                        >
                            Eliminar
                        </a>
                        <form id="delete-store-{{ $store->id }}"
                            action="{{ route('admin.catalogue.store.delete', [$store->id]) }}"
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
