<?php

namespace App\Repositories;

use App\Models\Carne;

class CarneRepository

{
    public function find($id)
    {
        return Carne::find($id);
    }
    public function all()
    {
        return Carne::all();
    }

    public function create(array $data)
    {
        return Carne::create($data);
    }
}
