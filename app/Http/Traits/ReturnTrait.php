<?php
namespace App\Traits;

trait ReturnTrait {

    public function returnSuccess($bool, $msgTrue, $msgFalse = '') {

        $code = ($bool ? 200 : 400);
        $msg = ($bool ? $msgTrue : $msgFalse);

        return response()->json([
            'message' => $msg,
        ], $code);

    }
}