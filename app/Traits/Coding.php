<?php

namespace App\Traits;

use App\User;

trait Coding
{
    public static function makeCode($parentId = null)
    {
        if ($parentId) {
            $parentCode = User::find($parentId)->code;

            $lastCode = User::where('code', 'like', "$parentCode%")->whereRaw('length(code) = ' . (strlen($parentCode) + 4))->orderBy('code', 'desc')->first();

            if (!$lastCode) {
                return $parentCode . '0001';
            }

            return $parentCode . str_pad(substr($lastCode->code, strlen($parentCode)) + 1, 4, '0', STR_PAD_LEFT);
        }

        $lastCode = User::whereRaw('length(code) = 4')->orderBy('code', 'desc')->first();

        if (!$lastCode) {
            return '0001';
        }

        return str_pad($lastCode->code + 1, 4, '0', STR_PAD_LEFT);
    }
}

