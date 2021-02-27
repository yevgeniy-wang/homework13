@extends('layout')

@section('title', 'Post creating')

@section('content')
    <form method="POST" action="">
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <select id="author" name="author" class="form-select">
                <option selected disabled>Choose Author</option>
                @foreach($authors as $author)
                    <option @if(isset($_SESSION['data']['author']) && $_SESSION['data']['author'] == $author->id) selected @endif value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
        @if (isset($_SESSION['errors']['author']))
            @foreach($_SESSION['errors']['author'] as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" name="category" class="form-select" aria-label="Default select example">
                <option selected disabled>Choose Category</option>
                @foreach($categories as $category)
                    <option @if(isset($_SESSION['data']['category']) && $_SESSION['data']['category'] == $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        @if (isset($_SESSION['errors']['category']))
            @foreach($_SESSION['errors']['category'] as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="mb-3">
            <label for="tag" class="form-label">Tag</label>
            <select id="tag" name="tag" class="form-select" aria-label="Default select example">
                <option selected disabled>Choose Tag</option>
                @foreach($tags as $tag)
                    <option @if(isset($_SESSION['data']['tag']) && $_SESSION['data']['tag'] == $tag->id) selected @endif value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        @if (isset($_SESSION['errors']['tag']))
            @foreach($_SESSION['errors']['tag'] as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
        @csrf
    </form>
    @php
        unset($_SESSION['errors']);
        unset($_SESSION['data']);
    @endphp
@endsection
