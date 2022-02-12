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
    font-size: 32px;
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

  .shop-create-area {
    position: absolute;
    left: 0px;
    width: 40%;
    margin: 0 5%;
    background-color: #005FFF;
  }

  .shop-create-title {
    font-size: 30px;
    font-weight: bold;
    text-align: center;
    color: white;
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
    right: 0px;
    width: 40%;
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
    padding: 10px 10px;
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

  .user-reservation-review-area {
    position: absolute;
    width: 100%;
    left: 0px;
    margin: 0 5%;
  }

  .error {
    color: red;
    font-weight: bold;
    margin: 0 0 0 15px;
  }

  .name {
    width: 200px;
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
  </div>
  <div class="header-right">
    <div class="login-name">
      @auth
      {{Auth::user()->name}}さん
      @endauth
    </div>
  </div>
</div>

<div class="contents">
  <div class="shop-create-area">
    <p class="shop-create-title">新規店舗登録</p>
    <form action="/create" method="post">
      @csrf
      <table>
        <tr>
          <th>店舗名</th>
          <td>
            <input type="text" class="name" name="name" value="" placeholder="店舗名を入力してください">
          </td>
          <td>
        </tr>
        <tr>
          <th>エリア</th>
          <td>
            <select class="area_class" name="area_id" placeholder="エリア">
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
          <td>
            <select class="genre_class" name="genre_id" placeholder="ジャンル">
              <option value=""></option>
              <option value="1">寿司</option>
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
          <td>
            <textarea rows="10" cols="60" class="description" name="description" value="">
          </textarea>
          </td>
        </tr>
        <tr>
          <th>店舗画像ジャンル</th>
          <td>
            <select class="genre_class" name="image_url" placeholder="ジャンル">
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
          <td>
            <button type="submit" class="btn-primary">
              店舗情報を登録する
            </button>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>

@endsection