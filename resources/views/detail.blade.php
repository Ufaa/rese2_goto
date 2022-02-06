@extends('layouts.default')
<style>
  body {
    background-color: rgb(230, 230, 230);
  }

  .title {
    font-size: 40px;
    font-weight: bold;
    color: #0033FF;
    margin: 0 0 0 80px;
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
    background-color: white;
    border-style: none;
    border-radius: 5px;
    box-shadow: 2px 2px 4px 1px gray;
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
    margin: 0px 5% 10px 5%;
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

<head>
  <script src="https://kit.fontawesome.com/eb8d65ab2e.js" crossorigin="anonymous"></script>
</head>

@section('content')

<div class="contents">
  <div class="title"><a href="/">Rese</a>
  </div>

  <div class="detail">
    @section('content')
    <div class="detail-area">
      <div class="shop-name-area">
        <button class="back" type="button" onclick="location.href='/'"><i class="fas fa-chevron-left"></i></button>
        <p class="shop-name">{{optional($item)->name}}</h2>
      </div>
      <div class="image-area">
        <img src="{{$item->image_url}}" alt="{{$item->name}}" width="100%">
      </div>
      <div class="area-genre">
        #{{$item->area->name}} #{{$item->genre->name}}
      </div>
      <div class="description">
        {{optional($item)->description}}
      </div>
      @endsection
    </div>
  </div>


  <div class="reservation">
    <p class="reservation-title">予約</p>
    <div class="reservation-input">
      <form action="/add" method="POST">
        @csrf
        <input type="text" name="user_id" value="{{Auth::id()}}" style="display:none">
        <input type="text" name="shop_id" value="{{$item->id}}" style="display:none">
        <div class="reservation-date">
          <input type="date" class="datetime-local" name="start_date">
        </div>
        <div class="reservation-time">
          <input type="time" class="datetime-local" name="start_time">
        </div>
        <div class="reservation-number">
          <select class="number_class" name="num_of_users" placeholder="人数">
            <option [ngValue]=""></option>
            <option value="1">1人</option>
            <option value="2">2人</option>
            <option value="3">3人</option>
            <option value="4">4人</option>
          </select>
        </div>
        <div class="reservation-button-area">
          <input type="submit" class="reservation-submit" value="予約する">
        </div>
      </form>
    </div>

  </div>
</div>