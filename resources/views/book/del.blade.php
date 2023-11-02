@extends('layouts.helloapp')

@section('title','Book.Delete')


@section('menubar')
    @parent
    削除ページ
@endsection

@section('content')
<form action="/book/del" method="post">
<table>
    @csrf
    <input type="hidden" name="id" value="{{$form->id}}">
    <tr>
        <th>name:</th>
        <td>{{$form->name}}</td>
    </tr>
    <tr>
        <th>price:</th>
        <td>{{$form->price}}</td>
    </tr>
    <tr>
        <th></th>
        <td><input type="submit" value="send"></td>
    </tr>
</table>
</form>
   
@endsection