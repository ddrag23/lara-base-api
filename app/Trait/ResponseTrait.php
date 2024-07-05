<?php

namespace App\Trait;

use App\Constants\ResponseConstant;
use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    function generateResponse(ResponseConstant $type, mixed $data = null): JsonResponse
    {
        $message = 'Ada kesalahan server';
        $code = 500;
        switch ($type) {
            case ResponseConstant::WRITE:
                $message = 'Data berhasil dibuat';
                $code = 201;
                break;
            case ResponseConstant::UPDATE:
                $message = 'Data berhasil diperbarui';
                $code = 201;
                break;
            case ResponseConstant::DELETE:
                $message = 'Data berhasil dihapus';
                $code = 201;
                break;
            case ResponseConstant::READ:
                $message = 'Berhasil mendapatkan data';
                $code = 200;
                break;
            case ResponseConstant::INVALID:
                $message = 'Mohon lengkapi data';
                $code = 422;
                break;
            case ResponseConstant::NOTFOUND:
                $message = 'Data tidak ditemukan';
                $code = 404;
                break;
            case ResponseConstant::CREDENTIAL_FAIL:
                $message = 'Email atau password yang anda masukkan salah';
                $code = 400;
                break;
            case ResponseConstant::AUTH_SUCCESS:
                $message = 'Autentikasi berhasil';
                $code = 200;
                break;
            case ResponseConstant::AUTHORIZE_FAIL:
                $message = 'Anda tidak memiliki hak akses';
                $code = 403;
                break;
            case ResponseConstant::REGISTER_SUCCESS:
                $message = 'Data anda berhasil didaftarkan';
                $code = 201;
                break;
            case ResponseConstant::LOGOUT_SUCCESS:
                $message = 'Akun anda berhasil logout';
                $code = 201;
                break;
        }
        return $this->response($message, $data, $code);
    }

    function response(string $message, mixed $data = 'No Data', int $status = 200): JsonResponse
    {
        return response()->json(['message' => $message, 'data' => $data, 'status' => $status], $status);
    }
}
