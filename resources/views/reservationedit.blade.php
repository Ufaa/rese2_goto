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

@section('title', 'reservationedit.blade.php')

@section('content')
<form action="/reservationedit" method="POST">
  <table>
    @csrf
    <tr>
      <th>
        id
      </th>
      <td>
        <input type="text" name="id" value="{{$form->id}}">
      </td>
    </tr>
    <tr>
      <th>
        shop
      </th>
      <td>
        <input type="text" name="shop_id" value="{{$form->shop_id}}">
      </td>
    </tr>
    <tr>
      <th>
        user
      </th>
      <td>
        <input type="text" name="user_id" value="{{$form->user_id}}">
      </td>
    </tr>
    <tr>
      <th>
        num_of_users
      </th>
      <td>
        <input type="text" name="num_of_users" value="{{$form->num_of_users}}">
      </td>
    </tr>
    <tr>
    <tr>
      <th>
        start_at
      </th>
      <td>
        <input type="datetime-local" name="start_at" value="{{$form->start_at}}">
      </td>
    </tr>
    <tr>
      <th></th>
      <td>
        <button>変更する</button>
      </td>
    </tr>
  </table>
</form>
@endsection