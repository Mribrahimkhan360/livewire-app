<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStatusUpdateRequest;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Requests\SaleStoreRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Sale;
use App\Models\Stock;
use App\Services\OrderService;
use App\Services\SaleService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use function Monolog\toArray;
use function Nette\Utils\isEmpty;

class OrderController extends Controller
{
    protected $orderService;
    protected $saleService;

    public function __construct(OrderService $orderService,SaleService $saleService)
    {
        $this->orderService = $orderService;
        $this->saleService  = $saleService;
    }

    /**
     * Show all orders of the logged-in user.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('admin'))
        {
            $orders = Order::with('orderDetails','user')->latest()->get();
        }
        else{
            $orders = Order::with('orderDetails')->where('user_id',$user->id)->latest()->get();
        }

//        dd($orders);
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the create-order form.
     */
    public function create()
    {
        $statuses = $this->orderService->getOrderStatuses();
        $products = $this->orderService->getAllProducts(); // ← NEW
        return view('orders.create', compact('statuses','products'));
    }

    /**
     * Store a new order with its products.
     */
    public function store(OrderStoreRequest $request)
    {
        $this->orderService->createOrder($request->validated());
        return redirect()->route('orders.index')->with('success', 'Order placed successfully.');
    }
//    public function sale(Request $request,$id)
//    {
//        $orderDetail = $this->orderService->sale($id);
//        $orderDetailId = $request->input('orderDetailId'); // hidden input
////        dd($orderDetailId);
//        return view('sales.create', compact('orderDetail'));
//    }
    /*
    |--------------------------------------------------------------------------
    | productUpload — alias for sale (GET)
    |--------------------------------------------------------------------------
    */

    public function productUpload($id)
    {
        $orderDetail = $this->orderService->sale($id);
//        dd($orderDetail->toArray());
        return view('sales.create', compact('orderDetail'));
    }


    /*
    |--------------------------------------------------------------------------
    | storeProductUpload — validate stock IDs → save valid ones to sales table
    |--------------------------------------------------------------------------
    */



    public function storeProductUpload(SaleStoreRequest $request, $id)
    {
        // 1. order detail & product
        $orderDetail = OrderDetail::findOrFail($request->orderDetailId);
        $productId = $orderDetail->product_id;

        // dd($productId);

        // 2. user id find out
        $user_id = $orderDetail->order->user_id;

        // 3. Serial Numbers
        $serial_numbers = $request->input('serial_id',[]);
//         dd($serial_numbers);

        // 4. Get all stock in one query
        $stocks = Stock::whereIn('serial_number',$serial_numbers)->get();


        // 5 Check missing serials
        $foundSerials = $stocks->pluck('serial_number')->toArray();
        $missingSerials = array_diff($serial_numbers,$foundSerials);

        if (!empty($missingSerials))
        {
            return back()->with('error','Invalid serial number!');
        }

        // 6. Check product mismatch
        if ($stocks->where('product_id','!=',$productId)->isNotEmpty())
        {
            return back()->with('error','Stock not matched with product!');
        }
        // 7. Lop with foreach

        foreach ($stocks as $stock)
        {
            $exists = Sale::where('stock_id',$stock->id)->exists();
            if ($exists)
            {
                return back()->with('error','Serial number already sold!');
            }
            // store
            Sale::create([
                'user_id'   => $user_id,
                'stock_id'  => $stock->id,
            ]);
        }
        return back()->with('success','Successfully uploaded product!');
    }


    /**
     * Show a single order's details.
     */
    public function show($id)
    {
        $order = $this->orderService->findOrderById($id);
//        dd($order->toArray());
        return view('orders.show', compact('order'));
    }



    /**
     * Show the edit-order form.
     */
    public function edit($id)
    {
        $order    = $this->orderService->findOrderById($id);
        $statuses = $this->orderService->getOrderStatuses();
        $products = $this->orderService->getAllProducts(); // ← NEW
        return view('orders.edit', compact('order', 'statuses','products'));
    }

    /**
     * Update an existing order and its products.
     * @param OrderUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(OrderUpdateRequest $request, $id)
    {
        $this->orderService->updateOrder($id, $request->validated());
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

//    public function updateStatus(OrderUpdateRequest $request, $id)
//    {
//
//        // Service call
//        $service = $this->orderService->updateStatus($id, $request->status);
//
////        dd($service->toArray());
//
//        return redirect()->back()->with('success', 'Order status updated successfully!');
//    }

    public function updateStatus(OrderStatusUpdateRequest $request, $id)
    {
        $service = $this->orderService->updateStatus($id, $request->status);
        return redirect()->route('orders.index')->with('success', 'Order status updated successfully!');
    }

    /**
     * Delete an order (and all its details).
     */

    public function destroy($id)
    {
        $this->orderService->deleteOrder($id);
        return redirect()->back()->with('success', 'Order deleted successfully.');
    }
}
