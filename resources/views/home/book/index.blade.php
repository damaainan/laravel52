@extends('layouts.app')
 
@section('content')
    <h1>Books</h1>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">社刊管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <a href="{{ url('home/book/create') }}" class="btn btn-lg btn-primary">新增</a>

                    @foreach ($books as $book)
                        <hr>
                        <div class="book">
                            <h4>{{ $book->qihao }}</h4>
                            <div class="content">
                                <p>
                                    {{ $book->name }}
                                </p>
                            </div>
                        </div>
                        <a href="{{ url('home/book/'.$book->id.'/edit') }}" class="btn btn-success">编辑</a>
                        <form action="{{ url('home/book/'.$book->id) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
    
@stop