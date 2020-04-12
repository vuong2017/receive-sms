<?php
namespace App\Repositories\Base;

use App\Repositories\Base\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface{

    protected $model;

    public function __construct() {
        $this->setModel();
    }

    abstract public function getModel();

    private function setModel() {
        $this->model = $this->getModel();
    }

    public function getDataPagination($with = "", $pageSize = 20)
    {
        return $this->model::with($with)->paginate($pageSize);
    }

    public function getOneById(int $id)
    {
        return $this->model::findOrFail($id);
    }


    public function createOne(array $data)
    {
        return $this->model::create($data);
    }

    public function updateOneById(int $id, array $data)
    {
        $record = $this->model::find($id);
        $record->update($data);
        return $record;
    }

    public function removeOneById(int $id)
    {
        return $this->model::destroy($id);
    }
}
