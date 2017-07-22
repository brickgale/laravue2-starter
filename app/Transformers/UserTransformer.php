<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\User;
use Storage;

class UserTransformer extends TransformerAbstract
{

    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'first_name'    => $user->first_name,
            'last_name'     => $user->last_name,
            'email'         => $user->email,
        ];
    }

}