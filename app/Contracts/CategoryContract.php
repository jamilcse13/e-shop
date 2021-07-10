<?php namespace App\Contracts;


/**
 * Interface CategoryContract
 */
interface CategoryContract
{
    /**
     * Undocumented function
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return void
     */
    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    /**
     * Undocumented function
     *
     * @param integer $id
     * @return void
     */
    public function findCategoryById(int $id);


    /**
     * Undocumented function
     *
     * @param array $params
     * @return void
     */
    public function createCategory(array $params);


    /**
     * Undocumented function
     *
     * @param array $params
     * @return void
     */
    public function updateCategory(array $params);


    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function deleteCategory($id);


    /**
     * Undocumented function
     *
     * @return void
     */
    public function treeList();


    /**
     * Undocumented function
     *
     * @param [type] $slug
     * @return void
     */
    public function findBySlug($slug);
}