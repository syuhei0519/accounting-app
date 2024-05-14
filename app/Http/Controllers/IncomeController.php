<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Request as validation;
use Illuminate\Support\Str;

class IncomeController extends Controller
{
    public function index() {
        return Inertia::render('Income/Index',[
            'incomes' => Income::all([
               'name',
               'amount',
               'date',
               'comment',
               'id'
            ])
        ]);
    }

    public function create() {
        return Inertia::render('Income/Create');
    }

    public function store(Request $request) {

        $attributes = Validation::validate([
            'name'  => ['required', 'max:255'],
            'comment' => ['max:255'],
            'amount'  => ['required']
        ]);

        Income::create([
            'id' => Str::uuid(),
            'user_id' => 'f9193a07-89eb-4bb2-84ed-58aa4a365556',
            'name' => $request->name,
            'comment' => $request->comment,
            'amount' => $request->amount,
            'date' => $request->date
        ]);

        return redirect()->route('income.index');
    }

    public function edit($incomeId) {
        $income = Income::find($incomeId);

        if (!$income) {
            abort(404, '収入情報は存在しません');
        }

        return Inertia::render('Income/Edit', [
            'income' => $income
        ]);
    }

    public function update(Request $request, $incomeId) {
        $income = Income::find($incomeId);

        if (!$income) {
            abort(404, '収入情報は存在しません');
        }

        $attributes = Validation::validate([
            'name'  => ['required', 'max:255'],
            'comment' => ['max:255'],
            'amount'  => ['required'],
            'date' => ['required', 'date']
        ]);

        $income->update([
            'name' => $request->name,
            'comment' => $request->comment,
            'amount' => $request->amount,
            'date' => $request->date
        ]);

        return redirect()->route('income.index')->with('status', '収入情報が更新されました。');
    }

    public function destroy($incomeId) {
        $income = Income::find($incomeId);

        if (!$income) {
            abort(404, '収入情報は存在しません');
        }

        $income->delete();

        return redirect()->route('income.index')->with('status', '収入情報が削除されました。');
    }

}
