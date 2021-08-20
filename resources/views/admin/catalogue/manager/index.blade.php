<div class="card shadow-sm border border-2">
    <div class="card-body">
        <h3 class="fw-bold text-gray-600"></h3>
        <div class="d-flex flex-wrap justify-content-between">
            <h3 class="fw-bold text-gray-600 col-12">Gerentes</h3>
            <div class="col-8">
                <x-form.input
                    id="manager-search"
                    type="text"
                    label="Ingrese busqueda"
                    name="manager-search"
                    error-validator="manager-search" />
            </div>
            <div class="col-2 mb-3">
                <button class="btn btn-lg btn-primary col-12 h-100 nuevo"
                    data-url="{{ route('admin.catalogue.manager.create') }}"
                    data-target="#manager-offcanvas"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasManager">
                    Nuevo
                </button>
            </div>
        </div>
        <div id="manager-result" class="col overflow-auto border border-2 p-3 bg-gray-100" style="height: 65vh;">

        </div>

    </div>
</div>
<div class="offcanvas offcanvas-end w-25" tabindex="-1" id="offcanvasManager" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Nueva Sucursal</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div id="manager-offcanvas" class="offcanvas-body">
        <div class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

@push('javascript')
    <script>

        function getManagers(){
            var query = { search: $('#manager-search').val() }
            $.ajax({
                url: '/admin/catalogos/gerentes/lista',
                type: "get",
                data: query,
                beforeSend: function() {
                    // $(target).fadeOut(200);
                    $('#manager-result').html(loadingAjax);
                }
            }).done(function(data){
                $("#manager-result").empty().html(data);
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                alert(' No response from server');
            });
        }

        $(document).ready(function(){
            $(document).on('keyup', '#manager-search', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(getManagers, doneTypingInterval);
            })

            $(document).on('keydown', '#manager-search', function() {
                clearTimeout(typingTimer);
            });

            getManagers()
        })
    </script>
@endpush
