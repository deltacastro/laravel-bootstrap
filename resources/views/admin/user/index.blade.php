@extends('layouts.main')

@section('content')
    <div class="d-flex flex-wrap justify-content-center px-3 w-100">
        <div class="d-flex flex-wrap justify-content-between col-12">
            <h2 class="col-12">Administrador de usuarios</h2>
            <div class="col-8">
                <x-form.float.input
                    id="searchInput"
                    type="text"
                    label="Buscar"
                    error-validator="user-search" />
            </div>
            <div class="col-2 mb-3">
                <button class="border-2 btn btn-outline-gray-800 col-12 h-100 nuevo"
                    data-url="/admin/usuarios/nuevo"
                    data-target="#user-offcanvas"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                    Nuevo
                </button>
            </div>
        </div>
        <div id="ajax-div" class="col-12">

        </div>
        <div class="offcanvas offcanvas-end w-25" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Nuevo usuario</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div id="user-offcanvas" class="offcanvas-body">
                <div class="spinner-grow text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

            </div>
        </div>

        <div class="offcanvas offcanvas-end w-25" tabindex="-1" id="offcanvasAsignarFanPage" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Asignar FanPage</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div id="asignarFanPage-offcanvas" class="offcanvas-body">
                <div class="spinner-grow text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
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
        const url_list = '/admin/usuarios/lista'
        const ajaxDiv = '#ajax-div'
        const list_table = '#userTable'
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
                // $('.searchInput')[0].value = $(this).val()
                // $('.searchInput')[1].value = $(this).val()
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

            $('#ajax-div').on('click', '.asignar-fanpage', function(){
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
