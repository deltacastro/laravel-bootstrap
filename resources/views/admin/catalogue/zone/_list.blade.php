<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th width="75">Nombre</th>
                <th width="25">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($zones as $zone)
                <tr>
                    <td>{{ $zone->name }}</td>
                    <td>
                        <a
                            href="#"
                            class="btn border border-2 shadow-sm border-yellow fw-bold text-gray-800 editar"
                            data-url="{{ route('admin.catalogue.zone.edit', [$zone->id]) }}"
                            data-target="#zone-offcanvas"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasZone">Editar</a>

                        <a href="#"
                            class="btn border border-2 shadow-sm border-red fw-bold text-gray-800"
                            onclick="event.preventDefault(); document.getElementById('delete-zone-{{ $zone->id }}').submit();"
                        >
                            Eliminar
                        </a>
                        <form id="delete-zone-{{ $zone->id }}"
                            action="{{ route('admin.catalogue.zone.delete', [$zone->id]) }}"
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
