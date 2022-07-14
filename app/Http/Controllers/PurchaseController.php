<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyFormRequest;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function postBuy(BuyFormRequest $request)
    {
        Purchase::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
        ]);

        session()->flash('message', 'Compra exitosa!');

        return redirect()->route('dashboard');

    }
}
