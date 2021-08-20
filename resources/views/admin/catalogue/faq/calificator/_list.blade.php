<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th width="75">Nombre</th>
                <th width="25">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($calificators as $calificator)
                <tr>
                    <td>{{ $calificator->name }}</td>
                    <td>
                        <a
                            href="#"
                            class="btn border border-2 shadow-sm border-yellow fw-bold text-gray-800 editar"
                            data-url="{{ route('admin.catalogue.calificator.edit', [$calificator->id]) }}"
                            data-target="#calificator-offcanvas"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasCalificator">Editar</a>

                        <a href="#"
                            class="btn border border-2 shadow-sm border-red fw-bold text-gray-800"
                            onclick="event.preventDefault(); document.getElementById('delete-calificator-{{ $calificator->id }}').submit();"
                        >
                            Eliminar
                        </a>
                        <form id="delete-calificator-{{ $calificator->id }}"
                            action="{{ route('admin.catalogue.calificator.delete', [$calificator->id]) }}"
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
