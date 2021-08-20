<div class="card shadow-sm border border-2">
    <div class="card-body">
        <h3 class="fw-bold text-gray-600"></h3>
        <div class="d-flex flex-wrap justify-content-between">
            <h3 class="fw-bold text-gray-600 col-12">Zonas</h3>
            <div class="col-8">
                <x-form.input
                    id="zone-search"
                    type="text"
                    label="Ingrese busqueda"
                    name="zone-search"
                    error-validator="zone-search" />
            </div>
            <div class="col-2 mb-3">
                <button class="btn btn-lg btn-primary col-12 h-100 nuevo"
                    data-url="{{ route('admin.catalogue.zone.create') }}"
                    data-target="#zone-offcanvas"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasZone">
                    Nuevo
                </button>
            </div>
        </div>
        <div id="zone-result" class="col overflow-auto border border-2 p-3 bg-gray-100" style="height: 24vh;">

        </div>

    </div>
</div>
<div class="offcanvas offcanvas-end w-25" tabindex="-1" id="offcanvasZone" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Nueva Zona</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div id="zone-offcanvas" class="offcanvas-body">
        <div class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

@push('javascript')
    <script>

        function getZones(){
            var query = { search: $('#zone-search').val() }
            $.ajax({
                url: '/admin/catalogos/zonas/lista',
                type: "get",
                data: query,
                beforeSend: function() {
                    // $(target).fadeOut(200);
                    $('#zone-result').html(loadingAjax);
                }
            }).done(function(data){
                $("#zone-result").empty().html(data);
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                alert(' No response from server');
            });
        }

        $(document).ready(function(){
            $(document).on('keyup', '#zone-search', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(getZones, doneTypingInterval);
            })

            $(document).on('keydown', '#zone-search', function() {
                clearTimeout(typingTimer);
            });

            getZones()
        })
    </script>
@endpush
