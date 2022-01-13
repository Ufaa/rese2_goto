<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  <button type="button" class="menu-btn">
    <i class="fa fa-bars" aria-hidden="true"></i>
  </button>
  <div class="menu">
    <div class="menu__item">HOME</div>
    <div class="menu__item">LOGOUT</div>
    <div class="menu__item">MYPAGE</div>
  </div>

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

    /* ここからハンバーガーメニュー */
    /*----------------------------
* メニュー開閉ボタン
*----------------------------*/
    .menu-btn {
      position: fixed;
      top: 20px;
      left: 20px;
      z-index: 2;
      width: 40px;
      height: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #333;
      color: #fff;
    }

    /*----------------------------
* メニュー本体
*----------------------------*/
    .menu {
      position: fixed;
      top: 0;
      right: 0;
      z-index: 1;
      width: 100vw;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background: #555;
    }

    .menu__item {
      width: 100%;
      height: auto;
      padding: .5em 1em;
      text-align: center;
      color: #fff;
      box-sizing: border-box;
    }

    /*----------------------------
* アニメーション部分
*----------------------------*/

    /* アニメーション前のメニューの状態 */
    .menu {
      transform: translateX(100vw);
      transition: all .3s linear;
    }

    /* アニメーション後のメニューの状態 */
    .menu.is-active {
      transform: translateX(0);
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
  document.querySelector('.menu-btn').addEventListener('click', function() {
    document.querySelector('.menu').classList.toggle('is-active');
  });
</script>

</html>