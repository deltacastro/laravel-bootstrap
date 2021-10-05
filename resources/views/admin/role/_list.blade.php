<div id="roleTable" class="table-responsive">
    <table class="table" style="white-space:nowrap;">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Permisos</th>
                <th width="20%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr class="align-middle fs-5 text-gray-700">
                    <td>{{ $role->name }}</td>
                    <td>
                        @foreach ($role->permissions as $permission)
                            <span class="badge bg-gray-600">{{ $permission->name }}</span>
                        @endforeach
                    </td>
                    <td>

                        <a
                            href="#"
                            class="btn btn-outline-primary fw-bold text-gray-700 showOffcanvas"
                            data-url="{{ route('admin.role.permission.edit', [$role->id]) }}"
                            data-titletext="Permisos del rol {{ $role->name }}">Permisos</a>

                        <a
                            href="#"
                            class="btn btn-outline-yellow fw-bold text-gray-700 showOffcanvas"
                            data-url="{{ route('admin.role.edit', [$role->id]) }}"
                            data-titletext="Editar el rol {{ $role->name }}">Editar</a>

                        <a href="#"
                            class="btn btn-outline-red fw-bold text-gray-700 eliminar"
                            data-bs-toggle="modal" data-bs-target="#confirmationModal"
                            data-targetform="#delete-form-{{ $role->id }}"
                            data-text="Desea eliminar el rol {{ $role->name }}"
                        >
                            Eliminar
                        </a>
                        <form id="delete-form-{{ $role->id }}" action="{{ route('admin.role.delete', [$role->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
