<div>
    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Advertencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0 fs-5 fw-bold text-gray-700"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gray-200 text-gray-700 fw-bold fs-5 cancel"
                        data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-red fw-bold fs-5 text-gray-200 accept">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    @if ($ajaxComponent == 'true')
        <script>
            $("{{ $parentElem }}").on('click', "{{ $elem }}", function(){
                var confirmmodal = $('#confirmationModal');
                var targetform = $(this).data('targetform');
                var text = $(this).data('text');
                console.log(targetform, text);
                confirmmodal.find('.modal-dialog .modal-body p').html(text);
                confirmmodal.find('.modal-dialog .modal-footer .accept').data('targetform', targetform);
            })

            $('#confirmationModal').on('click', '.accept', function() {
                var targetform = $(this).data('targetform');
                document.querySelector(targetform).submit();
            })
        </script>
    @else
        @push('javascript')
            <script>
                $("{{ $parentElem }}").on('click', "{{ $elem }}", function(){
                    var confirmmodal = $('#confirmationModal');
                    var targetform = $(this).data('targetform');
                    var text = $(this).data('text');
                    console.log(targetform, text);
                    console.log('entra');
                    confirmmodal.find('.modal-dialog .modal-body p').html(text);
                    confirmmodal.find('.modal-dialog .modal-footer .accept').data('targetform', targetform);
                })

                $('#confirmationModal').on('click', '.accept', function() {
                    var targetform = $(this).data('targetform');
                    document.querySelector(targetform).submit();
                })
            </script>
        @endpush
    @endif
</div>
