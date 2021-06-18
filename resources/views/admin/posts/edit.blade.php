@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mb-5">
      EDIT:
      <a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a>
    </h1>



  
    <div class="row">
        <div class="col-md-8 offset-md-2">


            {{-- @if ($errors->any())

            <div class=" m-5 alert alert-danger">

            <ul>
                @foreach ( $errors->all() as $error)
                <li>
                {{ $error}}
                </li>
                
                @endforeach
            </ul>
            </div>
            
            @endif --}}


            <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                <label class="form-label" for="title">Title*</label>
                <input type="text" class="form-control @error('title')
                    is-invalid
                @enderror" id="title" name="title" placeholder="Title" value="{{old('title', $post->title)}}">
                </div>

                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror            
                
                <div class="form-group">
                <label class="form-label" for="content">Post area*</label>
                <textarea class="form-control @error('content')
                    is-invalid
                @enderror" id="content" rows="3" name="content" placeholder="Text here" >{{old('content', $post->content)}}</textarea>
                </div>

                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror 


                <button type="submit" class="btn btn-dark">create</button>
            </form>
        </div>
    </div>

    </div>

@endsection