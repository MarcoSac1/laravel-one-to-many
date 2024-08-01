@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 p-3">
            <h2>{{ $category->id }}: {{ $category->name }}</h2>
            <h3>{{ $category->color }}</h3>
            <h4>List of posts in this category</h4>
            <ul>
                @foreach ($category->posts as $post)
                <li>
                    <a href="{{ route('admin.posts.show', $post) }}"></a>
                    {{ $post->title }} - {{ $post->author }}
                </li>
                @endforeach
            </ul>
            <p>{{ $category->content}}</p>
            <div class="card-footer">
                <a href="{{route ('admin.categories.index') }}" class="btn btn-primary btn-sm">Return to categories list</a>
                <a href="{{route ('admin.categories.edit',$category )}}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{route ('admin.categories.destroy',$category )}}" method="POST" class="d-inline-block form-destroyer" data-post-title='{{ $category->title }}'>
                    @method('delete')
                    @csrf

                    <input type="submit" class="btn btn-warning btn-sm" value="delete"></input>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('additional-scripts')
    @vite('resources/js/posts/delete-index-confirmation.js')
@endsection
