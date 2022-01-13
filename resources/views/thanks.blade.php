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

@section('title', 'thanks.blade.php')

@section('content')

<body>

  <h1>登録完了</h1>

  <h4>ご登録ありがとうございます。</h4>
  <button class="reset" type="button" onclick="location.href='/'">店舗一覧に進む</button>

</body>
@endsection