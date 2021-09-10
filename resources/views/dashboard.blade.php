@extends('layouts.main')


@section('content')
    <div class="fs-1">
        {{ Auth::user()->personFullName }}
    </div>
@endsection
