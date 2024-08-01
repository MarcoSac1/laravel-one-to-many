@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table table-hover table-success">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Creation Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post )
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ ($post->category) ? $post->category->name: 'without category' }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->creation_date}}</td>
                        <td>
                            <a href="{{route ('admin.posts.show',$post )}}" class="btn btn-primary btn-sm">Show</a>
                            <a href="{{route ('admin.posts.edit',$post )}}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{route ('admin.posts.destroy',$post )}}" method="POST" class="d-inline-block form-destroyer" data-post-title='{{ $post->title }}'>
                                @method('delete')
                                @csrf

                                <input type="submit" class="btn btn-warning btn-sm" value="delete"></input>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            {{ $posts->links(); }}
        </div>
    </div>
</div>
@endsection

@section('additional-scripts')
    @vite('resources/js/posts/delete-index-confirmation.js')
@endsection
