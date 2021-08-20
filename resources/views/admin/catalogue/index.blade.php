@extends('layouts.main')

@section('head')
    <style>
        .list-option {
            transition: all 200ms ease !important;
        }

        .list-option:hover {
            background-color: #76718522 !important;
        }
    </style>
@endsection

@section('content')
    <nav class="ms-3 me-1">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active fw-bold fs-4" id="nav-catalogue-tab" data-bs-toggle="tab" data-bs-target="#nav-catalogue" type="button"
                role="tab" aria-controls="nav-home" aria-selected="true">Catálogos</button>
            <button class="nav-link fw-bold fs-4" id="nav-store-tab" data-bs-toggle="tab" data-bs-target="#nav-store" type="button"
                role="tab" aria-controls="nav-store" aria-selected="false">Sucursales</button>
            <button class="nav-link fw-bold fs-4" id="nav-manager-tab" data-bs-toggle="tab" data-bs-target="#nav-manager" type="button"
                role="tab" aria-controls="nav-manager" aria-selected="false">Gerentes</button>
            <button class="nav-link fw-bold fs-4" id="nav-recipe-tab" data-bs-toggle="tab" data-bs-target="#nav-recipe" type="button"
                role="tab" aria-controls="nav-recipe" aria-selected="false">Recetas</button>
        </div>
    </nav>
    <div class="tab-content pt-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-catalogue" role="tabpanel" aria-labelledby="nav-catalogue-tab">
            <div class="d-flex flex-wrap justify-content-between">
                <div class="col-6 pe-1 d-flex-flex-wrap">
                    @include('admin.catalogue.faq.index')
                </div>
                <div class="col-6 ps-1 mb-3">
                    <div class="col-12 mb-3">
                        @include('admin.catalogue.zone.index')
                    </div>
                    <div class="col-12">
                        @include('admin.catalogue.state.index')
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade ps-3" id="nav-store" role="tabpanel" aria-labelledby="nav-store-tab">
            @include('admin.catalogue.store.index')
        </div>
        <div class="tab-pane fade ps-3" id="nav-manager" role="tabpanel" aria-labelledby="nav-manager-tab">
            @include('admin.catalogue.manager.index')
        </div>
        <div class="tab-pane fade ps-3" id="nav-recipe" role="tabpanel" aria-labelledby="nav-recipe-tab">
            @include('admin.catalogue.recipe.index')
        </div>
    </div>
@endsection

@push('javascript')
    <script>
        let typingTimer;
        let doneTypingInterval = 500;
        $(document).ready(function(){
            $('.nuevo').on('click', function(){
                var url = $(this).data('url');
                var target = $(this).data('target')
                $(target).html('<div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>')
                $.get(url, function (data) {
                    $(`${target}`).html(data)
                })
            })

            $('#calificator-result, #category-result, #zone-result, #state-result, #store-result, #manager-result, #recipe-result')
                .on('click', '.editar', function(){
                    var url = $(this).data('url');
                    var target = $(this).data('target')
                    $(target).html('<div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>')
                    $.get(url, function (data) {
                        $(`${target}`).html(data)
                    })
                })
        })
    </script>
@endpush
