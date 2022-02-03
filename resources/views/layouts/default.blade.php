<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  @auth
  <div class="hamburger-menu">
    <input type="checkbox" id="menu-btn-check">
    <label for="menu-btn-check" class="menu-btn"><span></span></label>
    <!--ここからメニュー-->
    <div class="menu-content">
      <ul>
        <li>
          <a href="/">Home</a>
        </li>
        <li>
          <a href="javascript:document.logout.submit()">Logout</a>
          <form name="logout" action="{{route('logout')}}" method="post" style="display: none">
            @csrf
          </form>
        </li>
        <li>
          <a href="/mypage">Mypage</a>
        </li>
      </ul>
    </div>
    <!--ここまでメニュー-->
  </div>
  @endauth

  @guest
  <div class="hamburger-menu">
    <input type="checkbox" id="menu-btn-check">
    <label for="menu-btn-check" class="menu-btn"><span></span></label>
    <!--ここからメニュー-->
    <div class="menu-content">
      <ul>
        <li>
          <a href="/">Home</a>
        </li>
        <li>
          <a href="/register">Resistration</a>
        </li>
        <li>
          <a href="/login">Login</a>
        </li>
      </ul>
    </div>
    <!--ここまでメニュー-->
  </div>
  @endguest

  <style>
    body {
      font-size: 16px;
      margin: 5px;
    }

    h1 {
      font-size: 60px;
      color: white;
      text-shadow: 1px 0 5px #289ADC;
      letter-spacing: -4px;
      margin-left: 10px
    }

    .content {
      margin: 10px;
    }

    a {
      text-decoration: none;
      color: #0033FF;
    }

    /* ここからハンバーガーメニュー */
    .menu-btn {
      position: fixed;
      top: 10px;
      left: 15px;
      display: flex;
      height: 50px;
      width: 50px;
      border-radius: 5px;
      justify-content: center;
      align-items: center;
      z-index: 90;
      color: white;
      /*ボタンの背景色*/
      background-color: #005FFF;
      box-shadow: 2px 2px 4px 1px gray;
    }

    .menu-btn span,
    .menu-btn span:before,
    .menu-btn span:after {
      content: '';
      display: block;
      height: 3px;
      width: 25px;
      border-radius: 3px;
      /*ボタンの線の色*/
      background-color: white;
      position: absolute;
      transition: all 300ms 0s ease;
    }

    .menu-btn span:before {
      bottom: 8px;
      width: 15px;
    }

    .menu-btn span:after {
      top: 8px;
      width: 7px;
    }

    #menu-btn-check {
      display: none;
    }

    #menu-btn-check:checked~.menu-btn span {
      background-color: rgba(255, 255, 255, 0);
      /*メニューオープン時は真ん中の線を透明にする*/
      transition: all 300ms 0s ease;
    }

    #menu-btn-check:checked~.menu-btn span::before {
      bottom: 0;
      width: 25px;
      transform: rotate(45deg);
      background-color: white;
      transition: all 300ms 0s ease;
    }

    #menu-btn-check:checked~.menu-btn span::after {
      top: 0;
      width: 25px;
      transform: rotate(-45deg);
      background-color: white;
      transition: all 300ms 0s ease;
    }

    .menu-content {
      width: 100%;
      height: 100%;
      position: fixed;
      top: 0;
      top: -100%;
      z-index: 80;
      background-color: white;
      color: #222;
      transition: all 500ms 0s ease;
    }

    #menu-btn-check:checked~.menu-content {
      top: 0;
      /*メニューを画面内へ*/
    }

    .menu-content ul {
      padding: 250px 10px 0;
      list-style: none;
    }

    .menu-content ul li {
      text-align: center;
      top: 200px;
    }

    .menu-content ul li a {
      display: block;
      width: 100%;
      font-size: 35px;
      box-sizing: border-box;
      text-decoration: none;
      padding: 9px 15px 10px 0;
      position: relative;
    }

    .menu-content ul li a::before {
      width: 7px;
      height: 7px;
      border-top: solid 2px #ccc;
      border-right: solid 2px #ccc;
      transform: rotate(45deg);
      position: absolute;
      right: 11px;
      top: 16px;
    }
  </style>
</head>

<body>
  <h1>@yield('title')</h1>
  <div class="content">
    @yield('content')
  </div>
</body>

<script>

</script>

</html>