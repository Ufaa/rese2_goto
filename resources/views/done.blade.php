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
@section('title', 'done.blade.php')

@endsection

<!-- 予約ページ -->
<h1>予約完了</h1>

<body>
  <h4>ご予約ありがとうございます。</h4>
  <button class="reset" type="button" onclick="location.href='/'">店舗一覧に戻る</button>

</body>