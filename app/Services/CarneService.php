<?php

namespace App\Services;

use App\Repositories\CarneRepositoryInterface;
use Carbon\Carbon;
use Exception;

class CarneService implements  CarneServiceInterface
{
    protected $carneRepository;

    public function __construct(CarneRepositoryInterface $carneRepository)
    {
        $this->carneRepository = $carneRepository;
    }


    public function registerCarne(array $data)
    {

        $carne = $this->carneRepository->create($data);
        return $this->calculateParcelas($carne);
    }


    public function getParcelas(int $id)
    {

        $carne = $this->carneRepository->find($id);

        if (!$carne) {
            throw new Exception('Carnê não encontrado.');
        }

        return $this->calculateParcelas($carne);
    }


    private function calculateParcelas($carne)
    {
        $parcelas = [];
        $data_vencimento = Carbon::parse($carne->data_primeiro_vencimento);

        if ($carne->qtd_parcelas <= 0) {
            throw new Exception('Quantidade de parcelas deve ser maior que zero.');
        }

        $valor_parcela = ($carne->valor_total - $carne->valor_entrada) / ($carne->qtd_parcelas-1);

        for ($i = 1; $i <= $carne->qtd_parcelas; $i++) {
            $parcelas[] = $this->createParcela($data_vencimento, $carne, $i, $valor_parcela);

            if ($carne->periodicidade == 'mensal') {
                $data_vencimento->addMonth();
          } else {
                $data_vencimento->addWeek();
            }
        }

        return [
            'total' => $carne->valor_total,
            'valor_entrada' => $carne->valor_entrada ?? 0,
            'parcelas' => $parcelas
        ];
    }


    private function createParcela(Carbon $data_vencimento, $carne, $i, $valor_parcela)
    {
        if ($i == 1 && $carne->valor_entrada) {
            return [
                'data_vencimento' => $data_vencimento->copy()->toDateString(),
                'valor' => $carne->valor_entrada,
                'numero' => $i,
                'entrada' => true
            ];
        }

        return [
            'data_vencimento' => $data_vencimento->copy()->toDateString(),
            'valor' => $valor_parcela,
            'numero' => $i
        ];
    }
}

