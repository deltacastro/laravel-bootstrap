<div>
    <div class="offcanvas {{ $offcanvasParentClass }}" tabindex="-1" id="offcanvas-general" aria-labelledby="offcanvasGeneralLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel"></h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="spinner-grow text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    @if ($ajaxComponent == 'true')
        <script>
            var offcanvasGeneral = document.getElementById('offcanvas-general')
            var bsOffcanvasGeneral = new bootstrap.Offcanvas(offcanvasGeneral)

            $("{{ $parentElem }}").on('click', "{{ $qSelector }}", function(){
                bsOffcanvasGeneral.show();
                var offcanvas = $('#offcanvas-general');
                var text = $(this).data('titletext');
                var url = $(this).data('url');
                var target = '#offcanvas-general .offcanvas-body';

                offcanvas.find('.offcanvas-header h5').html(text);

                $(target).html('<div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>')
                $.get(url, function (data) {
                    $(`${target}`).html(data)
                })
            })
        </script>
    @else
        @push('javascript')
            <script>
                var offcanvasGeneral = document.getElementById('offcanvas-general')
                var bsOffcanvasGeneral = new bootstrap.Offcanvas(offcanvasGeneral)

                $("{{ $parentElem }}").on('click', "{{ $qSelector }}", function(){
                    bsOffcanvasGeneral.show();
                    var offcanvas = $('#offcanvas-general');
                    var text = $(this).data('titletext');
                    var url = $(this).data('url');
                    var target = '#offcanvas-general .offcanvas-body';

                    offcanvas.find('.offcanvas-header h5').html(text);

                    $(target).html('<div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>')
                    $.get(url, function (data) {
                        $(`${target}`).html(data)
                    })
                })
            </script>
        @endpush
    @endif
</div>
