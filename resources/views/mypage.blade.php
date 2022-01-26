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

th {
background-color: #289ADC;
color: white;
padding: 5px 40px;
}

tr:nth-child(odd) td {
background-color: #FFFFFF;
}

td {
padding: 25px 40px;
background-color: #EEEEEE;
text-align: center;
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

.detail {
position: absolute;
left: 0px;
}

.detail-area {
width: 40%;
margin: 0 5%;
}

.shop-name-area {
display: flex;
}

.shop-name {
font-size: 30px;
font-weight: bold;
}

.area-genre {
margin: 20px 0;
}

.reservation {
position: absolute;
height: 800px;
right: 0px;
width: 40%;
background-color: #005FFF;
margin: 0 5%;
border-radius: 5px;
}

.reservation-title {
margin-left: 5%;
color: white;
font-size: 30px;
font-weight: bold;
}

.datetime-local {
width: 90%;
height: 40px;
margin: 20px 5% 10px 5%;
}

.number_class {
width: 90%;
height: 40px;
margin: 0px 5% 10px 5%;
}

.reservation-submit {
position: absolute;
border: none;
background-color: #0033FF;
color: white;
width: 100%;
height: 50px;
text-align: center;
bottom: 0;
border-radius: 0 0 5px 5px;
}

</style>

@section('title', 'マイページ')

<button class="reset" type="button" onclick="location.href='/'">店舗一覧を見る</button>

@section('content')

@auth
ログイン名：{{Auth::user()->name}}
<form action="{{route('logout')}}" method="post">
  @csrf
  <button type="submit" class="logout-button">ログアウト</button>
</form>
@endauth

@foreach($userreservation as $reservation)
{{$reservation->shop->name}}
@endforeach

<!-- 予約情報 -->
<div class="contents">
  <div class="reservation-area">
    <h1>予約状況</h1>
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

  @endsection