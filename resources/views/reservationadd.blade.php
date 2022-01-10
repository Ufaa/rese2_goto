@extends('layouts.default')
<style>
  th {
    background-color: #289ADC;
    color: white;
    padding: 5px 40px;
  }

  tr:nth-child(4) td {
    padding: 10px;
  }

  td {
    padding: 25px 40px;
    background-color: #EEEEEE;
    text-align: center;
  }

  input {
    padding: 5px;
  }

  button {
    padding: 10px 20px;
    background-color: #289ADC;
    border: none;
    color: white;
  }
</style>
@section('title', 'add.blade.php')

@section('content')
<form action="/add" method="POST">
  <table>
    @csrf
    <tr>
      <th>
        予約店舗
      </th>
      <td>
        <input type="text" name="shop_id" value="">
      </td>
    </tr>
    <tr>
      <th>
        予約者
      </th>
      <td>
        <input type="text" name="user_id" value="">
      </td>
    </tr>
    <tr>
      <th>
        予約時間
      </th>
      <td>
        <input type="datetime-local" name="start_at">
      </td>
    </tr>
    <tr>
      <th>
        予約人数
      </th>
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

    <th></th>
    <td>
      <button>予約する</button>
    </td>
    </tr>
  </table>
</form>
@endsection