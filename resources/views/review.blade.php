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

  .review {
    position: absolute;
    top: 100px;
    height: 600px;
    right: 0px;
    width: 40%;
    background-color: #005FFF;
    margin: 0 5%;
    border-radius: 5px;
  }

  .user-reservation-review-area {
    position: absolute;
    left: 0px;
    margin: 0 5%;
  }

  .review-title {
    margin-left: 5%;
    color: white;
    font-size: 30px;
    font-weight: bold;
  }

  .review-card {
    background-color: #005FFF;
    color: white;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-radius: 5px;
  }

  .review-comment {
    display: inline-block;
    width: 100%;
    border: 1px solid #999;
    box-sizing: border-box;
    margin: 0.5em 0;
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

  .reservation_id_input {
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
    </div>
  </div>
</div>

<div class="review">
  <div class="user-reservation-review-area">
    <p class="review-title">レビュー</p>
    <div class="review-card">
      <div class="review-card-header">
      </div>
      <form action="/reviewadd" method="POST">
        @csrf
        <table>
          <tr>
            <th>訪問した日</th>
            <td></td>
          </tr>
          <tr>
            <th>評価</th>
            <td>
              <select class="review-rate" name="rate">
                <option value=""></option>
                <option value="1">とても悪い</option>
                <option value="2">悪い</option>
                <option value="3">普通</option>
                <option value="4">良い</option>
                <option value="5">とても良い</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>コメント</th>
            <td><input type="text" class="review-comment" name="comment" value="" placeholder="コメントしてください"></td>
          </tr>
          <tr>
            <th></th>
            <td>
              <button type="submit" class="btn-review">評価する</button>
            </td>
          </tr>
        </table>
        <input type="text" class="reservation_id_input" name="reservation_id" value="{{$review->id}}">
      </form>
    </div>
  </div>
</div>
@endsection