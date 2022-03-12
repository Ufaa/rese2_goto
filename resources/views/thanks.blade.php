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
    margin: 0 0 0 70px;
  }

  .thanks-area {
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

  .thanks-area p {
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

  @media screen and (max-width: 768px) {
    .thanks-area {
      top: 200px;
      width: 80%;
      padding: 10px 10px;
    }

    .thanks-area p {
      font-size: 12px;
      margin: 10px;
    }

    .back {
      margin-top: 10px;
    }
  }
</style>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


@section('content')

<body>
  <div class="title"><a href="/">Rese</a>
  </div>
  <div class="thanks-area">
    <p class="reservation-thanks">会員登録ありがとうございます。</p>
    <button class="back" type="button" onclick="location.href='/login'">ログイン</button>
  </div>
</body>
@endsection