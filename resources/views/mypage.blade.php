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

  .reservation-number{
    
  }
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
</style>


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

    @endsection