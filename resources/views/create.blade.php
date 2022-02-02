<x-layout>
    <x-slot name="title">
        新規登録画面 | ESA ACADEMY 生徒管理システム
    </x-slot>
    <div class="main_wrapper">
      <div class="main_content signup_content">
        <h2>新規登録画面</h2>
        {{-- ここからフォーム --}}
        <form method="post" action="{{ route('students.store')}}">
            @csrf

          <div class="form_group form_name">
            <label for="name">名前</label>
            <input
              class="form_parts"
              id="name"
              type="text"
              name="name"
              placeholder="阿部 隆"
              value="{{ old('name') }}"
            />
            @error('name')
            <div class="error">{{ $message }}</div>
            @enderror
          </div>
          <div class="form_group form_age">
            <label for="age">年齢</label>
            <input class="form_parts" id="age" name="age" type="text" placeholder="21"
            value="{{ old('age') }}" />
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
              value="{{ old('birth') }}"
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
              value="{{ old('mail') }}"
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
              value="{{ old('tel') }}"
            />
            @error('tel')
            <div class="error">{{ $message }}</div>
            @enderror
          </div>
          <div class="form_group form_plan">
            <label for="plan">プラン名</label>
            <select class="form_parts" id="plan" name="plan" onchange="changeColor(this)">
              <option value="">---</option>
              <option @if(old('plan')=='PREMIUM') selected  @endif>PREMIUM</option>
              <option @if(old('plan')=='STANDARD') selected  @endif>STANDARD</option>
            </select>
            @error('plan')
            <div class="error">{{ $message }}</div>
            @enderror
          </div>
          <button class="signup_btn btn_option">
            <i class="fas fa-plus big_plus"></i>新規登録
          </button>
        </form>
      </div>
    </div>

</x-layout>


