@extends('layouts.default')
<style>
  body {
    background-color: rgb(230, 230, 230);
  }

  .title {
    font-size: 40px;
    font-weight: bold;
    color: #0033FF;
    margin: 10px 0 0 70px;
  }

  th,
  td {
    text-align: left;
    color: white;
    padding: 10px 15px 10px 15px;
  }


  .back {
    height: 30px;
    width: 30px;
    top: 20px;
    margin-top: 35px;
    margin-right: 10px;
  }

  .contents {
    position: relative;
  }

  .user-reservation-area {
    position: absolute;
    left: 0px;
    width: 40%;
    margin: 0 5%;
  }

  .user-reservation-title {
    margin-left: 5%;
    font-size: 30px;
    font-weight: bold;
  }

  .reservation-card {
    background-color: #005FFF;
    color: white;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-radius: 5px;
  }

  .reservation-number {}

  .user-like-area {
    position: absolute;
    height: 800px;
    right: 0px;
    width: 40%;
    margin: 0 5%;
    border-radius: 5px;
  }

  .user-like-title {
    margin-left: 5%;
    font-size: 30px;
    font-weight: bold;
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

  img {
    width: 300px;
    border-radius: 3% 3% 0 0;
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

<div class="title"><a href="/">Rese</a>
</div>

<!-- ログイン情報は一時的に設置 -->
@auth
ログイン名：{{Auth::user()->name}}さん
<form action="{{route('logout')}}" method="post">
  @csrf
  <button type="submit" class="logout-button">ログアウト</button>
</form>
@endauth

<!-- 予約情報 -->
<div class="contents">
  <div class="user-reservation-area">
    <p class="user-reservation-title">予約状況</p>
    @foreach ($userreservation ?? '' as $reservation)
    <div class="reservation-card">
      <p class="reservation-number">予約{{$reservation->id}}</p>
      <table>
        <tr>
          <th>shop</th>
          <td>{{$reservation->shop->name}}</td>
        </tr>
        <tr>
          <th>Date</th>
          <td>{{$reservation->start_at}}</td>
        </tr>
        <tr>
          <th>Time</th>
          <td>{{$reservation->start_at}}</td>
        </tr>
        <tr>
          <th>Number</th>
          <td>{{$reservation->num_of_users}}人</td>
        </tr>
      </table>
    </div>
    @endforeach
  </div>

  <!-- お気に入り情報 -->
  <div class="user-like-area">
    <p class="user-like-title">お気に入り店舗</p>

    <div class="card-area">
      @foreach ($userlikes as $userlike)
      <div class="card-list">
        <div class="card">
          <div class="image-area">
            <img src=" {{$userlike->shop->image_url}}" alt="{{$userlike->shop->name}}">
          </div>
          <p class="shop">{{$userlike->shop->name}}</p>
          <p class="area-genre">#{{$userlike->shop->area->name}} #{{$userlike->shop->genre->name}}</P>
          <div class="detail-like">
            <form action="{{route('detail',$userlike->shop->id)}}" method="get">
              <button type="submit" class="btn btn-primary">詳しく見る</button>
            </form>
            <!-- いいね機能 -->
            @if($userlike->shop->is_liked_by_auth_user())
            <a href="{{ route('shop.unlike', ['id' => $userlike->shop->id]) }}" class="unlike-btn"><i class="fas fa-heart"></i></a>
            @else
            <a href="{{ route('shop.like', ['id' => $userlike->shop->id]) }}" class="like-btn"><i class="fas fa-heart"></i></a>
            @endif

            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    @endsection