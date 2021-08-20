<div class="col-12">
    <form id="manager-form" action="{{ route('admin.catalogue.manager.store') }}" method="post">
        @csrf
        <div id="statusResponse">

        </div>
        @include('admin.catalogue.manager._form')
        <button class="submit btn btn-primary mt-3 col-12" data-form="">Guardar</button>
    </form>
</div>

<script>
    $(function() {
        $('.phones-select').select2({
            tags: true,
            theme: "bootstrap-5",
            // containerCssClass: "select2--large", // For Select2 v4.0
        })

        $('#manager-form').on('submit', function(e) {
            e.preventDefault();
            var statusResponse = $('#statusResponse');
            var previousHtml = statusResponse.html()

            $.post($(this).attr('action'), $(this).serialize())
                .done(function(response){
                    const html_data = `
                        <p class="fs-5 mb-3 p-4 bg-success fw-bold text-gray-100">
                            Gerente creado correctamente
                        </p>
                    `
                    statusResponse.html(html_data)
                    getManagers()
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
