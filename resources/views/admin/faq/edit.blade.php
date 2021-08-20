<div class="col-12">
    <form id="faq-form" action="{{ route('admin.faq.update', [$question->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div id="statusResponse">

        </div>
        @include('admin.faq._form')
        <button class="submit btn btn-primary mt-3 col-12" data-form="">Guardar</button>
    </form>
</div>

<script src="{{ asset('js/select2.js') }}"></script>

<script>
    $(function() {

        $('#faq-form').on('submit', function(e) {
            e.preventDefault();
            var statusResponse = $('#statusResponse');
            var previousHtml = statusResponse.html()

            $.post($(this).attr('action'), $(this).serialize())
                .done(function(response){
                    const html_data = `
                        <p class="fs-5 mb-3 p-4 bg-success fw-bold text-gray-100">
                            FAQ actualizado correctamente
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
