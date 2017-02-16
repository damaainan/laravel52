@extends('master')
 
@section('content')
    <h1>Articles</h1>
    <a href="{{url('/articles/create')}}">+</a>
    <hr>
    @foreach($articles as $article)
            <a href="{{ url('/articles',$article->id)}}"><h2>{{$article->title}}</h2></a><a href="{{url('/articles',$article->id)}}/edit">edit</a>
            <div class="published_at">
                {{$article->published_at}}
            </div>
            <div class="body">
                {{$article->body}}
            </div>
    @endforeach
@stop