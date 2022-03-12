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

  .done-area {
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

  .done-area p {
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

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

@section('content')

<body>
  <div class="title"><a href="/">Rese</a>
  </div>
  <div class="done-area">
    <p class="reservation-thanks">ご予約ありがとうございます。</p>
    <button class="back" type="button" onclick="location.href='/'">戻る</button>
  </div>
</body>
@endsection