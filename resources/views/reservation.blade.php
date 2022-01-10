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
<form action="/reservation" method="POST">
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

    @foreach ($items ?? '' as $item)
    <tr>
      <td>
        {{$item->getDetail2()}}
      </td>
      <td>
        {{$item->id}}
      </td>
      <td>
        {{$item->shop->name}}
      </td>
      <td>
        {{$item->user->name}}
      </td>
      <td>
        {{$item->num_of_users}}
      </td>
      <td>
        {{$item->start_at}}
      </td>
      <td>
        {{$item->created_at}}
      </td>
      <td>
        {{$item->updated_at}}
      </td>
      <td>

        <button>削除</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection