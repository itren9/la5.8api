<?php

/**
 * Created by PhpStorm.
 * User: mcj
 * Date: 2019-04-04
 * Time: 17:03
 * Desc:
 */

namespace App\Http\Transformers;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{

    protected $availableIncludes = [];
    protected $defaultIncludes = [];

    public function transform(User $item)
    {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'created_at'=>(string)$item->created_at,
        ];
    }

}