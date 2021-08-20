<div class="card shadow-sm border border-2">
    <div class="card-body">
        <h3 class="fw-bold text-gray-600"></h3>
        <div class="d-flex flex-wrap justify-content-between">
            <h3 class="fw-bold text-gray-600 col-12">Estados</h3>
            <div class="col-8">
                <x-form.input
                    id="state-search"
                    type="text"
                    label="Ingrese busqueda"
                    name="state-search"
                    error-validator="state-search" />
            </div>
            <div class="col-2 mb-3">
                <button class="btn btn-lg btn-primary col-12 h-100 nuevo"
                    data-url="{{ route('admin.catalogue.state.create') }}"
                    data-target="#state-offcanvas"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasState">
                    Nuevo
                </button>
            </div>
        </div>
        <div id="state-result" class="col overflow-auto border border-2 p-3 bg-gray-100" style="height: 24vh;">

        </div>
    </div>
</div>
<div class="offcanvas offcanvas-end w-25" tabindex="-1" id="offcanvasState" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Nuevo Estado</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div id="state-offcanvas" class="offcanvas-body">
        <div class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

@push('javascript')
    <script>
        function getStates(){
            var query = { search: $('#state-search').val() }
            $.ajax({
                url: '/admin/catalogos/estados/lista',
                type: "get",
                data: query,
                beforeSend: function() {
                    // $(target).fadeOut(200);
                    $('#state-result').html(loadingAjax);
                }
            }).done(function(data){
                $("#state-result").empty().html(data);
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                alert(' No response from server');
            });
        }

        $(document).ready(function(){
            $(document).on('keyup', '#state-search', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(getStates, doneTypingInterval);
            })

            $(document).on('keydown', '#state-search', function() {
                clearTimeout(typingTimer);
            });

            getStates()
        })
    </script>
@endpush
