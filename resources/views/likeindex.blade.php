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
@section('title', 'いいね一覧')

@section('content')
<table>

  <tr>
    <th>id</th>
    <th>user</th>
    <th>shop</th>
    <th>created_at</th>
  </tr>

  @foreach ($likes ?? '' as $like)
  <tr>
    <td>
      {{$like->id}}
    </td>
    <td>
      {{$like->user->name}}
    </td>
    <td>
      <!-- userはできるのに、なぜできない？、detailページではできるのに、なぜできない？ -->
      {{$like->shop_id}}
    </td>
    <td>
      {{$like->created_at}}
    </td>
  </tr>
  @endforeach
</table>
@endsection

<button class="reset" type="button" onclick="location.href='/'">店舗一覧に戻る</button>
</form>