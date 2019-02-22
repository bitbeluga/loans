<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Transformers\MerchantTransformer;
use Illuminate\Http\Request;
use App\Models\Merchant;

class MerchantController extends Controller
{
    public function index()
    {
        // Auth::guard('api')->logout();
        \Cache::increment('count:count_visit', 1);
        $meta['hot_ad'] = '建议申请3家以上，100% 一小时内到帐';
        $meta['count_visit'] = \Cache::get('count:count_visit');;
        $meta['top_banner'] = [
            'https://daipub.oss-cn-beijing.aliyuncs.com/upload/201901/20190104/105257553.png',
            'https://daipub.oss-cn-beijing.aliyuncs.com/upload/201901/20190104/105310419.png',
            'https://daipub.oss-cn-beijing.aliyuncs.com/upload/201901/20190104/105322179.png',
            'https://daipub.oss-cn-beijing.aliyuncs.com/upload/201902/20190221/133908390.jpg',
            'https://daipub.oss-cn-beijing.aliyuncs.com/upload/201812/20181228/145131440.png'
        ];
        $meta['navigation_bar'] = [
            [
                'name' => '本周下款王',
                'thumbnail' => 'https://daipub.oss-cn-beijing.aliyuncs.com/upload/201902/20190221/105732222.jpg',
                'url' => 'http://loans.test/api/new_loan_king'
            ],
            [
                'name' => '最新口子',
                'thumbnail' => '',
                'url' => 'https://daipub.oss-cn-beijing.aliyuncs.com/upload/201902/20190221/105222165.jpg'
            ],


        ];
        return $this->response->collection(Merchant::get(), new MerchantTransformer())->setMeta($meta);
    }

    public function newLoanKing()
    {
        $meta['banner_new_loan_king'] = 'https://www.torp.org/atque-dolor-dignissimos-aliquam-dolor';
        return $this->response->collection(Merchant::get(), new MerchantTransformer())->setMeta($meta);
    }

    public function newHoles()
    {
        return $this->response->collection(Merchant::get(), new MerchantTransformer()); 
    }

    public function todayRecommend()
    {
        return $this->response->collection(Merchant::get(), new MerchantTransformer()); 
    }
}