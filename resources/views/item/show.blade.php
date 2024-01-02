@extends('layouts.item')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p style="font-size:20px; font-weight:bold;">Item</p>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" value="{{ $item->title }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" value="{{ $item->description }}">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" value="{{ $item->price }}">
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" value="{{ $item->type }}">
            </div>

            <div class="form-group">
                <label for="image"></label>
                <img src="{{ url('storage/images/'.$item->image_path) }}" alt="" title="" width=100 height=100 />
            </div>
            <button><a href="{{ route('item.index') }}" class="btn btn-primary">Back</a></button>
        </div>
    </div>
@endsection
