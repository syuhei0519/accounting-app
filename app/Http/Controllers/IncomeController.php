<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\IncomeCategory;
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
               'id',
               'category_id'
            ]),
            'incomeCategories' => IncomeCategory::all([
                'name',
                'id'
            ])
        ]);
    }

    public function create() {
        return Inertia::render('Income/Create',[
            'income_categories' => IncomeCategory::all([
                'id',
                'name'
            ])
        ]);
    }

    public function store(Request $request) {

        $attributes = Validation::validate([
            'category_id' => ['required'],
            'name'  => ['required', 'max:255'],
            'comment' => ['max:255'],
            'amount'  => ['required']
        ]);

        Income::create([
            'id' => Str::uuid(),
            'category_id' => $request->category_id,
            'user_id' => '56827c0a-92a2-4e7b-8ae9-180213c410da',
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
