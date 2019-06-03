<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
 /*   public function register()
    {
        //
    }*/
    //mcj  https://blog.csdn.net/zhangatle/article/details/80945041
    public function register()
    {
        \API::error(function (\Illuminate\Validation\ValidationException $exception){
            $data =$exception->validator->getMessageBag();
            $msg = collect($data)->first();
            if(is_array($msg)){
                $msg = $msg[0];
            }
            return response()->json(['message'=>$msg,'status_code'=>400], 200);
        });
        \API::error(function (\Dingo\Api\Exception\ValidationHttpException $exception){
            $errors = $exception->getErrors();
            return response()->json(['message'=>$errors->first(),'status_code'=>400], 200);
        });
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}
