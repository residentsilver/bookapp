@extends('layouts.helloapp')

@section('title','book.find')



@section('menubar')
    @parent
    検索結果を表示
@endsection

{{-- 検索結果を表示している --}}
@section('content')
    <form action="/book/find" method="post">
    @csrf
    <input type="text" name="input" value="{{$input}}">
    <input type="submit" value="find">
    </form>
    @if (isset($item))
    <table>
        <tr>
            <th>ID</th>
            <th>本の名前</th>
            <th>価格</th>
        </tr>
        @foreach($item as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->name}}</td>
                <td>{{$book->price}}円</td>
            </tr>
        @endforeach
    </table>
@endif

@endsection