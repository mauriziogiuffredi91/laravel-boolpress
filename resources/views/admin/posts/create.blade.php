@extends('layouts.app')

@section('content')

<div class="container">

  <h1>New Post</h1>


  
  <div class="row">
      <div class="col-md-8 offset-md-2">


        @if ($errors->all())

        <div class=" m-5 alert alert-danger">

          <ul>
            @foreach ( $errors->all() as $error)
            <li>
              {{ $error}}
            </li>
              
            @endforeach
          </ul>
        </div>
          
        @endif


        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
              <label class="form-label" for="title">Title*</label>
              <input type="text" class="form-control @error('title')
                is-invalid
              @enderror" id="title" name="title" placeholder="Title">
            </div>

            @error('title')
              <p class="text-danger">{{$message}}</p>
            @enderror            
            
            <div class="form-group">
              <label class="form-label" for="content">Post area*</label>
              <textarea class="form-control @error('content')
                is-invalid
              @enderror" id="content" rows="3" name="content" placeholder="Text here"></textarea>
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