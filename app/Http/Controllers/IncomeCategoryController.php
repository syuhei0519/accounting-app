<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as validation;
use Illuminate\Support\Str;

class IncomeCategoryController extends Controller
{
    public function index() {
        return Inertia::render('IncomeCategory/Index',[
            'incomeCategories' => IncomeCategory::all([
               'name',
               'comment',
               'id'
            ])
        ]);
    }

    public function create() {
        return Inertia::render('IncomeCategory/Create');
    }

    public function store(Request $request) {

        $attributes = Validation::validate([
            'name'  => ['required', 'max:255'],
            'comment' => ['max:255'],
        ]);

        IncomeCategory::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'comment' => $request->comment
        ]);

        return redirect()->route('incomeCategory.index');
    }

    public function edit($incomeCategoryId) {
        $incomeCategory = IncomeCategory::find($incomeCategoryId);
        $incomeCtg = new IncomeCategory();

        if (!$incomeCategory) {
            abort(404, '収入カテゴリー情報は存在しません');
        }

        return Inertia::render('IncomeCategory/Edit', [
            'incomeCategory' => $incomeCategory,
            'isRegisteredIncomeByCategory' => $incomeCtg->isRegisteredIncomeByCategory($incomeCategoryId)
        ]);
    }

    public function update(Request $request, $incomeCategoryId) {
        $incomeCategory = IncomeCategory::find($incomeCategoryId);

        if (!$incomeCategory) {
            abort(404, '収入カテゴリー情報は存在しません');
        }

        $attributes = Validation::validate([
            'name'  => ['required', 'max:255'],
            'comment' => ['max:255']
        ]);

        $incomeCategory->update([
            'name' => $request->name,
            'comment' => $request->comment
        ]);

        return redirect()->route('incomeCategory.index')->with('status', '収入カテゴリー情報が更新されました。');
    }

    public function destroy($incomeCategoryId) {
        $incomeCategory = IncomeCategory::find($incomeCategoryId);

        if (!$incomeCategory) {
            abort(404, '収入カテゴリー情報は存在しません');
        }

        $incomeCategory->delete();

        return redirect()->route('incomeCategory.index')->with('status', '収入カテゴリー情報が削除されました。');

    }
}
