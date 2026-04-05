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
//        $orders = $this->orderService->getMyOrders();
////        dd($orders->toArray());
//        return view('orders.index', compact('orders'));
        $user = auth()->user();
//        dd($user);
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

//        dd($request->all());
        /*
        |--------------------------------------------------------------------------
        | Start: Only admin can upload product
        |--------------------------------------------------------------------------
        | Apply conditional logic to hosRole not admin
        */

        $user = auth()->user();

        if (!$user->hasRole('admin'))
        {
            return redirect()->back()->with('success','Only admin can upload product!');
        }

        /*
        |--------------------------------------------------------------------------
        | Start: Form hidden input $productId and last find out
        |        $productId_input & $orderDetailPageProductId
        |--------------------------------------------------------------------------
        | Apply conditional logic to retrieve the last find out "product_id"
        */

        $orderDetailId = $request->input('orderDetailId'); // hidden input
//      dd($orderDetailId); // 18 // order_details table
        $orderDetailTOProductId = OrderDetail::where('id',$orderDetailId)->first(); // hidden input to product_id find
//      dd($orderDetailTOProductId->toArray());
        $productId_input = $orderDetailTOProductId->product_id; // product id find inout form hidden
        $orderDetailPageProductId = $orderDetailTOProductId->product_id;
//      dd($orderDetailPageProductId);

        /*
        |--------------------------------------------------------------------------
        | Start: user_id find out
        |--------------------------------------------------------------------------
        | two table using 'order_details' and 'Order'
        */

        $orderDetail = OrderDetail::where('id', $orderDetailId)->first();
        $order = Order::where('id', $orderDetail->order_id)->first();

        $user_id = $order->user_id;

        /*
        |--------------------------------------------------------------------------
        | Start: Stock database table from find product_id
        |--------------------------------------------------------------------------
        | Apply conditional logic to retrieve the product_id
        */

        /*
        |--------------------------------------------------------------------------
        | Start: Validation Checking
        |--------------------------------------------------------------------------
        |
        */
        $serialNumbers = $request->input('serial_id');

        $stocks = Stock::whereIn('serial_number',$serialNumbers)->get();
//         dd($stocks->toArray());

        // 1. missing  serial checking
        $foundSerials = $stocks->pluck('serial_number')->toArray();
//        dd($foundSerials);
        $missingSerials = array_diff($serialNumbers,$foundSerials);
//        dd($missingSerials);

        if (!empty($missingSerials))
        {
            return redirect()->back()->with('error','Invalid Serial Number!');
        }
        // I passed an ID inside create.blade.php and matched it with the ID of the 'stock' table
        $invalidProductStocks = $stocks->where('product_id','!=',$productId_input);
//        dd($invalidProductStocks->toArray());

        if ($invalidProductStocks->isNotEmpty()){
            return redirect()->back()->with('error','Stock id is not valid!');
        }


        /*
        |--------------------------------------------------------------------------
        | Start: Store data
        |--------------------------------------------------------------------------
        |
        */


        $serialNumbers = $request->input('serial_id');

        foreach ($serialNumbers as $sn)
        {
            $stock = Stock::where('serial_number',$sn)->first();
            $stock_id = $stock->id;
            $stockDbProductId = $stock->product_id;

//            dump($stockDbProductId);
            Sale::create([
                'user_id' => $user_id,
                'stock_id' => $stock_id
            ]);

            return redirect()->back()->with('success','successfully upload product!');
        }

        $stocks = Stock::whereIn('serial_number', $serialNumbers)->get();



    }


//    public function storeProductUpload(Request $request, $id)
//    {
//        $orderDetail = $this->orderService->sale($id);
//        return view('orders.sale', compact('orderDetail'));
//    }


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
