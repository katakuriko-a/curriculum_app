<x-layout>
    <x-slot name="title">
        新規登録画面 | ESA ACADEMY 生徒管理システム
    </x-slot>
    <header>
      <div class="search">
        <input type="text" placeholder="TEL検索" />
        <i class="fas fa-search btn_option"></i>
      </div>
    </header>
    <div class="main_wrapper">
      <div class="main_content signup_content">
        <h2>新規登録画面</h2>
        <form>
          <div class="form_group form_name">
            <label for="name">名前</label>
            <input
              class="form_parts"
              id="name"
              type="text"
              placeholder="阿部 隆"
            />
          </div>
          <div class="form_group form_age">
            <label for="age">年齢</label>
            <input class="form_parts" id="age" type="text" placeholder="21" />
          </div>
          <div class="form_group form_birth">
            <label for="birth">生年月日</label>
            <input
              class="form_parts"
              id="birth"
              type="text"
              placeholder="2000/6/21"
            />
          </div>
          <div class="form_group form_mail">
            <label for="mail">e-mail</label>
            <input
              class="form_parts"
              id="mail"
              type="email"
              placeholder="abe-takashi0622@email.com"
            />
          </div>
          <div class="form_group form_tel">
            <label for="tel">TEL</label>
            <input
              class="form_parts"
              id="tel"
              type="tel"
              placeholder="080-1234-5678"
            />
          </div>
          <div class="form_group form_plan">
            <label for="plan">プラン名</label>
            <select class="form_parts" id="plan" onchange="changeColor(this)">
              <option hidden>---</option>
              <option>PPREMIUM</option>
              <option>STANDARD</option>
            </select>
          </div>
        </form>
        <div class="signup_btn btn_option">
          <i class="fas fa-plus big_plus"></i>新規登録
        </div>
      </div>
    </div>

</x-layout>


