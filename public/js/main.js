'use strict';{
    // selestタグ選択後の色変更

    function changeColor(option){
          option.style.color = 'black';
    }

    //削除確認のダイアログ

    const destroy = document.getElementById('destroy');
    if(!typeof destroy === null){
        destroy.addEventListener('submit', e => {
            e.preventDefault();

            if(!confirm('本当に削除しますか？')){
                return;
            }

            e.target.submit();
        });

    }

    // 絞り込み検索
    const filterList = document.querySelector('.filter_list');
    const cover = document.querySelector('.cover');
    // const filterList = document.querySelector('.filter_list');
    document.querySelector('.filter').addEventListener('click', () => {
        filterList.classList.add('open');
        cover.classList.add('show');
    })
    document.querySelector('.back').addEventListener('click', () => {
        filterList.classList.remove('open');
        cover.classList.remove('show');
    })
    cover.addEventListener('click', () => {
        filterList.classList.remove('open');
        cover.classList.remove('show');
    })

}

