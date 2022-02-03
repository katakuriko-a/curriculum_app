'use strict';{
    // selestタグ選択後の色変更

    function changeColor(option){
          option.style.color = 'black';
    }

    //削除確認のダイアログ

    document.getElementById('destroy').addEventListener('submit', e => {
        e.preventDefault();

        if(!confirm('本当に削除しますか？')){
            return;
        }

        e.target.submit();
    });

    document.querySelector('#closeBtn').addEventListener('click',function(){
        document.querySelector('.alert-danger').classList.add('hide');
    });
}

