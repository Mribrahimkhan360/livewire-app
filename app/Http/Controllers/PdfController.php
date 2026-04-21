<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Sale;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{

    public function index()
    {
        return view('pdf.index');
    }


    // PDF download method
    public function show($id)
    {
        $order = Order::with(['user', 'orderDetails.product'])->findOrFail($id);
        $invoice = new \stdClass(); // empty object

        $invoice->id   = $id;
        $invoice->name = $order->user->name;
        $invoice->date = date('Y-m-d');
        $invoice->status = $order->order_status;


        // order details add
        $invoice->items = $order->orderDetails;
        $fileName = 'invoice_' . time() . '.pdf';
        $pdf = Pdf::loadView('pdf.index', compact('invoice'));
        return $pdf->stream($fileName);
    }

}
