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
    top: 56px;
    left: 0px;
    width: 40%;
    margin: 0 5%;
  }

  .header-right {
    position: absolute;
    left: 25%;
    top: -140px;
    border-radius: 5px;
  }

  .login-name {
    font-size: 32px;
    font-weight: bold;
  }

  th,
  td {
    text-align: left;
    color: white;
    padding: 10px 15px 10px 15px;
  }

  .contents {
    position: relative;
  }

  .shop-edit-area {
    position: absolute;
    top: 100px;
    left: 0px;
    width: 40%;
    margin: 0 5%;
    background-color: #005FFF;
    border-radius: 5px;
  }

  .shop-edit-title-area {
    position: absolute;
    top: 720px;
    left: 0px;
    width: 40%;
    margin: 0 5%;
  }

  .shop-edit-title {
    font-size: 30px;
    font-weight: bold;
    text-align: center;
  }

  .shopmanager-reservation-title {
    font-size: 30px;
    font-weight: bold;
    text-align: center;
    margin-top: 90px;
  }

  .shopmanager-reservation-area {
    position: absolute;
    top: 100px;
    right: 0px;
    width: 40%;
    margin: 0 5%;
  }

  .shopmanager-reservation-card {
    background-color: #005FFF;
    color: white;
    border-radius: 5px;
    margin-bottom: 20px;
  }

  .shopmanager-reservation-card-header {
    display: flex;
    position: relative;
  }

  .clock-icon {
    padding: 20px;
  }

  .fa-times-circle {
    color: white;
  }

  .btn-primary {
    background-color: yellowgreen;
    border-radius: 5px;
    border-style: none;
    padding: 5%;
  }

  .btn-edit {
    background-color: white;
    border-radius: 5px;
    border-style: none;
  }

  .name {
    width: 200px;
  }

  .btn-primary-edit {
    background-color: pink;
    border-radius: 5px;
    border-style: none;
    padding: 5%;
  }

  .genre_image {
    width: 100%;
  }

  .error {
    color: red;
    font-weight: bold;
    margin: 0 0 0 30px;
  }

  @media screen and (max-width: 768px) {

    th,
    td {
      padding: 5px 10px 5px 10px;
      font-size: 10px;
    }

    .header {
      position: unset;
      padding: 10px;
    }

    .header-left {
      position: unset;
      width: auto;
      margin: 0;
    }

    .header-right {
      position: unset;
      width: auto;
      height: auto;
    }

    .login-name {
      font-size: 16px;
      font-weight: bold;
    }

    .contents {
      position: unset;
    }

    .shop-edit-area {
      position: unset;
      width: auto;
      margin: 0;
    }

    .shop-edit-title {
      font-size: 16px;
      font-weight: bold;
      text-align: left;
    }

    .description {
      width: 100%;
      height: 30%;
    }

    .shopmanager-reservation-area {
      position: unset;
      width: auto;
      height: auto;
      margin: 0;
    }

    .shopmanager-reservation-title {
      font-size: 16px;
      font-weight: bold;
      margin-top: 30px;
      margin-left: 10px;
      text-align: left;
    }

    .reservation-card {
      padding-bottom: 5px;
    }
  }
</style>

<head>
  <script src="https://kit.fontawesome.com/eb8d65ab2e.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

@section('content')

<div class="title"><a href="/">Rese</a>
</div>

<div class="header">
  <div class="header-left">
    <div class="login-name">
      @auth
      {{Auth::user()->name}}さん
      @endauth
    </div>
    <p class="shop-edit-title">店舗情報変更</p>
  </div>
</div>

<div class="contents">

  <div class="shop-edit-area">
    <form action="{{route('shopmanager_shop_update',$shopmanager_shop->id)}}" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <table>
        <tr>
          <th></th>
          <td>現在の店舗情報</td>
          <td>変更後の店舗情報</td>
          <td>
        </tr>
        <tr>
        <tr>
          <th>店舗名</th>
          <td>{{$shopmanager_shop->name}}</td>
          <td>
            @error('name')
            <p class="error">{{$message}}</p>
            @enderror
            <input type="text" class="name" name="name" value="{{ old('name') }}" placeholder="店舗名を入力してください">
          </td>
          <td>
        </tr>
        <tr>
          <th>エリア</th>
          <td>{{$shopmanager_shop->area->name}}</td>
          <td>
            @error('area_id')
            <p class="error">{{$message}}</p>
            @enderror
            <select class="area_class" name="area_id" placeholder="エリア" value="{{ old('area_id') }}">
              <option value=""></option>
              <option value="1">東京都</option>
              <option value="2">大阪府</option>
              <option value="3">福岡県</option>
            </select>
          </td>
          <td>
        </tr>
        <tr>
          <th>ジャンル</th>
          <td>{{$shopmanager_shop->genre->name}}</td>
          <td>
            @error('genre_id')
            <p class="error">{{$message}}</p>
            @enderror
            <select class="genre_class" name="genre_id" placeholder="ジャンル" value="{{ old('genre_id') }}">
              <option value=""></option>
              <option value=" 1">寿司</option>
              <option value="2">焼肉</option>
              <option value="3">居酒屋</option>
              <option value="4">イタリアン</option>
              <option value="5">ラーメン</option>
            </select>
          </td>
          <td>
        </tr>
        <tr>
          <th>店舗の説明</th>
          <td>{{$shopmanager_shop->description}}</td>
          <td>
            @error('description')
            <p class="error">{{$message}}</p>
            @enderror
            <textarea rows="10" cols="40" class="description" name="description" value="{{ old('description') }}"></textarea>
          </td>
        </tr>
        <tr>
          <th>店舗画像ジャンル</th>
          <td>{{$shopmanager_shop->genre->name}}<img src="{{$shopmanager_shop->image_url}}" class="genre_image"></td>
          <td>
            @error('image_url')
            <p class="error">{{$message}}</p>
            @enderror
            <select class="genre_class" name="image_url" placeholder="ジャンル" value="{{ old('image_url') }}">
              <option value=""></option>
              <option value="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg">寿司</option>
              <option value="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg">焼肉</option>
              <option value="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg">居酒屋</option>
              <option value="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg">イタリアン</option>
              <option value="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg">ラーメン</option>
            </select>
          </td>
          <td>
        </tr>
        <tr>
          <th></th>
          <td></td>
          <td>
            <button type="submit" class="btn-primary-edit">
              店舗情報を変更する
            </button>
          </td>
        </tr>
      </table>
    </form>
  </div>

  <div class="shopmanager-reservation-area">
    <div class="header-right">
      <p class="shopmanager-reservation-title">あなたの店舗の予約状況</p>
    </div>
    @foreach($shopmanager_reservations as $shopmanager_reservation)
    <div class="shopmanager-reservation-card">
      <div class="shopmanager-reservation-card-header">
        <div class="clock-icon">
          <i class="far fa-clock"></i>
        </div>
        <p class="reservation-number">
          予約番号{{$loop->iteration}}
        </p>
      </div>
      <form action="{{route('email',$shopmanager_reservation->id)}}" method="get">
        <table>
          <tr>
            <th>予約者名</th>
            <td>{{optional($shopmanager_reservation)->user->name}}</td>
          </tr>
          <tr>
            <th>来店人数</th>
            <td>{{optional($shopmanager_reservation)->num_of_users}}名</td>
          </tr>
          <tr>
            <th>来店日</th>
            <td>{{optional($shopmanager_reservation)->start_at->format('Y-m-d')}}</td>
          </tr>
          <tr>
            <th>来店時間</th>
            <td>{{optional($shopmanager_reservation)->start_at->format('h:m')}}</td>
          </tr>
          <tr>
            <th>メールを送信する</th>
            <td> <button type="submit" class="btn-send-mail">送信画面へ</button>
            </td>
          </tr>
        </table>
      </form>
    </div>
    @endforeach

  </div>
  @endsection