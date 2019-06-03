<?php
/**
 * php artisan make:controller
 * mcj
 */

namespace App\Api\V1\Controllers;

use App\Http\Transformers\UserTransformer;
use App\Api\V1\Controllers\BaseController as BaseController ;
//这里继承BaseController
class UserController extends BaseController
{
   public function index(){
      /* $user->all();
       return $this->response->collection($user, new UserTransformer);*/
      return 81;
   }
}

