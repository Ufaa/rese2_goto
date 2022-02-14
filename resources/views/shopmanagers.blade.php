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

  .shopmanager-create-area {
    position: absolute;
    top: 100px;
    left: 0px;
    width: 40%;
    margin: 0 5%;
    background-color: #005FFF;
  }

  .shop-edit-title-area {
    position: absolute;
    top: 720px;
    left: 0px;
    width: 40%;
    margin: 0 5%;
  }

  .shop-edit-area {
    position: absolute;
    top: 800px;
    left: 0px;
    width: 40%;
    margin: 0 5%;
    background-color: #005FFF;
  }

  .shopmanager-create-title,
  .shopmanager-list-title {
    font-size: 30px;
    font-weight: bold;
    text-align: center;
  }

  .shopmanager-list-title {
    font-size: 30px;
    font-weight: bold;
    text-align: center;
    margin-top: 90px;
  }

  .shopmanager-list-area {
    position: absolute;
    top: 100px;
    right: 0px;
    width: 40%;
    margin: 0 5%;
  }

  .shopmanager-list-card {
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
    width: 300px;
  }

  .btn-primary-edit {
    background-color: pink;
    border-radius: 5px;
    border-style: none;
    padding: 5%;
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
    <p class="shopmanager-create-title">新規店舗代表者登録</p>
  </div>
  <div class="header-right">
    <p class="shopmanager-list-title">店舗代表者一覧</p>
  </div>
</div>

<div class="contents">
  <!-- <div class="shopmanager-create-area">
    <form action="/shopmanager_create" method="post">
      @csrf
      <table>
        <tr>
          <th>代表者名</th>
          <td>
            <input type="text" class="name" name="name" value="" placeholder="店舗代表者名を入力してください">
          </td>
          <td>
        </tr>
        <tr>
          <th></th>
          <td>
            <button type="submit" class="btn-primary">
              登録する
            </button>
          </td>
        </tr>
      </table>
    </form>
  </div> -->

  <div class="shopmanager-create-area">
    <form action="/shopmanager_create2" method="post">
      @csrf
      <table>
        <tr>
          <th>代表者名</th>
          <td>
            <input type="text" class="name" name="name" value="" placeholder="店舗代表者名を入力してください">
          </td>
          <td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>
            <input type="text" class="email" name="email" value="" placeholder="店舗代表者名を入力してください">
          </td>
          <td>
        </tr>
        <tr>
          <th>パスワード</th>
          <td>
            <input type="text" class="password" name="password" value="" placeholder="店舗代表者名を入力してください">
          </td>
          <td>
        </tr>
        <tr>
          <th>権限</th>
          <td>
            <input type="number" class="role" name="role" value="5" placeholder="5">
          </td>
          <td>
        </tr>
        <tr>
          <th></th>
          <td>
            <button type="submit" class="btn-primary">
              登録する
            </button>
          </td>
        </tr>
      </table>
    </form>
  </div>

  <div class="shopmanager-list-area">
    @foreach($shopmanagers as $shopmanager)
    <div class="shopmanager-list-card">
      <table>
        <tr>
          <th>代表者ID</th>
          <th>代表者名</th>
          <th>店舗名</th>
          <th>登録日</th>
        </tr>
        <tr>
          <td>{{$shopmanager->id}}</td>
          <td>{{$shopmanager->name}}</td>
          <td>{{$shopmanager->shop_id}}</td>
          <td>{{$shopmanager->created_at->format('Y-m-d')}}</td>
        </tr>
      </table>
    </div>
    @endforeach

  </div>
  @endsection