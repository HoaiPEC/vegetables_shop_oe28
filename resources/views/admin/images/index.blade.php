@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ trans('templates.list_image') }}</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <a class="btn btn-primary btnAdd" href="{{ route('images.create') }}">
                            <i class="fa fa-plus">{{ trans('templates.add_new') }}</i>
                        </a>
                        <thead>
                            <tr>
                                <th>{{ trans('templates.id') }}</th>
                                <th>{{ trans('templates.image') }}</th>
                                <th>{{ trans('templates.edit') }}</th>
                                <th>{{ trans('templates.delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($images as $key => $image)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>
                                    <img class="img-show" src="{{ URL::to('/img').'/'. $image->image_path }}">
                                </td>
                                <td>
                                    <a href="{{ route('images.edit', $image->id) }}" class="btn btn-success">
                                        <i class="fa fa-edit">{{ trans('messages.edit') }}</i>
                                    </a>
                                </td>
                                <td>
                                    <form class="delete-sup" action="{{ route('images.destroy', $image->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" value="{{ $image->id }}">
                                            <i class="fa fa-trash">{{ trans('messages.delete') }}</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
