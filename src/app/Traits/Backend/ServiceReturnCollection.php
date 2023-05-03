<?php

namespace App\Traits\Backend;

use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

trait ServiceReturnCollection
{
    /**
     * @param array $items
     * @return Collection
     */
    private function success(array $items = []): Collection
    {
        $res = [
            'success' => true,
            'status' => Response::HTTP_OK,
        ];

        foreach ($items as $key => $item) {
            $res[$key] = $item;
        }

        return new Collection($res);
    }

    /**
     * @param array $items
     * @param int|null $status
     * @return Collection
     */
    private function failed(array $items = [], int $status = null): Collection
    {
        $res = [
            'success' => false,
            'status' => $status ?? Response::HTTP_UNPROCESSABLE_ENTITY,
        ];

        foreach ($items as $key => $item) {
            $res[$key] = $item;
        }
        return new Collection($res);
    }
}
