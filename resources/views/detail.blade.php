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

<form action="create" method="POST">
  @csrf
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
  <select class="number_class" name="number" placeholder="人数">
    <option [ngValue]=""></option>
    <option value="1">1人</option>
    <option value="2">2人</option>
    <option value="3">3人</option>
    <option value="4">4人</option>
  </select>
  <input type="submit" value="予約する">
  <button class="reset" type="button" onclick="location.href='/'">店舗一覧に戻る</button>
</form>


<table>
  <tr>
    <th>user_name</th> <!-- 一時的 -->
    <!-- <td>$item->user->id</td> -->
    <td>$item->getDetail2()</td>
  </tr>
  <tr>
    <th>Shop</th>
    <td>$item->shop->name</td>
  </tr>
  <tr>
    <th>Date</th>
    <td>$item->start_at</td>
  </tr>
  <tr>
    <th>Time</th>
    <td>$item->start_at</td>
  </tr>
  <tr>
    <th>Number</th>
    <td>$item->num_of_users</td>
  </tr>

</table>