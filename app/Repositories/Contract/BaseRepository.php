<?php
namespace App\Repositories\Contract;


abstract class BaseRepository
{
    protected $model;
    protected $objectId;

    public function __construct()
    {
        $this->objectId = spl_object_hash($this);
    }

    public function find(int $id)
    {
        return $this->model::find($id);
    }

    public function all()
    {
        return $this->model::all();
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }
    public function delete($id)
    {
        $this->model::destroy($id);

    }
}