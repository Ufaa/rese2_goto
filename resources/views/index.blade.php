@extends('layouts.default')
<style>
  body {
    background-color: rgb(230, 230, 230);
  }

  img {
    width: 300px;
    border-radius: 3% 3% 0 0;
  }

  .header {
    display: flex;
    justify-content: space-between;
    margin: 0 20px 0 0;
  }

  .title {
    font-size: 40px;
    font-weight: bold;
    color: #0033FF;
    margin: 0 0 0 70px;
  }

  .title a {
    text-decoration: none;
    color: #0033FF;
  }

  .find {
    margin-top: 20px;
  }

  .shop {
    padding: 0 5%;
    margin: 5% 0% 0% 0%;
    font-size: 18px;
    font-weight: bold;
  }

  .area-genre {
    padding: 0 5%;
    margin: 0% 0% 5% 0%;
    font-size: 12px;
  }

  button {
    background-color: #0033FF;
    color: white;
    border-radius: 3%;
  }

  .card-area {
    display: flex;
    width: 100%;
    flex-wrap: wrap;
  }

  .card-list {
    width: 300px;
    display: flex;
    padding: 10px 10px;
  }

  .card {
    background-color: white;
    border-radius: 3%;
    box-shadow: 2px 2px 4px 1px gray;
  }

  .search {
    background-color: blue;
    color: white;
  }

  .detail-like {
    display: flex;
    justify-content: space-between;
    padding: 0 5%;
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

  .btn-primary {
    width: 100px;
    background-color: #3838ff;
    color: white;
    border-radius: 10%;
    border-style: none;
    padding: 6%;
  }
</style>

<head>
  <script src="https://kit.fontawesome.com/eb8d65ab2e.js" crossorigin="anonymous"></script>
</head>

@section('content')
<div class="header">
  <div class="title"><a href="/">Rese</a>
  </div>
  <div class="find">
    <form action="find" method="POST">
      @csrf
      <select class="area_class" name="area" placeholder="エリア">
        <option value="">All Area</option>
        <option value="1">東京都</option>
        <option value="2">大阪府</option>
        <option value="3">福岡県</option>
      </select>
      <select class="genre_class" name="genre" placeholder="ジャンル">
        <option value="">All Genre</option>
        <option value="1">寿司</option>
        <option value="2">焼肉</option>
        <option value="3">居酒屋</option>
        <option value="4">イタリアン</option>
        <option value="5">ラーメン</option>
      </select>
      <input type="text" name="name" value="{{$input ?? ''}}" placeholder=""><i class="fas fa-search">search...</i>
      <input type="submit" name="search" value="見つける" style="display: none;">
    </form>
  </div>
</div>

@if (@isset($item))
<div class="card-area">
  <div class="card-list">
    <div class="card">
      <img src=" {{$item->image_url}}" alt="{{$item->name}}">
      <div class="shop">{{$item->name}}</div>
      <div class="area-genre">#{{$item->area->name}}　#{{$item->genre->name}}</div>
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
      <div class="image-area">
        <img src=" {{$item->image_url}}" alt="{{$item->name}}">
      </div>
      <p class="shop">{{$item->name}}</p>
      <p class="area-genre">#{{$item->area->name}} #{{$item->genre->name}}</P>
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

        </form>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection