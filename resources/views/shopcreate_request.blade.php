@extends('layouts.default')
<style>
  body {
    background-color: rgb(230, 230, 230);
    position: relative;
  }

  .title {
    font-size: 40px;
    font-weight: bold;
    color: #0033FF;
    margin: -5px 0 0 70px;
  }

  .shopcreate_request-area {
    background-color: white;
    padding: 80px 100px;
    border-radius: 3px;
    box-shadow: 2px 2px 4px 1px gray;
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translateY(-50%) translateX(-50%);
    -webkit-transform: translateY(-50%) translateX(-50%);
    text-align: center;
  }

  .shopcreate_request-area p {
    font-size: 30px;
  }

  .back {
    color: white;
    background-color: #0033FF;
    margin-top: 30px;
    border-style: none;
    border-radius: 5px;
    padding: 5px 15px;
  }
</style>

@section('content')

<body>
  <div class="title"><a href="/">Rese</a>
  </div>
  <div class="shopcreate_request-area">
    <p class="shopcreate_request-thanks">店舗が登録されていません</p>
    <button class="back" type="button" onclick="location.href='/shopcreate'">店舗を登録する</button>
  </div>
</body>
@endsection