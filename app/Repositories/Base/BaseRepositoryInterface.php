<?php
namespace App\Repositories\Base;

interface BaseRepositoryInterface {

    public function getDataPagination(string $with, int $pageSize);

    public function getOneById(string $with = "", int $id);

    public function createOne(array $data);

    public function updateOneById(int $id, array $data);

    public function removeOneById(int $id);
}
