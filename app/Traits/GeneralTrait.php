<?php

namespace App\Traits;

trait GeneralTrait {
    public function getCurrentLang () {
        return app()->getLocale();
    }

    public function errorResponse ($errNum, $msg) {
        return response() -> json([
            'status'  => 'False',
            'errNum'  => $errNum,
            'message' => $msg,
        ]);
    }

    public function successResponse ($msg = '') {
        return response() -> json([
            'status'  => 'True',
            'errNum'  => '',
            'message' => $msg,
        ]);
    }

    public function dataResponse ($key, $value, $msg = '') {
        return response() -> json([
            'status'  => 'True',
            'errNum'  => '',
            'message' => $msg,
            $key      => $value,
        ]);
    }
}
