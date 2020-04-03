<?php

namespace App\Repositories;

/**
 * Base repository for common use
 *
 * @package App\Repositories
 * @author efriandika
 */
abstract class BaseRepository {

    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Destroy a model.
     *
     * @param $id
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->findOne($id)->delete();
    }

    /**
     * Find one row based on its ID.
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function findOne($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Find all rows
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll()
    {
        return $this->model::all();
    }

    /**
     * Find a model by its primary key or return fresh model instance.
     *
     * @param $id
     * @param array $columns
     * @return object
     */
    public function findOrNew($id, $columns = ['*'])
    {
        if ($id != null) {
            return $this->model::findOrNew($id, $columns);
        }

        return $this->model;
    }
}
