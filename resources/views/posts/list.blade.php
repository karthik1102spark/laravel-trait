@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel posts </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Content</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $i => $product)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->content }}</td>
                <td>
                    <form action="{{ route('posts.destroy',$product->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('posts.show',$product->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('posts.edit',$product->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


@endsection