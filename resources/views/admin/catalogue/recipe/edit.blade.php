<div class="col-12">
    <form id="recipe-form" action="{{ route('admin.catalogue.recipe.update', [$recipe->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div id="statusResponse">

        </div>
        @include('admin.catalogue.recipe._form')
        <button class="submit btn btn-primary mt-3 col-12" data-form="">Guardar</button>
    </form>
</div>
<script>
    $(function() {
        $('.ingredients-select').select2({
            tags: true,
            theme: "bootstrap-5",
            // containerCssClass: "select2--large", // For Select2 v4.0
        })

        $('#recipe-form').on('submit', function(e) {
            e.preventDefault();
            var statusResponse = $('#statusResponse');
            var previousHtml = statusResponse.html()

            $.post($(this).attr('action'), $(this).serialize())
                .done(function(response){
                    const html_data = `
                        <p class="fs-5 mb-3 p-4 bg-success fw-bold text-gray-100">
                            Receta actualizada correctamente
                        </p>
                    `
                    statusResponse.html(html_data)
                    getRecipes()
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
