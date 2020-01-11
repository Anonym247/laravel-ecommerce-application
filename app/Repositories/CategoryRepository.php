<?php


namespace App\Repositories;


use App\Contracts\CategoryContract;
use App\Models\Category;
use App\Traits\Uploadable;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;

class CategoryRepository extends BaseRepository implements CategoryContract
{
    use Uploadable;

    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findCategoryById(int $id)
    {
        try
        {
            return $this->findOneOrFail($id);
        }
        catch (ModelNotFoundException $exception)
        {
            throw new ModelNotFoundException($exception);
        }
    }

    public function createCategory(array $params)
    {

        $image = null;
        try
        {
            $collection = collect($params);

            if ($collection->has('image') && $params['image'] instanceof UploadedFile)
            {
                $image = $this->uploadOne($params['image'], 'categories');
            }

            $featured = $collection->has('featured') ? 1 : 0;
            $menu = $collection->has('menu') ? 1 : 0;

            $merge = $collection->merge(compact('menu', 'image', 'featured'));

            $category = new Category($merge->all());

            $category->save();

            return $category;
        }
        catch (QueryException $queryException)
        {
            throw new \Doctrine\Instantiator\Exception\InvalidArgumentException($queryException->getMessage());
        }
    }

    public function updateCategory(array $params)
    {
        $category = $this->findCategoryById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && $params['image'] instanceof UploadedFile)
        {
            if ($category->image != null)
            {
                $this->deleteOne($category->image);
            }

            $image = $this->uploadOne($params['image'], 'categories');
        }
        $featured = $collection->has('featured') ? 1 : 0;
        $menu = $collection->has('menu') ? 1 : 0;

        $merge = $collection->merge(compact('menu', 'image', 'featured'));

        $category->update($merge->all());

        return $category;
    }

    public function deleteCategory(int $id)
    {
        $category = $this->findCategoryById($id);

        if ($category->image != null)
            $this->deleteOne($category->image);

        $category->delete();

        return $category;
    }
}
