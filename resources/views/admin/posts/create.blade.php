@extends('layouts.app')

@section('content')

<div class="container">

  <h1>New Post</h1>


  
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


        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
              <label class="form-label" for="title">Title*</label>
              <input type="text" class="form-control @error('title')
                is-invalid
              @enderror" id="title" name="title" placeholder="Title" value="{{old('title')}}">
            </div>

            @error('title')
              <p class="text-danger">{{$message}}</p>
            @enderror            
            
            <div class="form-group">
              <label class="form-label" for="content">Post area*</label>
              <textarea class="form-control @error('content')
                is-invalid
              @enderror" id="content" rows="3" name="content" placeholder="Text here" >{{old('content')}}</textarea>
            </div>

            @error('title')
              <p class="text-danger">{{$message}}</p>
            @enderror 

            <div class="mb-3">
              <label for="category_id">Category</label>
              <select class="form-control @error('category_id')
              is-invalid
              @enderror" name="category_id" id="category_id"
              >
                <option value="">Selection</option>
                @foreach ($categories as $category)
                  <option value="{{$category->id}}"
                    @if ($category->id == old('category_id')) selected @endif
                    
                  >
                      
                    

                    {{$category->name}}
                  </option>
                  
                @endforeach
              </select>
              @error('category_id')

                <div class="feedback">{{$message}}</div>
                
              @enderror
            </div>

            {{-- tags --}}
            <h4>Tags</h4>
            <div class="mb-3">
              @foreach ($tags as $tag)
                <span class="d-inline-block mr-3">
                  <input type="checkbox" name="tags[]" id="tag{{$loop->iteration }}"
                    value="{{$tag->id}}" 
                    @if (in_array($tag->id, old('tags', [])))
                      {{-- l'inserimento di un array vuoto è dovuto alla ricerca iniziale di un array che non esiste, poi controlla quello che c'è --}}
                      checked
                    @endif
                  
                  
                  >
                  <label for="tag{{$loop->iteration }}">
                     
                    
                  
                    {{$tag->name}}
                  </label>
                </span>
                  
              @endforeach

              @error('tags')
                <div>
                  {{$message}}
                </div>
                
              @enderror
            </div>


            <button type="submit" class="btn btn-dark">create</button>
        </form>
      </div>
  </div>

</div>

@endsection