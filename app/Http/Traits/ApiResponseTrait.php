<?php

namespace App\Http\Traits;

trait ApiResponseTrait
{
    protected function successResponse($message, $data = null, $status = 200)
    {
        return response()->json([
            'status'  => 'success',
            'message' => $message,
            'results' => $this->countResults($data),
            'data'    => $data,
        ], $status);
    }

    protected function errorResponse($message, $status = 400)
    {
        return response()->json([
            'status'  => 'error',
            'message' => $message,
        ], $status);
    }

    private function countResults($data)
    {
        if ($data instanceof \Illuminate\Http\Resources\Json\ResourceCollection) {
            return $data->resource->count();
        }

        if (is_countable($data)) {
            return count($data);
        }

        return $data ? 1 : 0;
    }
}
