<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {

        $this->reportable(function (AuthenticationException $e) {
            return response()->json([
               [
                   "status"=>"error",
                   "error"=>['generic'=>'Not Authenticated']
               ] ,JsonResponse::HTTP_UNAUTHORIZED
            ]);
        });
        $this->reportable(function (Throwable $e) {

            if (env('APP_ENV') === 'local'){
                Log::error($e);
            }
            if (env('APP_ENV') === 'production'){
                $this->reportable(function (Throwable $e) {
                    if (app()->bound('sentry')) {
                        app('sentry')->captureException($e);
                    }
                });
            }

//            if (App::environment(['local','staging'])){
//                //
//            }


            return response()->json([
                [
                    "status"=>"error",
                    "error"=>['generic'=>'Known Error']
                ] ,JsonResponse::HTTP_UNAUTHORIZED
            ]);
        });

    }
}
