@extends('layouts.default')
<style>
  body {
    background-color: rgb(230, 230, 230);
  }

  .title {
    font-size: 40px;
    font-weight: bold;
    color: #0033FF;
    margin: -5px 0 0 70px;
  }

  .header {
    position: relative;
    padding: 40px;
  }

  .header-left {
    position: absolute;
    left: 0px;
    width: 40%;
    margin: 0 5%;
  }

  .header-right {
    position: absolute;
    height: 800px;
    right: 0px;
    width: 40%;
    margin: 0 5%;
    border-radius: 5px;
  }

  .login-name {
    font-size: 40px;
    font-weight: bold;
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
    top: 50px;
    left: 0px;
    width: 35%;
    margin: 0 5%;
  }

  .user-reservation-title {
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

  .user-like-area {
    position: absolute;
    height: 800px;
    top: 50px;
    right: 0px;
    width: 25%;
    margin: 0 5%;
    border-radius: 5px;
  }

  .user-like-title {
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
    padding: 0px 10px 10px 10px;
  }

  .card {
    background-color: white;
    border-radius: 3%;
    box-shadow: 2px 2px 4px 1px gray;
  }

  .reservation-card-header {
    display: flex;
    position: relative;
  }

  .clock-icon {
    padding: 20px;
  }

  .reservation-delete-icon {
    position: absolute;
    padding-top: 20px;
    right: 20px;
  }

  .fa-times-circle {
    color: white;
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
    border-radius: 5px;
    border-style: none;
    padding: 6%;
  }

  .btn-edit {
    background-color: white;
    border-radius: 5px;
    border-style: none;
  }

  .user-reservation-review-area {
    position: absolute;
    width: 25%;
    top: 50px;
    left: 37%;
    margin: 0 5%;
  }

  .error {
    color: red;
    font-weight: bold;
    margin: 0 0 0 15px;
  }
</style>

<head>
  <script src="https://kit.fontawesome.com/eb8d65ab2e.js" crossorigin="anonymous"></script>
</head>

@section('content')

<div class="title"><a href="/">Rese</a>
</div>

<div class="header">
  <div class="header-left">
    <div class="login-name">
      @auth
      {{Auth::user()->name}}さんのマイページ
      @endauth
    </div>
  </div>
  <div class="header-right">
  </div>
</div>

<div class="contents">
  <div class="user-reservation-area">
    <p class="user-reservation-title">予約状況</p>
    @foreach ($userreservation ?? '' as $reservation)
    <div class="reservation-card">
      <div class="reservation-card-header">
        <div class="clock-icon">
          <i class="far fa-clock"></i>
        </div>
        <p class="reservation-number">
          予約{{$loop->iteration}}
        </p>
        <div class="reservation-delete-icon">
          <form action="{{route('reservations.destroy',$reservation->id)}}" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button type="submit" style="background-color: #005FFF; border:none">
              <i class="far fa-times-circle fa-lg"></i>
            </button>
          </form>
        </div>
      </div>

      <table>
        <form action="{{route('reservations.update',$reservation->id)}}" method="post">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <tr>
            <th>shop</th>
            <td>{{$reservation->shop->name}}</td>
            <td> {!! QrCode::size(100)->generate(('{{Auth::user()->name}}')) !!}</td>
          </tr>
          <tr>
            <th>Date</th>
            <td>{{$reservation->start_at->format('Y-m-d')}}</td>
            <td>
              <input type="date" class="datetime-local" name="start_date" value="">
            </td>
          </tr>
          <tr>
            <th>Time</th>
            <td>{{$reservation->start_at->format('H:i')}}</td>
            <td>
              <input type="time" class="datetime-local" name="start_time" list="time-list">
              <datalist id="time-list">
                <option value="17:00"></option>
                <option value="17:30"></option>
                <option value="18:00"></option>
                <option value="18:30"></option>
                <option value="19:00"></option>
                <option value="19:30"></option>
                <option value="20:00"></option>
                <option value="20:30"></option>
                <option value="21:00"></option>
                <option value="21:30"></option>
                <option value="22:00"></option>
              </datalist>
            </td>
          </tr>
          <tr>
            <th>Number</th>
            <td>{{$reservation->num_of_users}}人</td>
            <td>
              <select class="number_class" name="num_of_users" placeholder="人数">
                <option [ngValue]=""></option>
                <option value="1">1人</option>
                <option value="2">2人</option>
                <option value="3">3人</option>
                <option value="4">4人</option>
              </select>
            </td>
          </tr>
          <tr>
            <th></th>
            <td></td>
            <td>
              <button type="submit" class="btn-edit">
                予約を変更する
              </button>
            </td>
        </form>
        <!-- 要変更 -->
        <form action="{{route('review',$reservation->shop->id)}}" method="get">
          <button type="submit" class="btn-review">評価する</button>
        </form>
        </tr>

      </table>
    </div>
    @endforeach
  </div>

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
  </div>

  <div class="user-reservation-review-area">
    <p class="user-reservation-title">レビュー</p>
    @foreach ($reviews as $review)
    <div class="reservation-card">
      <div class="reservation-card-header">
      </div>
      <form action="/reviewadd" method="POST">
        @csrf
        <table>
          <tr>
            <th>shop</th>
            <td>{{$review->shop->name}}</td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th>訪問日</th>
            <td>{{$review->start_at->format('Y-m-d')}}</td>
          </tr>
          <tr>
            <th>評価</th>
            <td>
              <select class="review-rate" name="rate" placeholder="">
                <option value=""></option>
                <option value="1">とても悪い</option>
                <option value="2">悪い</option>
                <option value="3">普通</option>
                <option value="4">良い</option>
                <option value="5">とても良い</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>コメント</th>
            <td><input type="text" class="review-comment" name="comment" value="" placeholder="コメントしてください"></td>
          </tr>
          <tr>
            <th></th>
            <td>
              <button type="submit" class="btn-review">評価する</button>
            </td>
          </tr>
        </table>
        <input type="text" name="reservation_id" value="{{$reservation->id}}" style="display:none;">
      </form>
    </div>
    @endforeach
  </div>
  @endsection