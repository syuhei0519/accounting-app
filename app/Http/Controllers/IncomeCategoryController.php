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
               'date',
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
            'user_id' => 'f9193a07-89eb-4bb2-84ed-58aa4a365556',
            'name' => $request->name,
            'comment' => $request->comment,
            'date' => $request->date
        ]);

        return redirect()->route('incomeCategory.index');
    }

    public function edit($incomeCategoryId) {
        $incomeCategory = IncomeCategory::find($incomeCategoryId);

        if (!$incomeCategory) {
            abort(404, '収入カテゴリー情報は存在しません');
        }

        return Inertia::render('IncomeCategory/Edit', [
            'incomeCategory' => $incomeCategory
        ]);
    }

    public function update(Request $request, $incomeCategoryId) {
        $incomeCategory = IncomeCategory::find($incomeCategoryId);

        if (!$incomeCategory) {
            abort(404, '収入カテゴリー情報は存在しません');
        }

        $attributes = Validation::validate([
            'name'  => ['required', 'max:255'],
            'comment' => ['max:255'],
            'date' => ['required', 'date']
        ]);

        $incomeCategory->update([
            'name' => $request->name,
            'comment' => $request->comment,
            'date' => $request->date
        ]);

        return redirect()->route('incomeCategory.index')->with('status', '収入カテゴリー情報が更新されました。');
    }
}