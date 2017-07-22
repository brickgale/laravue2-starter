<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use League\Fractal;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Helpers;

    /**
     * Transform Item
     *
     * @param Model $data, Transformer $transformer
     * @return array
     */
    public function transformItem($data = null, $transformer = null, $key = null)
    {
        $manager = new Fractal\Manager();
        $item = new Fractal\Resource\Item($data, $transformer);
        $result = $manager->createData($item)->toArray();
        if (!is_null($key)) {
            $result = [$key => $result['data']];
            return $result;
        }

        return $result['data'];
    }

    /**
     * Transform Collection
     *
     * @param Model $data, Transformer $transformer
     * @return array
     */
    public function transformCollection($data = null, $transformer = null, $key = null)
    {
        $manager = new Fractal\Manager();
        $collection = new Fractal\Resource\Collection($data, $transformer);
        $result = $manager->createData($collection)->toArray();
        if (!is_null($key)) {
            $result = [$key => $result['data']];
        }

        return $result;
    }

    /**
     * Transform Paginated Collection
     *
     * @param Model $data, Transformer $transformer
     * @return array
     */
    public function transformPaginatedCollection($paginator = null, $transformer = null, $key = null)
    {
        $manager = new Fractal\Manager();
        $collection = $paginator->getCollection();
        $result = new Fractal\Resource\Collection($collection, $transformer);
        $result->setPaginator(new Fractal\Pagination\IlluminatePaginatorAdapter($paginator));
        $result = $manager->createData($result)->toArray();
        if (!is_null($key)) {
            $result = [$key => $result['data'], 'meta' => $result['meta']];
        }

        return $result;
    }
}
