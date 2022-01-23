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
@section('title', 'マイページ')

<button class="reset" type="button" onclick="location.href='/'">店舗一覧を見る</button>

@section('content')
<!-- 予約情報 -->
<div class="contents">
  <div class="reservation-area">
    <h1>予約状況</h1>
    @foreach ($userreservations ?? '' as $userreservation)
    <div class="reservation-card">
      <p class="reservation-number">予約{{$userreservation->reservation->id}}</p>
      <table>
        <tr>
          <th>shop</th>
          <td>{{$userreservation->reservation->shop->name}}</td>
        </tr>
        <tr>
          <th>Date</th>
          <td>{{$userreservation->reservation->start_at}}</td>
        </tr>
        <tr>
          <th>Time</th>
          <td>{{$userreservation->reservation->start_at}}</td>
        </tr>
        <tr>
          <th>Number</th>
          <td>{{$userreservation->reservation->num_of_users}}
          <td>
        </tr>
      </table>
    </div>
    @endforeach
  </div>

  <!-- お気に入り情報 -->
  <div class="like-area">
    <h1>{{$userlike->user->name}}さん</h1>
    <h1>お気に入り店舗</h1>
    <div class="card-area">
      @foreach ($items as $item)
      <div class="card-list">
        <div class="card">
          <div class="image-area">
            <img src=" {{$item->image_url}}" alt="{{$item->name}}">
          </div>
          <p class="shop">{{$item->name}}</p>
          <p class="area-genre">#{{$item->area->name}} #{{$item->genre->name}}</P>
          <div class="detail-like">
            <form action="{{route('detail',$item->id)}}" method="get">
              <button type="submit" class="btn btn-primary">詳しく見る</button>
            </form>
            <!-- いいね機能 -->
            @if($item->is_liked_by_auth_user())
            <a href="{{ route('shop.unlike', ['id' => $item->id]) }}" class="unlike-btn"><i class="fas fa-heart"></i></a>
            @else
            <a href="{{ route('shop.like', ['id' => $item->id]) }}" class="like-btn"><i class="fas fa-heart"></i></a>
            @endif
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</div>






@endsection