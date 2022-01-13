@extends('layouts.default')
<style>
  body {
    background-color: rgb(230, 230, 230);
  }

  .card-list {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
  }

  .card {
    width: 15%;
  }

  img {
    width: 300px;
  }

  button {
    background-color: blue;
    color: white;
  }

  .search {
    background-color: blue;
    color: white;
  }
</style>
@section('title', 'rese')



@section('content')
<form action="find" method="POST">
  @csrf
  <input type="text" name="name" value="{{$input ?? ''}}">
  <select class="area_class" name="area" placeholder="エリア">
    <!-- <option value="1 || 2 || 3">All Area</option> -->
    <option [ngValue]=""></option>
    <option value="1">東京都</option>
    <option value="2">大阪府</option>
    <option value="3">福岡県</option>
  </select>
  <select class="genre_class" name="genre" placeholder="ジャンル">
    <!-- <option value="1 || 2 || 3 || 4 || 5 ">All Genre</option> -->
    <option [ngValue]=""></option>
    <option value="1">寿司</option>
    <option value="2">焼肉</option>
    <option value="3">居酒屋</option>
    <option value="4">イタリアン</option>
    <option value="5">ラーメン</option>
  </select>
  <input type="submit" name="search" value="見つける">
  <button class="reset" type="button" onclick="location.href='/'">リセット</button>
</form>

@if (@isset($item))
<div class="card-area">
  <div class="card-list">
    <div class="card">
      <div class="shop-image">
        <img src=" {{$item->image_url}}" alt="{{$item->name}}" width="100px">
      </div>
      <div class="area-genre-name">
        {{$item->name}}
      </div>
      <div class="area-genre-name">
        {{$item->area->name}}
        {{$item->genre->name}}
      </div>
      <form action="{{route('detail',$item->id)}}" method="get">
        <button type="submit" class="btn btn-primary">詳しく見る</button>
      </form>
    </div>
  </div>
</div>
</div>
@endif

<div class="card-area">
  <div class="card">
    <div class="shop-image">
      @foreach ($items ?? '' as $item)
      <img src=" {{$item->image_url}}" alt="{{$item->name}}">
    </div>
    <div class="shop-name">
      {{$item->name}}
    </div>
    <div class="area-genre-name">
      #{{$item->area->name}}
      #{{$item->genre->name}}
    </div>
    <form action="{{route('detail',$item->id)}}" method="get">
      <button type="submit" class="btn btn-primary">詳しく見る</button>
    </form>
    @endforeach
  </div>
</div>
@endsection