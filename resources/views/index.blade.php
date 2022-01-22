@extends('layouts.default')
<style>
  body {
    background-color: rgb(230, 230, 230);
  }

  img {
    width: 300px;
  }

  button {
    background-color: blue;
    color: white;
  }

  .card-area {
    display: flex;
    width: 100%;
    flex-wrap: wrap;
  }

  .card-list {
    width: 300px;
    display: flex;
    padding: 0 5px;
  }

  .search {
    background-color: blue;
    color: white;
  }

  .detail-like {
    display: flex;
    justify-content: space-between;
  }

  .like-btn {
    width: 25px;
    height: 30px;
    font-size: 25px;
    color: #808080;
    margin-left: 20px;
  }

  .unlike-btn {
    width: 25px;
    height: 30px;
    font-size: 25px;
    color: #e54747;
    margin-left: 20px;
  }
</style>
@section('title', 'rese')

<head>
  <script src="https://kit.fontawesome.com/eb8d65ab2e.js" crossorigin="anonymous"></script>
</head>

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
      <img src=" {{$item->image_url}}" alt="{{$item->name}}">
      <p>{{$item->name}}</p>
      <p>#{{$item->area->name}}　#{{$item->genre->name}}</P>
      <form action="{{route('detail',$item->id)}}" method="get">
        <button type="submit" class="btn btn-primary">詳しく見る</button>
      </form>
      <form action="{{route('shops.destroy',$item->id)}}" method="post">
        {{ csrf_field() }}
        {{ method_field('delete') }}
        <button type="submit" class="btn btn-danger">削除</button>
      </form>
      <!-- いいね機能 -->
      <div>
        @if($item->is_liked_by_auth_user())
        <a href="{{ route('shop.unlike', ['id' => $item->id]) }}" class="unlike-btn"><i class="fas fa-heart"></i></a>
        @else
        <a href="{{ route('shop.like', ['id' => $item->id]) }}" class="like-btn"><i class="fas fa-heart"></i></a>
        @endif
      </div>
    </div>
  </div>
</div>
@endif

<div class="card-area">
  @foreach ($items ?? '' as $item)
  <div class="card-list">
    <div class="card">
      <img src=" {{$item->image_url}}" alt="{{$item->name}}">
      <p>{{$item->name}}</p>
      <p>#{{$item->area->name}}　#{{$item->genre->name}}</P>
      <div class="detail-like">
        <form action="{{route('detail',$item->id)}}" method="get">
          <button type="submit" class="btn btn-primary">詳しく見る</button>
        </form>
        <!-- いいね機能 -->
        @if($item->is_liked_by_auth_user())
        <a href="{{ route('shop.unlike', ['id' => $item->id]) }}" class="unlike-btn"><i class="fas fa-heart"></i></a>
        @else
        <a href="{{ route('shop.like', ['id' => $item->id]) }}" class="like-btn"><i class="fas fa-heart"></i></a>
        @endif
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection