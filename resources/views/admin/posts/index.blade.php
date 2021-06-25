@extends('layouts.app')

@section('content')

    <div class="container">

        @if (session('deleted'))
            <div class="alert alert-success">
                <strong>{{session('deleted')}}</strong>
                You deleted the post
            </div>
        @endif
        <h1>My Post</h1>

        <a class="btn btn-secondary m-5" href="{{route('admin.posts.create')}}">Create new Message</a>
 
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th colspan="3">Actions</th>


                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $item )

                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>@if ($item->category) {{$item->category->name}}@endif </td>

                        <td>
                            <div>{{$item->created_at->format('l d/m/y')}}</div>
                            <div>{{$item->created_at->diffForHumans()}}</div>
                        </td>
                            
                        
                        <td>
                            
                            <a class="btn btn-success" href="{{route('admin.posts.show', $item->id )}}">SHOW</a>
                        
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{route('admin.posts.edit', $item->id)}}">EDIT</a>
                        </td>
                        <td>
                            <form class="delete-post-form" action="{{route('admin.posts.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input class="btn btn-danger" type="submit" type="submit" value="DELETE"> 
                            </form>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>

        </table>

        {{-- post by category --}}
        <h2>Post By Category</h2>

        @foreach ($categories as $category )
            <h3 class="mt-4">{{$category->name}}</h3>

           @forelse ($category->posts as $post )

            <h5>
                <a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a>
            </h5>
               
           @empty
               <p>No post to show <a href="{{route('admin.posts.create')}}"> Create </a></p> 
           @endforelse 
            
        @endforeach

        <div class="page d-flex justify-content-center">
            <h6>{{$posts->links()}}</h6>
        </div>
    </div>
@endsection