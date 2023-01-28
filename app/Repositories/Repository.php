<?php

namespace App\Repositories;

use Session;

abstract class Repository
{
    protected $model;

    abstract public function model();

    public function __construct()
    {
        $this->model = app($this->model());
    }


    public function all()
    {
        return $this->model->orderBy('id', 'desc')->get();
    }


    public function getBy($col, $value)
    {
        return $this->model->where($col, $value)->orderBy('id', 'desc')->get();
    }

    public function getCountByAuth($col, $value)
    {
        return $this->model->where('user_id', auth()->user()->id)->where($col, $value)->orderBy('id', 'desc')->count();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($model, array $data)
    {
        return $model->update($data);
    }

    public function delete($model)
    {
        return $model->delete();
    }

    public function exists($id)
    {
        return $this->model->where('id', $id)->exists();
    }

    public function uploadFile($path, $file=null)
    {
        if ($file) {
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move("storage/$path", $fileName);
        } else {
            $fileName = "nothing";
        }
        return "storage/$path/" . $fileName;
    }

    public function sessionFlash()
    {
        return Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => ' با موفقیت  انجام شد',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));
    }
}
