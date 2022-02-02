

<x-layout>
    <x-slot name="title">
        ESA ACADEMY 生徒管理システム
    </x-slot>
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
            <a href="{{route('students.edit', $student)}}">
                <div class="edit_btn btn btn_option">
                        編集
                </div>
            </a>
                <form class="destroy" method="post" action="{{route('students.destroy', $student)}}" id="destroy">
                    @method('DELETE')
                    @csrf

                    <button class="delete_btn btn btn_option">
                            削除
                    </button>
                </form>
        </td>
    </tr>
@endforeach

        </table>
      </div>
    </div>
    <div class="pagers">
      <a href="#"><div class="pager active btn_option">1</div></a>
      <a href="#"><div class="pager btn_option">2</div></a>
      <a href="#" class="next"> <i class="fas fa-angle-right"></i> </a>
    </div>

</x-layout>

