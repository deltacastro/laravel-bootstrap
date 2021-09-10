@extends('layouts.main')


@section('content')
    <div class="d-flex flex-wrap col-12 justify-content-center h-100">
        <div class="text-center">
            <p class="fs-1">Hola {{ Auth::user()->personFullName }}</p>
            <p class="col-12 text-center fs-4">{{ $quote }}</p>
        </div>
    </div>
@endsection
