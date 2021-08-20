<div class="col-12">
    <form id="state-form" action="{{ route('admin.catalogue.state.store') }}" method="post">
        @csrf
        <div id="statusResponse">

        </div>
        @include('admin.catalogue.state._form')
        <button class="submit btn btn-primary mt-3 col-12" data-form="">Guardar</button>
    </form>
</div>

<script>
    $(function() {
        $('#state-form').on('submit', function(e) {
            e.preventDefault();
            var statusResponse = $('#statusResponse');
            var previousHtml = statusResponse.html()

            $.post($(this).attr('action'), $(this).serialize())
                .done(function(response){
                    const html_data = `
                        <p class="fs-5 mb-3 p-4 bg-success fw-bold text-gray-100">
                            Estado guardado correctamente
                        </p>
                    `
                    statusResponse.html(html_data)
                    getStates()
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
