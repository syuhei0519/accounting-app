<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentWay;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as validation;
use Illuminate\Support\Str;

class PaymentWayController extends Controller
{
    public function index() {
        return Inertia::render('PaymentWay/Index',[
            'paymentWays' => PaymentWay::all([
               'name',
               'comment',
               'id'
            ])
        ]);
    }

    public function create() {
        return Inertia::render('PaymentWay/Create');
    }

    public function store(Request $request) {

        $attributes = Validation::validate([
            'name'  => ['required', 'max:255'],
            'comment' => ['max:255'],
        ]);

        PaymentWay::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'comment' => $request->comment
        ]);

        return redirect()->route('paymentWay.index');
    }

    public function edit($paymentWayId) {
        $paymentWay = PaymentWay::find($paymentWayId);
        $spendCtg = new PaymentWay();

        if (!$paymentWay) {
            abort(404, '決済方法情報は存在しません');
        }

        return Inertia::render('PaymentWay/Edit', [
            'paymentWay' => $paymentWay,
            'isRegisteredSpendByPaymentWay' => $spendCtg->isRegisteredSpendByPaymentWay($paymentWayId)
        ]);
    }

    public function update(Request $request, $paymentWayId) {
        $paymentWay = PaymentWay::find($paymentWayId);

        if (!$paymentWay) {
            abort(404, '決済方法情報は存在しません');
        }

        $attributes = Validation::validate([
            'name'  => ['required', 'max:255'],
            'comment' => ['max:255']
        ]);

        $paymentWay->update([
            'name' => $request->name,
            'comment' => $request->comment
        ]);

        return redirect()->route('paymentWay.index')->with('status', '決済方法情報が更新されました。');
    }

    public function destroy($paymentWayId) {
        $paymentWay = PaymentWay::find($paymentWayId);

        if (!$paymentWay) {
            abort(404, '決済方法情報は存在しません');
        }

        $paymentWay->delete();

        return redirect()->route('paymentWay.index')->with('status', '決済方法情報が削除されました。');

    }
}
