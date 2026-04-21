<?php

namespace App\Http\Controllers;

use App\Models\CustomerSale;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\User;
use App\Models\UserMapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerSaleController extends Controller
{
    public function index()
    {
        $distributorId = Auth::user()->id; // login id find
        $mappings = UserMapping::where('distributor_id', $distributorId)->get(); //
        $customerIds = $mappings->pluck('customer_id');

        $users = User::whereIn('id', $customerIds)->get();

        return view('customerSale.create', compact('users'));
    }

    public function store(Request $request)
    {
        $serialNumbers = $request->input('serial_number', []);

        // Get Stocks by Serial
        $stocks = Stock::whereIn('serial_number', $serialNumbers)->get();

        $foundSerials = $stocks->pluck('serial_number')->toArray();
        $invalidSerials = array_diff($serialNumbers, $foundSerials);

        if (!empty($invalidSerials)) {
            return back()->with('error', 'Invalid serial number!');
        }

        $stockIds = $stocks->pluck('id')->toArray();

        // Get sales related to stock
        $sales = Sale::whereIn('stock_id', $stockIds)->get();

        if ($sales->isEmpty()) {
            return back()->with('error', 'Stock does not exist!');
        }

        $saleIds = $sales->pluck('id')->toArray();
        $validUserIds = $sales->pluck('user_id')->toArray();

        // Check auth user
        if (!in_array(auth()->id(), $validUserIds)) {
            return back()->with('error', 'This serial number can not exist!');
        }

        // Check already sold
        $alreadySold = CustomerSale::whereIn('sale_id', $saleIds)->exists();
        if ($alreadySold) {
            return back()->with('error', 'Serial number is already sold!');
        }

        $userId = $request->input('user_id'); // This data from select option
        if (!$userId) {
            return back()->with('error', 'Please select user!');
        }

        // Insert data
        $data = [];

        foreach ($saleIds as $saleId) {
            $data[] = [
                'user_id' => $userId,
                'sale_id' => $saleId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        CustomerSale::insert($data);
        return back()->with('success', 'Successfully Customer sale!');
    }
}
