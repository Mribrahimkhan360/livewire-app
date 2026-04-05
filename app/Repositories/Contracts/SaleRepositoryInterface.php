<?php


namespace App\Repositories\Contracts;


interface SaleRepositoryInterface
{
    public function store(array $data): bool;
}
