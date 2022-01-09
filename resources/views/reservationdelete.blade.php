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

  button {
    padding: 10px 20px;
    background-color: #289ADC;
    border: none;
    color: white;
  }
</style>
@section('title', 'reservationdelete.blade.php')

@section('content')
<form action="/reservationdelete" method="POST">
  <table>
    @csrf
    <tr>
      <th>
        予約id
      </th>
      <td>
        <input type="text" name="id" value="{{$form->id}}">
      </td>
    </tr>
    <tr>
      <th>
        shop_id
      </th>
      <td>
        <input type="text" name="shop" value="{{$form->shop_id}}">
      </td>
    </tr>

    <tr>
      <th></th>
      <td>
        <button>削除する</button>
      </td>
    </tr>
  </table>
</form>
@endsection