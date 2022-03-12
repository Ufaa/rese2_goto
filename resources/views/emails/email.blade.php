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

  .send-email-area {
    background-color: white;
    padding: 40px 50px;
    border-radius: 3px;
    box-shadow: 2px 2px 4px 1px gray;
    position: absolute;
    top: 400px;
    left: 50%;
    transform: translateY(-50%) translateX(-50%);
    -webkit-transform: translateY(-50%) translateX(-50%);
    text-align: center;
  }

  .send-email-area p {
    font-size: 20px;
    margin: 5px;
  }

  .back {
    color: white;
    background-color: #0033FF;
    margin-top: 30px;
    border-style: none;
    border-radius: 5px;
    padding: 5px 15px;
  }

  .reservation_email-input {
    display: none;
  }

  @media screen and (max-width: 768px) {
    .send-email-area {
      top: 300px;
      width: 80%;
      padding: 10px 10px;
    }

    .send-email-area p {
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
  <form action="/send_email" method="POST">
    @csrf
    <div class="send-email-area">
      <div class="to-area">
        <p>予約番号:{{$user_data->id}}</p>
        <p>予約者名:{{$user_data->user->name}}</p>
        <p>メールアドレス:{{$user_data->user->email}}</p>
      </div>
      <input type="text" class="reservation_email-input" name="reservation_email" value="{{$user_data->user->email}}">
      <textarea rows="10" cols="40" class="mailbody" name="mailbody" value="{old('mail_body)}"></textarea><br>
      <button type="submit" class="btn-primary">
        メールを送信する
      </button>
      <button class="back" type="button" onclick="location.href='/shopmanage/shop'">戻る</button>
    </div>
  </form>
</body>
@endsection