@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>{{ trans('templates.add_image') }}</h2>
        @include('admin.layouts.common.errors')
        <form action="{{ route('supliers.store') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group">
                <input type='file' id="imgInp" />
                <img id="image-select" src="#" class="image-select"/>
            </div>
            <button type="submit" class="btn btn-primary">{{ trans('templates.submit') }}</button>
        </form>
    </div>
@endsection
