<?php
    $row = count($student->progress);
    // dd($row);
?>

<x-layout>
    <x-slot name="title"> 進捗報告 | ESA ACADEMY 生徒管理システム </x-slot>
    <a href="{{ route('progress.create', $student) }}">
        <div class="new_posts btn_option">
            <i class="fas fa-plus"></i><span>新規投稿</span>
        </div>
    </a>
    <div class="main_wrapper">
        <div class="main_content signup_content">
            <h2>{{$student->name}}さんの進捗報告</h2>
            <table>
                <tr>
                    <th>タイトル</th>
                    <th>本文</th>
                </tr>

                @foreach ($student->progress()->latest()->get() as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->content}}</td>
                    <td>
                        <div class="btn_group">
                            <a href="{{ route('progress.edit', $post) }}">
                                <div class="edit_btn btn btn_option">編集</div>
                            </a>
                            <form class="destroy" method="post" action="{{ route('progress.destroy', $post) }}"
                                id="destroy">
                                @method('DELETE')
                                @csrf

                                <button class="delete_btn btn btn_option">
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
                進捗報告がまだありません。
            </div>
            @endif
        </div>
    </div>
</x-layout>
