<x-layout>
    <x-slot name="title">
        進捗報告編集 | ESA ACADEMY 生徒管理システム
    </x-slot>
    <div class="main_wrapper">
      <div class="main_content signup_content">
        <h2>投稿内容を編集</h2>
        {{-- ここからフォーム --}}
        <form method="post" action="{{ route('posts.update', $progress)}}">
            @method('PATCH')
            @csrf

          <div class="form_group form_title">
            <label for="title">タイトル</label>
            <input
              class="form_parts"
              id="title"
              type="text"
              name="title"
              placeholder="タイトルを入力してください"
              value="{{ old('title', $progress->title) }}"
            />
            @error('title')
            <div class="error">{{ $message }}</div>
            @enderror
          </div>
          <div class="form_group form_content">
            <label for="content">投稿内容</label>
            <textarea
                class="form_parts"
                name="content"
                id=""
                placeholder="投稿内容を入力してください"
            >{{$progress->content}}</textarea>
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


