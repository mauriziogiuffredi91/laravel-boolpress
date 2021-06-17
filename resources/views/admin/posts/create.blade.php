@extends('layouts.app')

@section('content')

<div class="container">

    <h1>New Post</h1>

    <div class="row">
        <div class="col-md-8 offset-md-2">



            <form>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Title</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Title">
                </div>
                
                
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Post area</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection