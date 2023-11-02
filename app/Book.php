<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // エラー対策
    protected $guarded = array('id');

    // validateのルール設定
    public static $rules =array (
        'id' =>'',
        'name' =>'required' ,
        'price' => 'integer|min:0|max:150000'
    );
    public $timestamps = false; //これがあることで、'created_at' 'updated_at'の情報を生成しないようにしている　DB上にカラムを用意していない場合に効果的

    //nameequalを使えるようにしている
    public function scopeNameEqual($query, $str)
    {
        return $query->where('name',$str);
    }

    // getData()を有効化している
    public function getData() 
    {
        return $this->id.': '.$this->name.' ('.$this->price.')';
    }

    //部分一致検索を有効化
    public function scopeNameLike($query, $search)
{
    return $query->where('name', 'like', '%' . $search . '%');
}

}