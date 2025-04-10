<?php

namespace App\Repositories;

interface CarneRepositoryInterface
 {
    public function find($id);
    public function all();
    public function create(array $data);
 }

