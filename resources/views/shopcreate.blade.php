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

  .contents {
    position: relative;
  }

  .shop-create-area {
    position: absolute;
    top: 100px;
    left: 0px;
    width: 40%;
    margin: 0 5%;
    background-color: #005FFF;
  }

  .shop-create-title {
    font-size: 30px;
    font-weight: bold;
    text-align: center;
  }

  .btn-primary {
    background-color: yellowgreen;
    border-radius: 5px;
    border-style: none;
    padding: 5%;
  }

  .name {
    width: 200px;
  }

  .shopmanager_id_input {
    display: none;
  }

  .error {
    color: red;
    font-weight: bold;
    margin: 0 0 0 30px;
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
      {{Auth::user()->name}}さん
      @endauth
    </div>
    <p class="shop-create-title">新規店舗登録</p>
  </div>
  <div class="header-right">
  </div>
</div>

<div class="contents">
  <div class="shop-create-area">
    <form action="/create" method="post">
      @csrf
      <table>
        <input type="int" class="shopmanager_id_input" name="shopmanager_id" value="{{Auth::user()->id}}">
        <tr>
          <th>店舗名</th>
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
          <td>
            @error('description')
            <p class="error">{{$message}}</p>
            @enderror
            <textarea rows="10" cols="40" class="description" name="description" value="{{ old('description') }}"></textarea>
          </td>
        </tr>
        <tr>
          <th>店舗画像ジャンル</th>
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