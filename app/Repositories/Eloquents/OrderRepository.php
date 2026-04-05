<?php

namespace App\Repositories\Eloquents;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Stock;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryInterface
{
    protected $model;
    protected $stock;
    public function __construct(Order $order,Product $product,Stock $stock)
    {
        $this->model = $order;
        $this->stock = $stock;
    }

    /**
     * Get all orders with user and order details.
     */
    public function all()
    {
        return $this->model->with(['user', 'orderDetails'])->orderBy('name')->latest()->get();
        //return $this->model->orderBy('name')->get();
    }

    /**
     * Get all orders belonging to a specific user.
     */
    public function allByUser($userId)
    {
        return $this->model->with('orderDetails')
            ->where('user_id', $userId)
            ->latest()
            ->get();
    }

    /**
     * Create a new order.
     */
    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function storeSale(array $data)
    {
        return DB::table('sales')->insert($data);
    }

    /**
     * Find an order by ID (with its details).
     */

    public function find($id)
    {
        return Order::with('user','orderDetails.product')->findOrFail($id);
    }


    public function findOrderDetail($id)
    {
//        $orderDetails = OrderDetail::with('product')->findOrFail($id);
//        dd($orderDetails->toArray());

        return OrderDetail::with('product')->findOrFail($id);
    }

    /**
     * Update an existing order.
     */
    public function update($id, array $data)
    {
        $order = $this->find($id);
        $order->update($data);
        return $order;
    }

    /**
     * Delete an order by ID.
     */
    public function delete($id)
    {
        $order = $this->find($id);
        return $order->delete();
    }
}
