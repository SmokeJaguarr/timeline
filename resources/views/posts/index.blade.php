@extends('layouts.app')

@section('content')




<div class="content">
    <div class="title m-b-md">
        Timeline
    </div>

    <div class="container mt-5 mb-5">
        @if (Auth::check())
        <a href='/posts/create'><button type="button" class="btn btn-outline-primary">Add Post</button></a>
        <a href='/myposts'><button type="button" class="btn btn-outline-primary">My posts</button></a>
        @else
        @endif

        <form action="/" enctype="form-data" method="get">
            <div class="form-group">
                <label for="exampleInputEmail1">Filter by Author e-mail</label>
                <input type="email" name="searchemail" class="form-control" placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
        <a href="/"><button type="submit" class="btn btn-primary">Reset Email Filter</button></a>

        <div class="row">
            <ul class="timeline">
                @foreach($posts as $post)
                <li>
                    <a target="_blank" href="/posts/{{ $post->id }}">{{$post->title}}</a>
                    <!--                     <a href="/posts/{{ $post->id }}" class="float-right">{{$post->created_at}}</a>
                    <p>{{$post->type}}</p> -->
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
</div>


@endsection