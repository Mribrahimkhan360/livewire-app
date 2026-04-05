<?php


namespace App\Repositories\Eloquents;


use App\Models\Sale;
use App\Repositories\Contracts\SaleRepositoryInterface;

class SaleRepository implements SaleRepositoryInterface
{
    protected $model;

    public function __construct(Sale $sale)
    {
        $this->model = $sale;
    }

    public function store(array $data): bool
    {
        return (bool) $this->model->create($data);
    }
}
