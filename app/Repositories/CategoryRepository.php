<?php namespace App\Repositories;

use App\Contracts\CategoryContract;
use App\Models\Category;
use App\Traits\UploadAble;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use InvalidArgumentException;

class CategoryRepository extends BaseRepository implements CategoryContract
{
    use UploadAble;


    /**
     * Undocumented function
     *
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    /**
     * Undocumented function
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return void
     */
    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }


    /**
     * Undocumented function
     *
     * @param integer $id
     * @return void
     */
    public function findCategoryById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e);
        }
    }


    /**
     * Undocumented function
     *
     * @param array $params
     * @return void
     */
    public function createCategory(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'categories');
            }

            $featured = $collection->has('featured') ? 1 : 0;
            $menu = $collection->has('menu') ? 1 : 0;

            $merge = $collection->merge(compact('menu', 'image', 'featured'));

            $category = new Category($merge->all());

            $category->save();

            return $category;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());

        }
    }


    /**
     * Undocumented function
     *
     * @param array $params
     * @return void
     */
    public function updateCategory(array $params)
    {
        $category = $this->findCategoryById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof UploadedFile)) {
            
            if ($category->image != null) {
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


    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function deleteCategory($id)
    {
        $category = $this->findCategoryById($id);

        if ($category->image != null) {
            $this->deleteOne($category->image);
        }

        $category->delete();

        return $category;
    }
}