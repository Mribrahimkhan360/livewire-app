<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Invoice | {{ config('app.name') }} </title>
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Inter', system-ui, sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #f0f4f8 0%, #e0e9f2 100%);
            color: #1f2937;
        }

        .invoice-container {
            overflow: hidden;
        }

        .header {
            display: flex;
            justify-content: space-between;
            padding-bottom: 0px;
            border-bottom: 3px solid #14b8a6;
            margin-bottom: 5px;
        }
        .company-info h1 {
            margin: 0 0 8px 0;
            font-size: 16px;
            font-weight: 700;
            background: linear-gradient(90deg, #14b8a6, #0ea5e9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .company-info p {
            margin: 4px 0;
            font-size: 12px;
            color: #4b5563;
        }
        .invoice-title {
            text-align: right;
            position: absolute;
            top: 0;
            right: 0;
        }
        .invoice-title p{
            font-size: 12px;
        }
        .invoice-title h2 {
            margin: 0 0;
            font-size: 16px;
            font-weight: 700;
            color: #14b8a6;
            letter-spacing: -1px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            /*margin: 10px 0;*/
        }
        th, td {
            /*padding: 14px 16px;*/
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        th {
            background: linear-gradient(90deg, #14b8a6, #0ea5e9);
            color: white;
            font-weight: 600;
            font-size: 12px;
        }
        table tr td p{
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .grand-total td {
            padding: 18px 16px;
        }
        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin: 15px 0 12px 0;
            border-left: 5px solid #14b8a6;
            border-bottom: 1px solid #14b8a6;
            padding-left: 12px;
            padding-bottom: 5px;
        }
        table head tr th{
            margin: 0;
            padding: 0;
            font-size: 12px;
        }
    </style>
</head>
<body>
<div class="invoice-container">
    <!-- Header -->
    <div class="header">
        <div class="company-info">
            <h1>Demo Interface Ltd</h1>
            <p><strong>Road:</strong> 01 | <strong>Avenue:</strong> 02<br />
                Demo DOHS | Dhaka-0000 <br />
                Bangladesh</p>
            <p><strong>Phone:</strong> +88-01234567890 | <strong>Email:</strong> demo@demo.com</p>
            <p>www.demointerface.com</p>
        </div>

        <div class="invoice-title">
            <h2>INVOICE</h2>
            <p><strong>Order Number #: {{ $invoice->id }}</strong> </p>
            <p><strong>Date:</strong> {{ $invoice->date }}</p>
            <p><strong>Order By:</strong> {{ $invoice->name }}</p>
        </div>
    </div>


    <!-- Products -->
    <div class="section-title">Products</div>
    <table style="width:100%; border-collapse: collapse; font-family: Arial, sans-serif; font-size: 14px;">
        <thead>
        <tr style="background: linear-gradient(to right, #0f766e, #14b8a6); color: #ffffff;">
            <th style="width:50px; padding:10px; text-align:left;color: #000000;font-size: 15px">#</th>
            <th style="padding:10px; text-align:left;color: #000000;font-size: 15px">Product Name</th>
            <th style="padding:10px; text-align:right;color: #000000;font-size: 15px">Status</th>
            <th style="padding:10px; text-align:right;color: #000000;font-size: 15px">Qty</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invoice->items as $item)
        <tr style="background-color:#f9fafb;">
            <td style="padding:10px; border-bottom:1px solid #e5e7eb;font-size: 12px;color:#475569;">{{ $loop->iteration }}</td>
            <td style="padding:10px; border-bottom:1px solid #e5e7eb;color:#475569;font-size: 12px">{{ $item->product->name }}</td>
            <td style="padding:10px; border-bottom:1px solid #e5e7eb; text-align:right;font-size: 12px"> {{ $invoice->status }} </td>
            <td style="padding:10px; border-bottom:1px solid #e5e7eb; text-align:right;font-size: 12px">{{ $item->product_quantity }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
