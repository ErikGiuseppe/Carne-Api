<?php

namespace App\Http\Controllers;

use App\Models\Carne;
use Illuminate\Http\Request;

class CarneController extends Controller
{
    public function index()
    {
        return Carne::all();
    }
    public function store(Request $req)
    {
        Carne::create([
            'valor_total' => $req->valor_total,
            'qtd_parcelas' => $req->qtd_parcelas,
            'data_primeiro_vencimento' => $req->data_primeiro_vencimento,
            'periodicidade' => $req->periodicidade,
            'valor_entrada' => $req->valor_entrada,
        ]);
        return response(["Criado"],201);
    }
}
