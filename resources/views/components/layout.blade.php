<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
      integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
      crossorigin="anonymous"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
  </head>
  <body>
    <div class="side_menu">
      <div class="side_wrapper">
        <a href="{{ route('students.index')}}">
          <div class="img_logo"><img src="{{asset('img/logo.png')}}" alt="ロゴ画像" /></div>
        </a>
        <a href="{{ route('students.create')}}"
          ><div class="btn_new btn_option">
            <i class="fas fa-plus"></i><span>新規登録画面</span>
          </div></a
        >
        <nav>
          <ul>
            <a href="{{ route('students.index')}}" class="btn_option"
              ><li><i class="fas fa-home"></i>トップページ</li></a
            >
          </ul>
        </nav>
      </div>
      <img
        class="img_dec"
        src="{{asset('img/dec-side.png')}}"
        alt="ESA ACADEMY 生徒管理システム"
      />
    </div>
    <main>
      {{ $slot }}
    </main>
    <script src="{{asset('js/main.js')}}"></script>
  </body>
</html>
