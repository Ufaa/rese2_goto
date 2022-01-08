@extends('layouts.default')
<style>
  th {
    background-color: #289ADC;
    color: white;
    padding: 5px 40px;
  }

  td {
    padding: 25px 40px;
    background-color: #EEEEEE;
    text-align: center;
  }
</style>
@section('title', 'find.blade.php')

@section('content')
<form action="find" method="POST">
  @csrf
  <input type="text" name="name" value="{{$input ?? ''}}">
  <select class="area_class" name="area" placeholder="エリア">
    <!-- <option value="1 || 2 || 3">All Area</option> -->
    <option [ngValue]=""></option>
    <option value="東京都">東京都</option>
    <option value="大阪府">大阪府</option>
    <option value="福岡県">福岡県</option>
  </select>
  <select class="genre_class" name="genre" placeholder="ジャンル">
    <!-- <option value="1 || 2 || 3 || 4 || 5 ">All Genre</option> -->
    <option [ngValue]=""></option>
    <option value="寿司">寿司</option>
    <option value="焼肉">焼肉</option>
    <option value="居酒屋">居酒屋</option>
    <option value="イタリアン">イタリアン</option>
    <option value="ラーメン">ラーメン</option>
  </select>
  <input type="submit" value="見つける">
  <button class="reset" type="button" onclick="location.href='/'">リセット</button>
</form>

@if (@isset($item))
<table>
  <tr>
    <th>id</th>
    <th>name</th>
    <th>area</th>
    <th>genre</th>
    <th>descreption</th>
    <th>image</th>
    <th>詳細</th>
  </tr>
  <tr>
    <!-- <td>
      {{$item->getDetail()}}
    </td> -->
    <td>
      {{$item->id}}
    </td>
    <td>
      {{$item->name}}
    </td>
    <td>
      {{$item->area->name}}
    </td>
    <td>
      {{$item->genre->name}}
    </td>
    <td>
      {{$item->description}}
    </td>
    <td>
      <img src=" {{$item->image_url}}" alt="{{$item->name}}" width="100px">
    </td>
    <td>
      <form action="{{route('detail',$item->id)}}" method="get">
        <button type="submit" class="btn btn-primary">詳しく見る</button>
      </form>
    </td>
  </tr>
</table>
@endif
@endsection