<?php

namespace App\Http\Controllers;

use App\Models\CustomerSale;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use function Symfony\Component\Uid\Factory\create;

class CustomerSaleController extends Controller
{
    public function index()
    {
        $roles = User::role('customer')->get();
        return view('customerSale.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $serialNumbers = $request->input('serial_number',[]);

        $foundSerial = Stock::whereIn('serial_number',$serialNumbers)->pluck('serial_number')->toArray();;

        $missingSerial = array_diff($serialNumbers,$foundSerial);
        $stockIds = Stock::whereIn('serial_number',$serialNumbers)->pluck('id')->toArray();
        $saleIds = Sale::whereIn('stock_id',$stockIds)->pluck('id')->toArray();

        $existStock = Sale::whereIn('stock_id', $stockIds)->exists();
        $foundStockId = Sale::whereIn('stock_id',$stockIds)->pluck('stock_id')->toArray();
        $missingStock = array_diff($stockIds,$foundStockId);

        $validUserId = Sale::whereIn('stock_id', $stockIds)->pluck('user_id')->toArray();
        $authUserId = auth()->id();

        if (in_array($authUserId, $validUserId)) {

            $SaleId = CustomerSale::whereIn('sale_id',$saleIds)->exists();
            if ($SaleId)
            {
                return back()->with('error','Serial number is already sold!');
            }
            if (!empty($missingSerial)) {
                return back()->with('error', 'Invalid serial number!');
            }
            if ($missingStock) {
                return back()->with('error', 'Stock id does not exist!');
            }

            if (!$existStock) {
                return back()->with('error', 'Stock id does not exist!');
            }
            $userId = $request->input('user_id');
            if (!$userId) {
                return back()->with('error', 'Please select user');
            }

            foreach ($saleIds as $saleId) {
                CustomerSale::create([
                    'user_id' => $userId,
                    'sale_id' => $saleId,
                ]);
            }
            return back()->with('success', 'Successfully Customer sale!');
        }else{
            return back()->with('error','This serial number can not exist!');
        }
    }
}
