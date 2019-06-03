<?php
/**
 * php artisan make:controller Api/UserController
 * mcj
 */

namespace App\Http\Controllers\Admin\Api;

use App\Http\Transformers\UserTransformer;
//这里继承BaseController
class UserController extends BaseController
{
   public function index(User $user){
      /* $user->all();
       return $this->response->collection($user, new UserTransformer);*/
      return 1;
   }
}

