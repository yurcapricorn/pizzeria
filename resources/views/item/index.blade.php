@extends('layouts.item')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-body">
            <strong>item List</strong>
            <a href="{{ route('item.create') }}" class="btn btn-primary btn-xs pull-right py-0">Create Item</a>
            <table class="table table-responsive table-bordered table-stripped" style="margin-top:10px;">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Image_path</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->image_path }}</td>
                        <td>
                            <a href="{{ route('item.show',$item->id) }}" class="btn btn-primary btn-xs py-0">Show</a>
                            <a href="{{ route('item.edit',$item->id) }}" class="btn btn-warning btn-xs py-0">Edit</a>
                            <form action="{{ route('item.destroy',$item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-xs py-0">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $items->links() }}
        </div>
    </div>
@endsection
