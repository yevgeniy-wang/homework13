@extends('layout')

@section('title', 'Posts')

@section('content')

    @if (isset($_SESSION['message']))
        <div class="alert alert-{{ $_SESSION['message']['status'] }}" role="alert">
            {{ $_SESSION['message']['text'] }}
        </div>

        @unset ($_SESSION['message'])
    @endif
    <div class="mb-3">
        <br>
        <a class="btn btn-primary" href="/">Home</a>
    </div>
    <div class="mb-3">
        <a class="btn btn-primary " href="/filterAC">Filter by Author and Category</a>  <a class="btn btn-primary " href="/filterACT">Filter by Author, Category and Tag</a>
    </div>
    <div class="offset-md-4">
    </div>

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Tags</th>
            <th>Body</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
        @forelse($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td><a href="/category/{{ $post->category->id }}">{{ $post->category->title }}</a></td>
                <td><a href="/author/{{ $post->user->id }}">{{ $post->user->name }}</a></td>
                <td>@foreach($post->tags as $tag) <a href="/tag/{{ $tag->id }}">{{ $tag->title }}</a>{{ ', ' }}@endforeach</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
            </tr>

        @empty
            <tr>
                <th><p>no posts</p></th>
            </tr>
        @endforelse
    </table>
    @include('pages.paginator')
@endsection
