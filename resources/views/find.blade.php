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
  <input type="text" name="input" value="{{$input ?? ''}}">
  <select class="area_class" name="area" placeholder="エリア">
    <option value="1 || 2 || 3">All Area</option>
    <option value="1">東京都</option>
    <option value="2">大阪府</option>
    <option value="3">福岡県</option>
  </select>
  <select class="genre_class" name="genre" placeholder="ジャンル">
    <option value="1 || 2 || 3 || 4 || 5 ">All Genre</option>
    <option value="1">寿司</option>
    <option value="2">焼肉</option>
    <option value="3">居酒屋</option>
    <option value="3">イタリアン</option>
    <option value="3">ラーメン</option>
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