<?php

namespace App\Http\Controllers;

use App\Models\Spend;
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
               'id'
            ])
        ]);
    }

    public function create() {
        return Inertia::render('Spend/Create');
    }

    public function store(Request $request) {

        $attributes = Validation::validate([
            'name'  => ['required', 'max:255'],
            'comment' => ['max:255'],
            'amount'  => ['required']
        ]);

        Spend::create([
            'id' => Str::uuid(),
            'user_id' => 'f9193a07-89eb-4bb2-84ed-58aa4a365556',
            'name' => $request->name,
            'comment' => $request->comment,
            'amount' => $request->amount,
            'date' => $request->date
        ]);

        return redirect()->route('spend.index');
    }

    public function edit($spendId) {
        $spend = Spend::find($spendId);

        if (!$spend) {
            abort(404, '支出情報は存在しません');
        }

        return Inertia::render('Spend/Edit', [
            'spend' => $spend
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
