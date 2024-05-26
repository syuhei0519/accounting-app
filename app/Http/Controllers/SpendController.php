<?php

namespace App\Http\Controllers;

use App\Models\PaymentWay;
use App\Models\Spend;
use App\Models\SpendCategory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Request as validation;
use Illuminate\Support\Str;

class SpendController extends Controller
{
    public function index() {
        return Inertia::render('Spend/Index',[
            'spends' => Spend::all([
               'name',
               'amount',
               'date',
               'comment',
               'id',
               'category_id',
               'payment_way_id'
            ]),
            'spendCategories' => SpendCategory::all([
                'name',
                'id'
            ]),
            'paymentWays' => PaymentWay::all([
                'id',
                'name'
            ]),
        ]);
    }

    public function create() {
        return Inertia::render('Spend/Create',[
            'spend_categories' => SpendCategory::all([
                'id',
                'name'
            ]),
            'payment_ways' => PaymentWay::all([
                'id',
                'name'
            ]),
        ]);
    }

    public function store(Request $request) {

        $attributes = Validation::validate([
            'name'  => ['required', 'max:255'],
            'comment' => ['max:255'],
            'amount'  => ['required']
        ]);

        Spend::create([
            'id' => Str::uuid(),
            'category_id' => $request->category_id,
            'name' => $request->name,
            'comment' => $request->comment,
            'amount' => $request->amount,
            'payment_way_id' => $request->payment_way_id,
            'date' => $request->date
        ]);

        return redirect()->route('spend.index');
    }

    public function edit($spendId) {
        $spend = Spend::find($spendId);
        $currentSpendCategory = $spend->category_id;
        $currentPaymentWay = $spend->payment_way_id;

        if (!$spend) {
            abort(404, '支出情報は存在しません');
        }

        return Inertia::render('Spend/Edit', [
            'spend' => $spend,
            'currentSpendCategory' => $currentSpendCategory,
            'currentPaymentWay' => $currentPaymentWay,
            'spendCategories' => SpendCategory::all([
                'name',
                'id'
            ]),
            'paymentWays' => PaymentWay::all([
                'name',
                'id'
            ])
        ]);
    }

    public function update(Request $request, $spendId) {
        $spend = Spend::find($spendId);

        if (!$spend) {
            abort(404, '支出情報は存在しません');
        }

        $attributes = Validation::validate([
            'name'  => ['required', 'max:255'],
            'comment' => ['max:255'],
            'amount'  => ['required'],
            'date' => ['required', 'date']
        ]);

        $spend->update([
            'category_id' => $request->currentSpendCategory,
            'payment_way_id'=> $request->currentPaymentWay,
            'name' => $request->name,
            'comment' => $request->comment,
            'amount' => $request->amount,
            'date' => $request->date
        ]);

        return redirect()->route('spend.index')->with('status', '支出情報が更新されました。');
    }

    public function destroy($spendId) {
        $spend = Spend::find($spendId);

        if (!$spend) {
            abort(404, '支出情報は存在しません');
        }

        $spend->delete();

        return redirect()->route('spend.index')->with('status', '支出情報が削除されました。');
    }

}
