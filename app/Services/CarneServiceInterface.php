<?php

namespace App\Services;

interface CarneServiceInterface
 {
    public  function registerCarne(array $data);
    public function getParcelas(int $id);
 }

