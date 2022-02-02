<x-layout>
    <x-slot name="title">
        登録内容編集画面 | ESA ACADEMY 生徒管理システム
    </x-slot>
    <header>
      <div class="search">
        <input type="text" placeholder="TEL検索" />
        <i class="fas fa-search btn_option"></i>
      </div>
    </header>
    <div class="main_wrapper">
      <div class="main_content signup_content">
        <h2>登録内容編集画面</h2>
        {{-- ここからフォーム --}}
        <form method="post" action="{{ route('tests.update', $test)}}">
            @method('PATCH')
            @csrf

          <div class="form_group form_name">
            <label for="name">名前</label>
            <input
              class="form_parts"
              id="name"
              type="text"
              name="name"
              placeholder="阿部 隆"
              value="{{ old('name', $test->name) }}"
            />
            @error('name')
            <div class="error">{{ $message }}</div>
            @enderror
          </div>
          <div class="form_group form_age">
            <label for="age">年齢</label>
            <input class="form_parts" id="age" name="age" type="text" placeholder="21"
            value="{{ old('age', $test->age) }}" />
            @error('age')
            <div class="error">{{ $message }}</div>
            @enderror
          </div>
          <div class="form_group form_birth">
            <label for="birth">生年月日</label>
            <input
              class="form_parts"
              id="birth"
              name="birth"
              type="text"
              placeholder="2000/6/21"
              value="{{ old('birth', $test->birth) }}"
            />
            @error('birth')
            <div class="error">{{ $message }}</div>
            @enderror
          </div>
          <div class="form_group form_mail">
            <label for="mail">e-mail</label>
            <input
              class="form_parts"
              id="mail"
              name="mail"
              type="email"
              placeholder="abe-takashi0622@email.com"
              value="{{ old('mail', $test->mail) }}"
            />
            @error('mail')
            <div class="error">{{ $message }}</div>
            @enderror
          </div>
          <div class="form_group form_tel">
            <label for="tel">TEL</label>
            <input
              class="form_parts"
              id="tel"
              name="tel"
              type="tel"
              placeholder="080-1234-5678"
              value="{{ old('tel', $test->tel) }}"
            />
            @error('tel')
            <div class="error">{{ $message }}</div>
            @enderror
          </div>
          <div class="form_group form_plan">
            <label for="plan">プラン名</label>
            <select class="form_parts" id="plan" name="plan" onchange="changeColor(this)">
              <option value="">---</option>
              <option @if(old('plan', $test->plan)=='PREMIUM') selected  @endif>PREMIUM</option>
              <option @if(old('plan', $test->plan)=='STANDARD') selected  @endif>STANDARD</option>
            </select>
            @error('plan')
            <div class="error">{{ $message }}</div>
            @enderror
          </div>
          <button class="signup_btn btn_option">
            <i class="fas fa-plus big_plus"></i>内容を変更する
          </button>
        </form>
      </div>
    </div>

</x-layout>


