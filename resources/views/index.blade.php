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
      {{$item->getArea()}}
    </td>
    <td>
      {{$item->getGenre()}}
    </td>
    <td>
      {{$item->description}}
    </td>
    <td>
      {{$item->image_url}}
    </td>
  </tr>
  @endforeach
</table>
@endsection