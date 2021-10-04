<div id="userTable" class="table-responsive">
    <table class="table">
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
                <tr class="align-middle fs-5 text-gray-700">
                    <td>{{ $user->personFullName }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach ($user->roles as $role)
                            <span class="badge bg-gray-600">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a
                            href="#"
                            class="btn btn-outline-yellow fw-bold text-gray-700 showOffcanvas"
                            data-url="{{ route('admin.user.edit', [$user->id]) }}"
                            data-titletext="Editar usuario {{ $user->personFullname }}">Editar</a>

                        <a href="#"
                            class="btn btn-outline-red fw-bold text-gray-700 eliminar"
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
