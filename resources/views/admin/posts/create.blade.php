@extends('layouts.app')

@section('content')

<div class="container">

    <h1>New Post</h1>

    <div class="row">
        <div class="col-md-8 offset-md-2">



            <form action="{{route('admin.posts.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">
                  <label class="form-label" for="title">Title*</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                </div>
                
                
                <div class="form-group">
                  <label class="form-label" for="content">Post area*</label>
                  <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                </div>


                <button type="submit" class="btn btn-dark">create</button>
            </form>
        </div>
    </div>

</div>

@endsection