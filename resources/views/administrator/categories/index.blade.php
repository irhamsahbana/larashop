@extends('administrator._layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Categories</h2>
                </div>
                <div class="card-body">
                    @include('administrator.partials.flash')
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Parent</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>    
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->parent ? $category->parent->name : '' }}</td>
                                    <td>
                                        <a href="{{ url('administrator/categories/'. $category->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>

                                        {!! Form::open(['url' => 'administrator/categories/'. $category->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No records found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
                <div class="card-footer text-right">
                    <a href="{{ url('administrator/categories/create') }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
        </div>
    </div>
    <style>
        .w-5{
            display: none;
        }
        .text-sm.text-gray-700.leading-5{
            margin-top: 6px;
            margin-bottom: 6px;
        }
    </style>
@endsection