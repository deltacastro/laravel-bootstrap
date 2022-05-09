@extends('layouts.main')

@section('content')
    <div id="panel-container" class="d-flex flex-wrap justify-content-center px-3 mt-2 w-100">
        <div class="d-flex flex-wrap justify-content-between col-12">
            <h2 class="col-12 mb-3">Administrador de usuarios</h2>
            <div class="col-8 mb-3">
                <x-form.float.input
                    id="searchInput"
                    type="text"
                    label="Buscar"
                    error-validator="user-search" />
            </div>
            <div class="col-3 col-md-2 mb-3">
                <button class="border-3 fw-bold btn btn-outline-gray-800 col-12 h-100 showOffcanvas"
                    data-url="{{ route('admin.user.create') }}"
                    data-titletext="Nuevo usuario">
                    Nuevo
                </button>
            </div>
        </div>
        <div id="ajax-div" class="col-12">

        </div>
    </div>

    <x-bootstrap.offcanvas.general
        parentElem="#panel-container"
        qSelector=".showOffcanvas"
        offcanvasParentClass="offcanvas-end delta-width-100 delta-width-md-75 delta-width-lg-50 delta-width-xxl-40"
        ajaxComponent="false" />

    <x-bootstrap.modal.confirmation
        elem=".eliminar"
        parentElem="#ajax-div"
        ajaxComponent="false"/>

@endsection

@section('javascript')
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

            function getFilterJson() {
                return {
                    search: $('#searchInput').val(),
                }
            }
        })
    </script>
@endsection
