<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Stock;
use Illuminate\Http\Request;

class SaleReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        /**
         * ======= SL Product =======
         * Step 1: Get all stock IDs from sales table
         * Step 2: Find related stocks
         * Step 3: Extract product IDs from stocks
         */

//        $saleDetailToStockId = Sale::select('stock_id')->get();
//        $stockDetailToProductId = Stock::whereIn('id',$saleDetailToStockId)->pluck('product_id');

        /**
         * ======= Brand Name =======
         * Step 1: Get all stock IDs from sales table
         * Step 2: Find related stocks
         * Step 3: Extract product IDs from stocks
         * Step 4: Stock Detail to product id
         * Step 5: Brand Detail To Brand Name
         */

//         $productDetailToBrandId = Product::whereIn('id',$stockDetailToProductId)->pluck('brand_id');
//         $brandDetailToBrandName = Brand::whereIn('id',$productDetailToBrandId)->pluck('name');
//         dd($brandDetailToBrandName->toArray());

        /**
         * ======= Product Name =======
         * Step 1: Get all stock IDs from sales table
         * Step 2: Find related stocks
         * Step 3: Extract product IDs from stocks
         * Step 4: Product detail to product name
         */

//        $productDetailToProductName = Product::whereIn('id',$stockDetailToProductId)->pluck('name');

        /**
         * ======= User Name =======
         * Step 1: Get all stock IDs from sales table
         * Step 2: Find related stocks
         * Step 3: Extract product IDs from stocks
         * Step 4: Sale detail to UserId
         */

//        $saleDetailToUserId = Sale::select('user_id')->get();

        /**
         * ======= User Name =======
         * Step 1: Get all stock IDs from sales table
         * Step 2: Find related stocks
         * Step 3: Extract product IDs from stocks
         * Step 4: Sale detail to created_at
         */
//
//        $saleDetailToDate = Sale::pluck('created_at')->map(function ($date) {
//            return $date->format('Y-m-d');
//        });

//        dd($saleDetailToDate->toArray());
        $sales = Sale::with([
            'stock.product.brand',
            'user'
        ])->get();
        return view('sales.index',compact('sales'));
    }

}
