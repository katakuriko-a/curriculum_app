<x-layout>
    <x-slot name="title">
        新規登録画面 | ESA ACADEMY 生徒管理システム
    </x-slot>
    <div class="main_wrapper">
      <div class="main_content signup_content">
        <h2>新規投稿を作成</h2>
        {{-- ここからフォーム --}}
        <form method="get" action="{{ route('posts.store', $student)}}">
            @csrf

          <div class="form_group form_title">
            <label for="title">タイトル</label>
            <input
              class="form_parts"
              id="title"
              type="text"
              name="title"
              placeholder="タイトルを入力してください"
              value="{{ old('title') }}"
            />
            @error('title')
            <div class="error">{{ $message }}</div>
            @enderror
          </div>
          <div class="form_group form_content">
            <label for="content">投稿内容</label>
            <textarea class="form_parts" name="content" id="" placeholder="投稿内容を入力してください"></textarea>
            @error('content')
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


