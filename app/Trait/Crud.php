<?php

namespace App\Trait;

trait Crud
{
    public function save($model, $data, $id = null)
    {
        if ($id != null) {
            $dataWhere = [
                'id' => $id,
            ];
            $object = $this->getOneObject($model, $dataWhere) ;
            $object->update($data) ;
            return  $object ;
        }

        $object = $model->create($data);
        return $object ;

    }

    public function getAllObject($model)
    {
        return $model->get();
    }

    public function getOneObject($model, $data = [])
    {
        $object = $model->where($data)->first();
        if (!$object) {
            return false ;
        }
        return $object ;
    }

    public function delete($model, $id)
    {
        $getWhere = [
            'id' => $id,
        ];
        $object = $this->getOneObject($model, $getWhere) ;
        if ($object == false) {
            return false ;
        }
        $object->delete();
        return true ;

    }

}
