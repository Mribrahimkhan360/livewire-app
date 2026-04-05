<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $customers = Sale::with(['stock.product.brand'])->get();
        return view('customers.index',compact('customers'));
    }
}
