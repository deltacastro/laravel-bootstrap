<div class="card shadow-sm border border-2">
    <div class="card-body">
        <h3 class="fw-bold text-gray-600"></h3>
        <div class="d-flex flex-wrap justify-content-between">
            <h3 class="fw-bold text-gray-600 col-12">Recetas</h3>
            <div class="col-8">
                <x-form.input
                    id="recipe-search"
                    type="text"
                    label="Ingrese busqueda"
                    name="recipe-search"
                    error-validator="recipe-search" />
            </div>
            <div class="col-2 mb-3">
                <button class="btn btn-lg btn-primary col-12 h-100 nuevo"
                    data-url="{{ route('admin.catalogue.recipe.create') }}"
                    data-target="#recipe-offcanvas"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasRecipe">
                    Nuevo
                </button>
            </div>
        </div>
        <div id="recipe-result" class="col overflow-auto border border-2 p-3 bg-gray-100" style="height: 65vh;">

        </div>

    </div>
</div>
<div class="offcanvas offcanvas-end w-25" tabindex="-1" id="offcanvasRecipe" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Nueva Receta</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div id="recipe-offcanvas" class="offcanvas-body">
        <div class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

@push('javascript')
    <script>

        function getRecipes(){
            var query = { search: $('#recipe-search').val() }
            $.ajax({
                url: '/admin/catalogos/recetas/lista',
                type: "get",
                data: query,
                beforeSend: function() {
                    // $(target).fadeOut(200);
                    $('#recipe-result').html(loadingAjax);
                }
            }).done(function(data){
                $("#recipe-result").empty().html(data);
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                alert(' No response from server');
            });
        }

        $(document).ready(function(){
            $(document).on('keyup', '#recipe-search', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(getRecipes, doneTypingInterval);
            })

            $(document).on('keydown', '#recipe-search', function() {
                clearTimeout(typingTimer);
            });

            getRecipes()
        })
    </script>
@endpush
