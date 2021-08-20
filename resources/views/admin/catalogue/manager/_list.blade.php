<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Estado/Sucursal</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($managers as $manager)
                <tr>
                    <td>{{ $manager->person->fullName }}</td>
                    <td>
                        @foreach ($manager->person->phones ?? [] as $phone)
                            <span class="badge bg-info text-dark">{{ $phone }}</span>
                        @endforeach
                    </td>
                    <td>{{ $manager->person->email }}</td>
                    <td>{{ $manager->store->state->name }} - {{ $manager->store->name }}</td>
                    <td>
                        <a
                            href="#"
                            class="btn border border-2 shadow-sm border-yellow fw-bold text-gray-800 editar"
                            data-url="{{ route('admin.catalogue.manager.edit', [$manager->id]) }}"
                            data-target="#manager-offcanvas"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasManager">Editar</a>

                        <a href="#"
                            class="btn border border-2 shadow-sm border-red fw-bold text-gray-800"
                            onclick="event.preventDefault(); document.getElementById('delete-manager-{{ $manager->id }}').submit();"
                        >
                            Eliminar
                        </a>
                        <form id="delete-manager-{{ $manager->id }}"
                            action="{{ route('admin.catalogue.manager.delete', [$manager->id]) }}"
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
