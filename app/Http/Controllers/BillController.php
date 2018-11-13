<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bill;
use App\Models\BillProduct;
use App\Models\BillStatus;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    public function addBill(Request $request)
    {
        $bill = Bill::create([
            'user_id' => Auth::user()->id,
            'total_amount' => Cart::getSubTotal(),
            'method_of_payment' => $request->payment,
            'note' => $request->note,
        ]);

        $list_cart = Cart::getContent();

        foreach ($list_cart as $item) {
            $bill_product = BillProduct::create([
                'bill_id' => $bill->id,
                'product_id' => $item->attributes->product_id,
                'product_color_id' => $item->attributes->color_id,
                'product_size_id' => $item->attributes->size_id,
                'quantity' => $item->quantity,
            ]);
        }

        $bill_status = BillStatus::create([
            'bill_id' => $bill->id,
            'user_id' => Auth::user()->id,
        ]);
    }

    public function getList()
    {
        $list_bill = Bill::all();

        return view('admin.bill.list', ['list_bill' => $list_bill]);
    }

    public function getDetailBill($id)
    {
        $bill = Bill::findOrFail($id);
        $status = BillStatus::all();

        return view('admin.bill.detail', ['bill' => $bill, 'status' => $status]);
    }

    public function postDetailBill(Request $request, $id)
    {
        $bill_status = BillStatus::create([
            'bill_id' => $id,
            'user_id' => Auth::user()->id,
            'status_id' => $request->status,
        ]);

        return redirect()->route('getDetailBill', ['id' => $id])->with('message', __('message.update'));
    }

    public function getDelete($id)
    {

    }
}
