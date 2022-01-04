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
@section('title', 'index.blade.php')

@section('content')
<table>
  <tr>
    <th>id</th>
    <th>name</th>
    <th>area</th>
    <th>genre</th>
    <th>descreption</th>
    <th>image</th>
    <th>詳細</th>
  </tr>
  @foreach ($items as $item)
  <tr>
    <td>
      {{$item->id}}
    </td>
    <td>
      {{$item->name}}
    </td>
    <td>
      {{$item->area->name}}
    </td>
    <td>
      {{$item->genre->name}}
    </td>
    <td>
      {{$item->description}}
    </td>
    <td>
      <img src=" {{$item->image_url}}" alt="{{$item->name}}" width="100px">
    </td>
    <td>
      <form action="{{route('detail',$item->id)}}" method="get">
        <button type="submit" class="btn btn-primary">詳しく見る</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
@endsection