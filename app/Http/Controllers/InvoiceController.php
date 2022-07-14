<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::without('purchases')->get();

        return view('invoices')->with('invoices', $invoices);
    }

    public function show(Invoice $invoice)
    {
        return view('show_invoice')->with('invoice', $invoice);
    }

    public function generate()
    {
        $customers = User::get();

        $customersWithPurchasesWithoutInvoice = $customers->filter(function ($customer) {
            return $customer->purchases()->where('invoice_id', null)->exists();
        });

        if ($customersWithPurchasesWithoutInvoice->isEmpty()) {
            $message = 'No hay mas compras sin factura emitida.';
        } else {
            foreach ($customersWithPurchasesWithoutInvoice as $customer) {
                $total = 0;
                $total_tax = 0;
                $purchases = $customer->purchases()->where('invoice_id', null)->get();

                $newInvoice = Invoice::create([
                    'total' => 0,
                    'total_tax' => 0
                ]);

                foreach($purchases as $purchase) {
                    $total += $purchase->product->price;
                    $total_tax += $purchase->product->tax_amount;
                    $purchase->update(['invoice_id' => $newInvoice->id]);
                }

                $newInvoice->update(['total' => $total, 'total_tax' => $total_tax]);
            }
            $message = 'Facturas procesadas correctamente.';
        }

        session()->flash('message', $message);

        return redirect()->route('invoice.index');
    }
}
