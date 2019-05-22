<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * @Author woann <304550409@qq.com>
     * @param int $code
     * @param string $msg
     * @param array $data
     * @return mixed
     * @description 接口返回数据格式
     */
    protected function json($code = 200, $msg = '', $data = [])
    {
        if ($data == []) {
            $res = [
                'code' => $code,
                'msg' => $msg,
            ];
        } else {
            $res = [
                'code' => $code,
                'msg' => $msg,
                'data' => $data,
            ];
        }
        return response()->json($res)->header('Content-Type', 'application/json; charset=UTF-8');
    }
}
