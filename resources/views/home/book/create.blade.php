@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新增一篇社刊</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('home/book') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="text" name="list" class="form-control" required="required" placeholder="请输入链接">
                        <br>
                        <input type="text" name="qihao" class="form-control" required="required" placeholder="请输入期号">
                        <br>
                        <input type="text" name="name" class="form-control" required="required" placeholder="请输入本期题目">
                        <br>
                        <input type="text" name="book" class="form-control" required="required" placeholder="请输入社刊名">
                        <br>                        <button class="btn btn-lg btn-info">新增文章</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
