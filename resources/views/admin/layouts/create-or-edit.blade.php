@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 p-3">
            <form action="@yield('form-action')" method="POST">
                @yield('form-method')
                @csrf

                <div class="mb-3">
                    <h1>@yield('page-title')</h1>
                </div>

                <div class="mb-3 ">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control mb-2" value="{{ old('title', $post->title)}}">
                    @error('title')
                    <div class="alert alert-danger mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    @error('category_id')
                    <div class="alert alert-danger mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        @foreach ( $categories as $category )
                        <option value="{{ $category->id}}"
                            {{ ($category->id == old('category_id', $post->category_id)) ? 'selected' :''}}
                            >{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label for="image_url">Image Url</label>
                    <input type="text" name="image_url" id="image_url" class="form-control mb-2" value="{{ old('image_url', $post->image_url)}}">
                    @error('image_url')
                    <div class="alert alert-danger mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" rows="20" cols="88" class="form-controll mb-2" >{{ old('content', $post->content)}}</textarea>
                    @error('content')
                    <div class="alert alert-danger mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <input type="submit" value="@yield('page-title')" class="btn btn-primary btn-lg">
                <input type="reset" value="Reset fields" class="btn btn-warning btn-lg">

            </form>
        </div>
    </div>
</div>
@endsection
