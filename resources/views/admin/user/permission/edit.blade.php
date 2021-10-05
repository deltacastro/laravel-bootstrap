<div class="col-12">
    <div id="statusResponse">

    </div>
    <x-form.float.input
        id="permission-search-input"
        type="text"
        label="Buscar"
        error-validator="permission-search" />


    <form id="userPermission-update-form" action="{{ route('admin.user.permission.update', [$user]) }}" method="post">
        @csrf
        @method('PUT')
        <div id="permissionTable" class="table-responsive">
            <table id="permission-table" class="table table-borderless">
                <thead>
                    <tr>
                        <th width="100%">Permisos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr class="align-middle fs-5 text-gray-700">
                            {{-- <td>{{ $permission->name }}</td> --}}
                            <td align="center">
                                <div class="col-12">
                                    <input
                                        type="checkbox"
                                        class="btn-check col-12"
                                        name="user[permissions_id][]"
                                        id="btn-check-{{ $permission->id }}"
                                        value="{{ $permission->id }}"
                                        {{ in_array($permission->id, $userPermissionsIds) ? 'checked' : '' }}
                                        autocomplete="off">

                                    <label
                                        class="btn btn-outline-primary col-12 fw-bold fs-5"
                                        for="btn-check-{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button class="btn btn-green text-gray-300 fw-bold col-12">Guardar</button>
    </form>

</div>


<script>

    $(function() {

        $('#permission-search-input').on('keyup', function() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("permission-search-input");
            filter = input.value.toUpperCase();
            table = document.getElementById("permission-table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter)> -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        })

        $('#userPermission-update-form').on('submit', function(e) {
            e.preventDefault();
            var statusResponse = $('#statusResponse');
            var previousHtml = statusResponse.html()

            $.post($(this).attr('action'), $(this).serialize())
                .done(function(response){
                    const html_data = `
                        <p class="fs-5 mb-3 p-4 bg-success fw-bold text-gray-100">
                            Permiso actualizado correctamente
                        </p>
                    `
                    statusResponse.html(html_data)
                    reloadTable()
                })
                .fail(function(data){
                    statusResponse.html(`
                        <p class="fs-5 mb-3 p-4 bg-red fw-bold text-gray-100">
                            Intente de nuevo por favor.
                        </p>
                    `)
                })
        })
    })
</script>
