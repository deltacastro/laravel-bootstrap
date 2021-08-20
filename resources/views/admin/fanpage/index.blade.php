@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-center px-3 w-100">
        <div class="card shadow-sm col-12">
            <div class="card-body">
                <h2>Administrador de Fan Pages</h2>
                <div class="d-flex flex-wrap justify-content-between">
                    <div class="col-8">
                        <x-form.input
                            id="searchInput"
                            type="text"
                            label="Buscar"
                            error-validator="fanpage-search" />
                    </div>
                    <div class="col-2 mb-3">
                        <button class="btn btn-lg btn-primary col-12 h-100 nuevo"
                            data-url="{{ route('admin.fanpage.create') }}"
                            data-target="#fanpage-offcanvas"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasFanpage">
                            Nuevo
                        </button>
                    </div>
                </div>
                <div class="overflow-auto bg-gray-300 p-3" id="ajax-div" style="max-height: 73vh;">

                </div>
            </div>

            <div class="offcanvas offcanvas-end w-25" tabindex="-1" id="offcanvasFanpage" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">Nuevo Fanpage</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div id="fanpage-offcanvas" class="offcanvas-body">
                    <div class="spinner-grow text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script>
    // $(function() {
    //     $('.role-select').select2()
    // })
</script>
    <script>
        const url_list = '/admin/fanpages/lista'
        const ajaxDiv = '#ajax-div'
        const list_table = '#fanpageTable'
        const finalizado_action = '.ajax-action'
        let typingTimer;
        let doneTypingInterval = 500;

        function loading(target) {
            $(target).html(loadingAjax)
        }

        function reloadTable() {
            $(`${list_table}.table-responsive`).fadeOut('slow')
            loading(ajaxDiv)
            $.get(url_list, function (data) {
                $(ajaxDiv).html(data)
            })
        }

        $(function() {
            reloadTable()

            $(document).on('click', '.pagination a' ,function(event) {
                event.preventDefault();
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                let myurl=$(this).attr('href');
                let page=$(this).attr('href').split('page=')[1];
                getData(page);
            });
            $(document).on('keyup', '#searchInput', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(getData, doneTypingInterval);
            })

            function getData(page){
                page == null ? 1 : page
                var customFilters = getFilterJson()
                var query = {}
                $.extend(query, customFilters, {page: page, sender: $(this).data('sender')})
                $.ajax({
                    url: url_list,
                    type: "get",
                    data: query,
                    beforeSend: function() {
                        // $(target).fadeOut(200);
                        $(ajaxDiv).html(loadingAjax);
                    }
                }).done(function(data){
                    $(ajaxDiv).empty().html(data);
                    location.hash = page;
                }).fail(function(jqXHR, ajaxOptions, thrownError){
                    alert(' No response from server');
                });
            }

            $(document).on('keydown', '#searchInput', function() {
                clearTimeout(typingTimer);
            });

            $('.nuevo').on('click', function(){
                var url = $(this).data('url');
                var target = $(this).data('target')
                $(target).html('<div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>')
                $.get(url, function (data) {
                    $(`${target}`).html(data)
                })
            })

            $('#ajax-div').on('click', '.editar', function(){
                var url = $(this).data('url');
                var target = $(this).data('target')
                $(target).html('<div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>')
                $.get(url, function (data) {
                    $(`${target}`).html(data)
                })
            })

            function getFilterJson() {
                return {
                    search: $('#searchInput').val(),
                }
            }
        })
    </script>
@endsection
