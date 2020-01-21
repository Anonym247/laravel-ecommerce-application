<?php


namespace App\Repositories;


use App\Contracts\ProductContract;
use App\Models\Product;
use App\Traits\Uploadable;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class ProductRepository extends BaseRepository implements ProductContract
{
    use Uploadable;

    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findProductById(int $id)
    {
        try
        {
            return $this->findOneOrFail($id);
        }
        catch (ModelNotFoundException $e)
        {
            throw new ModelNotFoundException($e);
        }
    }

    public function createProduct(array $params)
    {
        try
        {
            $collection = collect($params);

            $featured = $collection->has('featured') ? 1 : 0;
            $status = $collection->has('status') ? 1 : 0;

            $merge = $collection->merge(compact('status', 'featured'));

            $product = new Product($merge->all());
            $product->save();

            if ($collection->has('categories'))
            {
                $product->categories()->sync($params['categories']);
            }
            return $product;
        }
        catch (QueryException $e)
        {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    public function updateProduct(array $params)
    {
        $product = $this->findProductById($params['product_id']);

        $collection = collect($params)->except('_token');

        $featured = $collection->has('featured') ? 1 : 0;
        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('status', 'featured'));

        $product->update($merge->all());

        if ($collection->has('categories'))
        {
            $product->categories()->sync($params['categories']);
        }
        return $product;
    }

    public function deleteProduct($id)
    {
        $product = $this->findProductById($id);
        $product->delete();

        return $product;
    }
}
