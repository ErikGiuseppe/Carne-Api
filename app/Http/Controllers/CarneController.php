<?php

namespace App\Http\Controllers;

use App\Services\CarneService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Exception;

class CarneController extends Controller

{
    protected $carneService;
    public function __construct(CarneService $carneService)
    {
        $this->carneService = $carneService;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'data_primeiro_vencimento' => 'required|date',
            'valor_total' => 'required|numeric',
            'valor_entrada' => 'nullable|numeric',
            'qtd_parcelas' => 'required|integer|min:1',
            'periodicidade' => 'required|in:mensal,semanal',
        ]);

        try {
            $result = $this->carneService->registerCarne($validated);
            return response()->json($result, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function getParcelas(int $id): JsonResponse
    {
        try {
            $parcelas = $this->carneService->getParcelas($id);
            return response()->json(['parcelas' => $parcelas], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
