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