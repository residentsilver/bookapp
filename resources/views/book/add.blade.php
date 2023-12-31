@extends('layouts.helloapp')

@section('title','Book.Add')

@section('menubar')
    @parent
    新規作成ページ
@endsection

@section('content')

{{-- validate --}}
@if (count($errors) >0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- 追加フォーム --}}
<form action="/book/add" method="post">
<table>
    @csrf
    <tr>
        <th>ID:</th>
        <td><input type="hidden" name="id"></td>
    </tr>
    <tr>
        <th>name:</th>
        <td><input type="text" name="name" value="{{old('name')}}"></td>
    </tr>
    <tr>
        <th>price:</th>
        <td><input type="number" name="price" value="{{old('price')}}"></td>
    </tr>
    <tr>
        <th></th>
        <td><input type="submit" value="send"></td>
    </tr>
@endsection