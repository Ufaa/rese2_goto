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
@section('title', 'マイページ')

<button class="reset" type="button" onclick="location.href='/'">店舗一覧を見る</button>

@section('content')
<!-- 予約情報 -->
<table>
  <h1>予約状況</h1>
  <tr>
    <th>id</th>
    <th>user</th>
    <th></th>
  </tr>

  @foreach ($users ?? '' as $user)
  <tr>
    <td>
      {{$user->id}}
    </td>
    <td>
      {{$user->name}}
    </td>
  </tr>
  @endforeach
</table>


<!-- お気に入り情報 -->
<table>
  <h1>お気に入り店舗</h1>
  <tr>
    <th>id</th>
    <th>user</th>
    <th></th>
  </tr>

  @foreach ($users ?? '' as $user)
  <tr>
    <td>
      {{$user->id}}
    </td>
    <td>
      {{$user->name}}
    </td>
  </tr>
  @endforeach
</table>

@endsection