<?php

namespace App\Http\Controllers;

use App\Models\CustomerSale;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use function Symfony\Component\Uid\Factory\create;

class CustomerSaleController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('customerSale.create',compact('users'));
    }

    public function store(Request $request)
    {
        $serialNumbers = $request->input('serial_number',[]);
//        dd($serial_numbers);

        $foundSerial = Stock::whereIn('serial_number',$serialNumbers)->pluck('serial_number')->toArray();;

        $missingSerial = array_diff($serialNumbers,$foundSerial);

        $stockIds = Stock::whereIn('serial_number',$serialNumbers)->pluck('id')->toArray();
//        dd($stockIds);

        $existStock = Sale::whereIn('stock_id', $stockIds)->exists();
        $foundStockId = Sale::whereIn('stock_id',$stockIds)->pluck('stock_id')->toArray();

        $missingStock = array_diff($stockIds,$foundStockId);

        $validUserId = Sale::where('stock_id',$stockIds)->pluck('user_id');

        $authUserId = auth()->id();

        if ($validUserId !== $authUserId) {
            return back()->with('error','This user cant not Customer Sale!');
        }else{
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


            foreach ($stockIds as $stockId) {
                CustomerSale::create([
                    'user_id' => $userId,
                    'stock_id' => $stockId
                ]);
            }
            return back()->with('success', 'Successfully Customer sale!');
        }
    }
}
