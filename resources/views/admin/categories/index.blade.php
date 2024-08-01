@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table table-hover table-success">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Color</th>
                        <th scope="col">Number of posts</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category )
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->Name }}</td>
                        <td>{{ $category->color }}</td>
                        <td>{{ count($category->post) }}</td>
                        <td>
                            <a href="{{route ('admin.category.show',$category )}}" class="btn btn-primary btn-sm">Show</a>
                            <a href="{{route ('admin.category.edit',$category )}}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{route ('admin.category.destroy',$category )}}" method="POST" class="d-inline-block form-destroyer" data-post-title='{{ $category->title }}'>
                                @method('delete')
                                @csrf

                                <input type="submit" class="btn btn-warning btn-sm" value="delete"></input>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            {{ $$category->links(); }}
        </div>
    </div>
</div>
@endsection

@section('additional-scripts')
    @vite('resources/js/posts/delete-index-confirmation.js')
@endsection
