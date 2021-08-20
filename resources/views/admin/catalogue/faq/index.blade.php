<div class="d-flex flex-wrap justify-content-between px-3">
    <div class="col-12 mb-3">
        <div class="card shadow-sm border border-2">
            <div class="card-body">
                <h3 class="fw-bold text-gray-600"></h3>
                <div class="d-flex flex-wrap justify-content-between">
                    <h3 class="fw-bold text-gray-600 col-12">Categorías</h3>
                    <div class="col-8">
                        <x-form.input
                            id="category-search"
                            type="text"
                            label="Ingrese busqueda"
                            name="category-search"
                            error-validator="category-search" />
                    </div>
                    <div class="col-2 mb-3">
                        <button class="btn btn-lg btn-primary col-12 h-100 nuevo"
                            data-url="{{ route('admin.catalogue.category.create') }}"
                            data-target="#category-offcanvas"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasCategory">
                            Nuevo
                        </button>
                    </div>
                </div>
                <div id="category-result" class="col overflow-auto border border-2 p-3 bg-gray-100" style="height: 24vh;">

                </div>

            </div>
        </div>
    </div>
    <div class="col-12 d-flex flex-wrap">
        <div class="card shadow-sm col-12 mb-3 border border-2">
            <div class="card-body">
                <h3 class="fw-bold text-gray-600"></h3>
                <div class="d-flex flex-wrap justify-content-between">
                    <h3 class="fw-bold text-gray-600 col-12">Calificadores</h3>
                    <div class="col-8">
                        <x-form.input
                            id="calificator-search"
                            type="text"
                            label="Ingrese busqueda"
                            name="calificator-search"
                            error-validator="calificator-search" />
                    </div>
                    <div class="col-2 mb-3">
                        <button class="btn btn-lg btn-primary col-12 h-100 nuevo"
                            data-url="{{ route('admin.catalogue.calificator.create') }}"
                            data-target="#calificator-offcanvas"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasCalificator">
                            Nuevo
                        </button>
                    </div>
                </div>
                <div id="calificator-result" class="col overflow-auto border border-2 p-3 bg-gray-100" style="height: 24vh;">

                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-end w-25" tabindex="-1" id="offcanvasCategory" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Nueva Categoría</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div id="category-offcanvas" class="offcanvas-body">
                <div class="spinner-grow text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-end w-25" tabindex="-1" id="offcanvasCalificator" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Nuevo Calificador</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div id="calificator-offcanvas" class="offcanvas-body">
                <div class="spinner-grow text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>

@push('javascript')
    <script>
        function getCategories(){
            var query = { search: $('#category-search').val() }
            $.ajax({
                url: '/admin/catalogos/categorias/lista',
                type: "get",
                data: query,
                beforeSend: function() {
                    // $(target).fadeOut(200);
                    $('#category-result').html(loadingAjax);
                }
            }).done(function(data){
                $("#category-result").empty().html(data);
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                alert(' No response from server');
            });
        }

        function getCalificators(){
            var query = { search: $('#calificator-search').val() }
            $.ajax({
                url: '/admin/catalogos/calificadores/lista',
                type: "get",
                data: query,
                beforeSend: function() {
                    $('#calificator-result').html(loadingAjax);
                }
            }).done(function(data){
                $("#calificator-result").empty().html(data);
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                alert(' No response from server');
            });
        }

        $(document).ready(function(){
            $(document).on('keyup', '#category-search', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(getCategories, doneTypingInterval);
            })

            $(document).on('keyup', '#calificator-search', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(getCalificators, doneTypingInterval);
            })

            $(document).on('keydown', '#category-search, #calificator-search', function() {
                clearTimeout(typingTimer);
            });

            getCategories()
            getCalificators()
        })
    </script>
@endpush
