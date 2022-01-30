<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    private $userNames = [
        '小林 空晏',
        '山田 可奈子',
        '松田 隆',
        '山田 秀幸',
        '森 直子',
        '高岡 正和',
        '坂本 優',
        '大島 美香子',
        '山本 志帆',
        '丸山 宏二',
    ];
    private $userAges = [
        '21',
        '22',
        '21',
        '20',
        '22',
        '19',
        '20',
        '22',
        '19',
        '20',
    ];
    private $userBirthes = [
        '2000/2/29',
        '1999/12/6',
        '2002/2/29',
        '2001/2/29',
        '1999/2/29',
        '2001/2/29',
        '2001/2/29',
        '1999/2/29',
        '2002/2/29',
        '2001/2/29',
    ];
    private $userMails = [
        'suzuken@ggmail.com',
        'kanako-1206@ggmail.com',
        'matsusda-matsu@ggmail.com',
        'hide-0001@ggmail.com',
        'naoko-mori@ggmail.com',
        'mskz0110@ggmail.com',
        'suguru@ggmail.com',
        'mikako01234@ggmail.com',
        'yamashiho2002@ggmail.com',
        'koji0921@ggmail.com',
    ];
    private $userTels = [
        '080-1234-5678',
        '080-1234-5678',
        '080-1234-5678',
        '080-1234-5678',
        '080-1234-5678',
        '080-1234-5678',
        '080-1234-5678',
        '080-1234-5678',
        '080-1234-5678',
        '080-1234-5678',
    ];
    private $userPlans = [
        'PREMIUM',
        'STANDARD',
        'PREMIUM',
        'STANDARD',
        'PREMIUM',
        'STANDARD',
        'PREMIUM',
        'STANDARD',
        'PREMIUM',
        'STANDARD',
    ];

    public function index() {
        return view('index')
        ->with(['userNames' => $this->userNames]);
    }

    public function create() {
        return view('create');
    }
}
