@extends('layouts.app')

@section('content')




<div class="container">
    <div class="d-flex flex-row-reverse pb-2"><a href='/'><button type="button" class="btn btn-outline-primary">To Timeline</button></a></div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Type</th>
                        <th scope="col">Createed_at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    @foreach($user->posts as $post)
                    <tr>
                        <th scope="row">{{ $counter }}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->type}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>





                            <form action="/posts/delete/{{$post->id}}" enctype="form-data" method="post">
                                <a href="/posts/{{ $post->id }}"><button type="button" class="btn btn-primary"><i class="far fa-eye"></i></button></a>

                                <a href="/posts/{{ $post->id }}/edit"><button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button></a>
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </form>

                        </td>
                    </tr>
                    <?php $counter++; ?>
                    @endforeach

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection