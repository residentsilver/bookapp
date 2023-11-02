@extends('layouts.helloapp')

@section('title','Book.Edit')


@section('menubar')
    @parent
    編集ページ
@endsection

@section('content')
@if (count($errors) >0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="/book/edit" method="post">
<table>
    @csrf
    <input type="hidden" name="id" value="{{$form->id}}">
    <tr>
        <th>name:</th>
        <td><input type="text" name="name" value="{{$form->name}}"></td>
    </tr>
    <tr>
        <th>price:</th>
        <td><input type="number" name="price" value="{{$form->price}}"></td>
    </tr>
    <tr>
        <th></th>
        <td><input type="submit" value="send"></td>
    </tr>
</table>
</form>
@endsection