<?php namespace App\Repositories;

use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class BaseRepository
 *
 * @package \App\Repositories
 */
class BaseRepository implements BaseContract
{
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    /**
     * Undocumented function
     *
     * @param array $attributes
     * @return void
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }


    /**
     * Undocumented function
     *
     * @param array $attributes
     * @param integer $id
     * @return boolean
     */
    public function update(array $attributes, int $id) : bool
    {
        return $this->model->find($id)->update($attributes);
    }


    /**
     * Undocumented function
     *
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return void
     */
    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc')
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }


    /**
     * Undocumented function
     *
     * @param integer $id
     * @return void
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }


    /**
     * Undocumented function
     *
     * @param integer $id
     * @return void
     * @throws ModelNotFoundException
     */
    public function findOneOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }


    /**
     * Undocumented function
     *
     * @param array $data
     * @return void
     */
    public function findBy(array $data)
    {
        return $this->model->where($data)->all();
    }


    /**
     * Undocumented function
     *
     * @param array $data
     * @return void
     */
    public function findOneBy(array $data)
    {
        return $this->model->where($data)->first();
    }


    /**
     * Undocumented function
     *
     * @param array $data
     * @return void
     */
    public function findOneByOrFail(array $data)
    {
        return $this->model->where($data)->firstOrFa();
    }


    /**
     * Undocumented function
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id) : bool
    {
        return $this->model->find($id)->delete();
    }
}