<?php

namespace App\Traits\v1;

use App\Constants\ResponseStatus;

trait ApiResponse
{
    protected function success(array $data = [], string $message = 'Operation successful', int $statusCode = 200): array
    {
        return [
            'status' => ResponseStatus::SUCCESS,
            'message' => $message,
            'data' => $data,
            'status_code' => $statusCode
        ];
    }
    protected function fail(string $message = 'Operation failed', array $data = [], int $statusCode = 400): array
    {
        return [
            'status' => ResponseStatus::FAIL,
            'message' => $message,
            'data' => $data,
            'status_code' => $statusCode
        ];
    }
    protected function info(string $message = 'Operation successful', array $data = [], int $statusCode = 200): array
    {
        return [
            'status' => ResponseStatus::INFO,
            'message' => $message,
            'data' => $data,
            'status_code' => $statusCode
        ];
    }
    protected function error(string $message = 'An error occurred', array $data = [], int $statusCode = 500): array
    {
        return [
            'status' => ResponseStatus::ERROR,
            'message' => $message,
            'data' => $data,
            'status_code' => $statusCode
        ];
    }
}
