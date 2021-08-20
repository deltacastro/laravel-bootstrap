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
                <tr>
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
                            class="btn btn-sm border border-2 shadow-sm border-yellow fw-bold text-gray-800 editar"
                            data-url="{{ route('admin.user.edit', [$user->id]) }}"
                            data-target="#user-offcanvas"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">Editar</a>

                        <a href="#"
                            class="btn btn-sm border border-2 shadow-sm border-red fw-bold text-gray-800"
                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();"
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