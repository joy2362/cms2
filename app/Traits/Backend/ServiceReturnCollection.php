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
     * @return Collection
     */
    private function failed(array $items = []): Collection
    {
        $res = [
            'success' => false,
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
        ];

        foreach ($items as $key => $item) {
            $res[$key] = $item;
        }
        return new Collection($res);
    }

}