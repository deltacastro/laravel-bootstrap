<div id="userTable" class="table-responsive">
    <table class="table" style="white-space:nowrap;">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Roles</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="align-middle text-gray-700">
                    <td>{{ $user->personFullName }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach ($user->roles as $role)
                            <span class="badge bg-gray-600">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td class="text-end">

                        <a
                            href="#"
                            class="btn btn-sm btn-outline-primary fw-bold showOffcanvas"
                            data-url="{{ route('admin.user.permission.edit', [$user->id]) }}"
                            data-titletext="Permisos del usuario {{ $user->name }}">Permisos</a>

                        <a
                            href="#"
                            class="btn btn-sm btn-outline-yellow fw-bold showOffcanvas"
                            data-url="{{ route('admin.user.edit', [$user->id]) }}"
                            data-titletext="Editar usuario {{ $user->personFullname }}">Editar</a>

                        <a href="#"
                            class="btn btn-sm btn-danger fw-bold eliminar"
                            data-bs-toggle="modal" data-bs-target="#confirmationModal"
                            data-targetform="#delete-form-{{ $user->id }}"
                            data-text="Desea eliminar el usuario {{ $user->personFullName }}"
                        >
                            Eliminar
                        </a>
                        <form id="delete-form-{{ $user->id }}" action="{{ route('admin.user.delete', [$user->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
