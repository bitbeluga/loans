<?php

namespace App\Transformers;

use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Api\Controller;
use App\Models\Merchant;
use League\Fractal\TransformerAbstract;

class MerchantTransformer extends TransformerAbstract
{
    use Helpers;
    public function transform(Merchant $merchant)
    {
        return [
            'id' => (int)$merchant->id,
            'thumbnail' => $merchant->thumbnail,
            'name' => $merchant->name,
            'max_limit' => $merchant->max_limit,
            'description' => $merchant->description,
            'rate' => $merchant->rate,
            'url' => $this->user() ? $merchant->url : 'http://loans.test/platform',
            'label_first' => $merchant->label_first,
            'label_second' => $merchant->label_second,
            'label_third' => $merchant->label_third,
            'online_at' => $merchant->online_at ?? '2019.02.20'
        ];
    }
}