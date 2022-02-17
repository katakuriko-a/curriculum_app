'use strict';{
    // selestタグ選択後の色変更

    function changeColor(option){
          option.style.color = 'black';
    }

    //削除確認のダイアログ

    const destroy = document.getElementById('destroy');

        console.log('destroy')
        destroy.addEventListener('submit', e => {
            e.preventDefault();

            if(!confirm('本当に削除しますか？')){
                return;
            }

            e.target.submit();
        });


    // 絞り込み検索

    const filterList = document.querySelector('.filter_list');
    const cover = document.querySelector('.cover');
    const backs = document.querySelectorAll('.back')


    function closeList() {
        filterList.classList.remove('open');
        cover.classList.remove('show');
        csv_d.classList.remove('popup');
    }

    backs.forEach((back) => {
        back.addEventListener('click', () => {
            closeList();
        })
    })



    document.querySelector('.filter').addEventListener('click', () => {
        filterList.classList.add('open');
        cover.classList.add('show');
    })
    cover.addEventListener('click', () => {
        closeList();
    })

    // csvダウンロードポップアップ表示
    const csv_d = document.querySelector('.csv-downloader');

    document.querySelector('#csv').addEventListener('click', () => {
        cover.classList.add('show');
        csv_d.classList.add('popup');

    })
}

