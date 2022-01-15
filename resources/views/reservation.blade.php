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
@section('title', 'reservation.blade.php')

@section('content')
<!-- 一時的に設置、一覧に戻る -->
<button class="reset" type="button" onclick="location.href='/'">店舗一覧に戻る</button>

<table>
  <tr>
    <th>getDetail2</th>
    <th>id</th>
    <th>shop</th>
    <th>user</th>
    <th>num_of_users</th>
    <th>start_at</th>
    <th>created_at</th>
    <th>updated_at</th>
    <th>削除</th>
  </tr>

  @foreach ($reservations ?? '' as $reservation)
  <td>
    {{$reservation->getDetail2()}}
  </td>
  <td>
    {{$reservation->id}}
  </td>
  <td>
    {{$reservation->shop->name}}
  </td>
  <td>
    {{$reservation->user->name}}
  </td>
  <td>
    {{$reservation->num_of_users}}
  </td>
  <td>
    {{$reservation->start_at}}
  </td>
  <td>
    {{$reservation->created_at}}
  </td>
  <td>
    {{$reservation->updated_at}}
  </td>
  <td>
    <form action="{{route('reservations.destroy',$reservation->id)}}" method="post">
      {{ csrf_field() }}
      {{ method_field('delete') }}
      <button type="submit" class="btn btn-danger">削除</button>
    </form>
  </td>
  </tr>
  @endforeach
</table>
@endsection