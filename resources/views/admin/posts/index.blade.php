@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>My Post</h1>
 
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th colspan="3">Actions</th>


                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $item )

                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>SHOW</td>
                        <td>EDIT</td>
                        <td>DELETE</td>
                    </tr>
                    
                @endforeach
            </tbody>

        </table>
    </div>
@endsection