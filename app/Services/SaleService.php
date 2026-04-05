<?php


namespace App\Services;


use App\Repositories\Contracts\SaleRepositoryInterface;
use App\Repositories\Contracts\StockRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleService
{
    protected $saleRepository;
    protected $stockRepository;

    public function __construct(SaleRepositoryInterface $saleRepository, StockRepositoryInterface $stockRepository)
    {
        $this->saleRepository = $saleRepository;
        $this->stockRepository = $stockRepository;
    }

    public function processSale(int $orderId, array $stockIds): array
    {
        $userId = Auth::id();
        $saved = 0;
        $invalid = [];

        DB::transaction(function () use ($orderId,$stockIds,$userId,&$saved, &$invalid){
            foreach ($stockIds as $stockId)
            {
                if (! $this->stockRepository->existsBySerialNumber($stockId)) {
                    $invalid[] = $stockId;   // collect invalid ids
                    continue;                // skip — do NOT save
                }

                // ── Persist: valid stock_id → write to sales table ──
                $this->saleRepository->store([
                    'user_id'  => $userId,
                    'stock_id' => $stockId,
                ]);

                $saved++;
            }
        });
        return [
            'saved'   => $saved,
            'invalid' => $invalid,
        ];

    }


}
