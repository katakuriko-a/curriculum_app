<?php
    $row = count($students);
    // dd($row);
?>
<x-layout>
    <x-slot name="title">
        ESA ACADEMY 生徒管理システム
    </x-slot>
    <header>
        <div class="search_wrapper">
            <form
                class="search"
                method="get"
                action="{{ route('students.index') }}"
            >
            @csrf
                <input
                    type="text"
                    placeholder="名前検索"
                    name="search"
                    value="@if (isset( $search )) {{ $search }}@endif"
                     />
                <button>
                    <i class="fas fa-search btn_option"></i>
                </button>
            </form>
        </div>
        <div href="" class="filter btn_option"><i class="fas fa-search-plus"></i> 詳細検索</div>
      </header>
      <div class="cover">

      </div>
      <div class="filter_list">
          <div class="back btn_option">←</div>
        <form method="get" action="{{ route('students.index') }}" class="filter_form">
            @csrf
            <div class="filter_group">
                <label for="">名前</label>
                <input type="text" name="name" id="">
            </div>
            <div class="filter_group">
                <label for="">年齢</label>
                <input type="number" name="age" id="">
            </div>
            <div class="filter_group">
                <label for="">生年月日</label>
                <input type="text" name="birth" id="">
            </div>
            <div class="filter_group">
                <label for="">e-mail</label>
                <input type="text" name="mail" id="">
            </div>
            <div class="filter_group">
                <label for="">電話番号</label>
                <input type="text" name="tel" id="">
            </div>
            <div class="filter_group">
                <label for="">プラン</label>
                <input type="radio" name="plan" id="" value="STANDARD"><span>STANDARD</span>
                <input type="radio" name="plan" id="" value="PREMIUM">PREMIUM
            </div>
            <input type="submit" name="" id="" value="検索" class="filter_btn btn_option">

        </form>
      </div>

      <div class="main_wrapper">
          <p class="sum_number">15件</p>
          <div class="main_content">
              <table>
                  <tr>
                      <th>名前</th>
                      <th>年齢</th>
                      <th>生年月日</th>
                      <th>e-mail</th>
                      <th>TEL</th>
                      <th>プラン名</th>
                    </tr>


@foreach ($students as $student)
    <tr>
        <td>{{$student->name}}</td>
        <td>{{$student->age}}</td>
        <td>{{$student->birth}}</td>
        <td>{{$student->mail}}</td>
        <td>{{$student->tel}}</td>
        <td>{{$student->plan}}</td>
        <td>
            <div class="btn_group">
                <a href="{{route('posts.index', $student)}}">
                    <div class="progress_btn btn btn_option">
                            進捗報告
                    </div>
                </a>
                <a href="{{route('students.edit', $student)}}">
                    <div class="edit_btn btn btn_option">
                            編集
                    </div>
                </a>
                <form class="destroy" method="post" action="{{route('students.destroy', $student)}}" id="destroy">
                    @method('DELETE')
                    @csrf

                    <button class="delete_btn btn btn_option" >
                        削除
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach


</table>

            @if ($row === 0)
                <div class="alert alert-danger" role="alert">
                    データが見つかりませんでした。
                </div>
            @endif
      </div>
    </div>
    <div class="pagers">
      <a href="#"><div class="pager active btn_option">1</div></a>
      <a href="#"><div class="pager btn_option">2</div></a>
      <a href="#" class="next"> <i class="fas fa-angle-right"></i> </a>
    </div>

</x-layout>

