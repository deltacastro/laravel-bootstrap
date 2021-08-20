<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th width="70">Nombre</th>
                <th width="30">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($states as $state)
                <tr>
                    <td>{{ $state->name }}</td>
                    <td>
                        <a
                            href="#"
                            class="btn border border-2 shadow-sm border-yellow fw-bold text-gray-800 editar"
                            data-url="{{ route('admin.catalogue.state.edit', [$state->id]) }}"
                            data-target="#state-offcanvas"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasState">Editar</a>

                        <a href="#"
                            class="btn border border-2 shadow-sm border-red fw-bold text-gray-800"
                            onclick="event.preventDefault(); document.getElementById('delete-state-{{ $state->id }}').submit();"
                        >
                            Eliminar
                        </a>
                        <form id="delete-state-{{ $state->id }}"
                            action="{{ route('admin.catalogue.state.delete', [$state->id]) }}"
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
