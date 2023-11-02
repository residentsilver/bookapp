<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(Request $request)
    {
        $items = Book::all(); //Bookテーブルに接続して、情報をitems変数に格納
        return view('book.index',['items' => $items]);//indexファイルへitems変数を送る。
    }

    public function add(Request $request){
        return view('book.add');
    }

    public function create(Request $request){
        $this->validate($request, Book::$rules); //モデル内に定義している条件をもとに、validationの実行
        $book = new Book; //格納情報を入れる箱を生成　インスタンス化
        $form = $request->all();  //取得したデータをform変数に保管する　P260
        unset($form['_token']);  //csrfで作られたtoken情報を削除
        $book -> fill($form)->save();  //bookの情報をDBへ格納する
        return redirect('/book');  ///bookへリダイレクト
    }

    public function edit(Request $request){
        $book = Book::find($request ->id);  //モデルの中から指定された id に対応するデータをデータベースから取得　それを変数 $book に代入
        return view('book.edit' , ['form' =>$book]);//view 関数は指定されたビューをロードし、'form' という名前で変数 $book をビューに渡す。　ビュー内で使える変数となる。
}

    public function update(Request $request) {
        $this->validate($request, Book::$rules);//モデル内に定義している条件をもとに、validationの実行
        $book = Book::find($request->id);//モデルの中から指定された id に対応するデータをデータベースから取得　それを変数 $book に代入
        $form = $request->all();  //取得したデータをform変数に保管する　P260
        unset ($form['_token']); //csrfで作られたtoken情報を削除
        $book -> fill($form)->save();  //bookの情報をDBへ格納する
        return redirect('/book');//リダイレクト
    }

    public function delete(Request $request){
        $book = Book::find($request ->id);
        return view('book.del' , ['form' =>$book]);//book.delにform変数を渡す
}

    public function remove(Request $request) {
        Book::find($request->id)->delete();//
        return redirect('/book');//リダイレクト
    }

    public function find(Request $request)
    {
        return view('book.find',['input'=> '']);//book.findにinput変数を渡す。
    }

    public function search(Request $request)
    {
        // $request->input('search');  //使用されていない？
        $item = Book::find($request->input('search'));//search フィールドの値が書籍の ID として使用される
        $items = Book::where('name', 'like', '%' . $request->input('search') . '%')->get();//カラムnameに対して、部分一致検索
        $item = Book::nameLike($request->input)->get();//モデルの部分一致検索メソッドを起動
        $param = ['input'=>$request->input, 'item'=>$item];//viewに渡す情報を格納
        return view('book.find', $param);//paramの変数をfindへ送っている
    }
}

