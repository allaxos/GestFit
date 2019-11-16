<?php


namespace App\Repositories;


abstract class BaseRepository
{
    protected $model;


    public function getAll(){
        return $this->model->all();
    }


    public function getByUser($id){
        return $this->model->whereUserId($id)->get();
    }



}
