@extends('layouts.default')
<style>
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
</style>
@section('title', 'detail.blade.php')

@section('content')
<table>
  <tr>
    <th>id</th>
    <!--データの受け渡しができているかの確認のため一時的-->
    <th>user</th>
    <th>name</th>
    <th>area</th>
    <th>genre</th>
    <th>descreption</th>
    <th>image</th>
  </tr>

  <tr>
    <td>
      {{optional($item)->id}}
    </td>
    <!--データの受け渡しができているかの確認のため一時的-->
    <td>
      @foreach($item->reservations as $reservation)
      {{$reservation->user->name}}
      @endforeach
    </td>
    <td>
      {{optional($item)->name}}
    </td>
    <td>
      {{$item->area->name}}
    </td>
    <td>
      {{$item->genre->name}}
    </td>
    <td>
      {{optional($item)->description}}
    </td>
    <td>
      <img src="{{$item->image_url}}" alt="{{$item->name}}" width="100px">
    </td>
  </tr>

</table>
@endsection

<!-- 予約ページ -->
<h1>予約</h1>

<form action="/add" method="POST">
  @csrf
  <table>
    <tr>
      <th>user</th> <!-- 一時的 -->
      <!-- <td>$item->user->id</td> -->
      <td>
        <input type="text" name="user_id" value="{{Auth::id()}}" style="display:none">{{Auth::id()}}
      </td>
    </tr>
    <tr>
      <th>Shop</th>
      <td>
        <input type="text" name="shop_id" value="{{$item->id}}" style="display:none">
        {{$item->name}}
      </td>
    </tr>
    <tr>
      <th>Date</th>
      <td>
        <input type="datetime-local" name="start_at">
        <!--　どちらがいいかわからないので一旦コメントアウト<input type="date" class="form-control" id="date" name="date">
  <input type="time" class="form-control" id="time" name="time">
  <select class="time_class" name="time" placeholder="時間">

  <option [ngValue]=""></option>
    <option value="17:00">17:00</option>
    <option value="18:00">18:00</option>
    <option value="19:00">19:00</option>
    <option value="20:00">20:00</option>
    <option value="21:00">21:00</option>
  </select> -->
      </td>
    </tr>
    <!-- 日にちと時間を分けれていないので一旦隠す
    <tr>
      <th>Time</th>
      <td>$item->start_at</td>
    </tr> -->
    <tr>
      <th>Number</th>
      <td>
        <select class="number_class" name="num_of_users" placeholder="人数">
          <option [ngValue]=""></option>
          <option value="1">1人</option>
          <option value="2">2人</option>
          <option value="3">3人</option>
          <option value="4">4人</option>
        </select>
      </td>
    </tr>
  </table>

  <input type="submit" value="予約する">
  <button class="reset" type="button" onclick="location.href='/'">店舗一覧に戻る</button>
</form>