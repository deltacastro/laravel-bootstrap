<div class="col-12">
    <form id="user-form" action="{{ route('admin.user.update', [$user->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div id="statusResponse">

        </div>
        @include('admin.user._form')
        <button class="submit btn btn-primary mt-3 col-12" data-form="">Guardar</button>
    </form>
</div>

<script src="{{ asset('js/select2.js') }}"></script>

<script>
    $(function() {
        $('.role-select').select2({
            theme: "bootstrap-5",
            containerCssClass: "select2--large", // For Select2 v4.0
        })

        $('#user-form').on('submit', function(e) {
            e.preventDefault();
            var statusResponse = $('#statusResponse');
            var previousHtml = statusResponse.html()

            $.post($(this).attr('action'), $(this).serialize())
                .done(function(response){
                    const html_data = `
                        <p class="fs-5 mb-3 p-4 bg-success fw-bold text-gray-100">
                            Usuario actualizado correctamente
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
