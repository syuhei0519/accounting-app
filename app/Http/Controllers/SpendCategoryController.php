<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpendCategory;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as validation;
use Illuminate\Support\Str;

class SpendCategoryController extends Controller
{
    public function index() {
        return Inertia::render('SpendCategory/Index',[
            'spendCategories' => SpendCategory::all([
               'name',
               'comment',
               'id'
            ])
        ]);
    }

    public function create() {
        return Inertia::render('SpendCategory/Create');
    }

    public function store(Request $request) {

        $attributes = Validation::validate([
            'name'  => ['required', 'max:255'],
            'comment' => ['max:255'],
        ]);

        SpendCategory::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'comment' => $request->comment
        ]);

        return redirect()->route('spendCategory.index');
    }

    public function edit($spendCategoryId) {
        $spendCategory = SpendCategory::find($spendCategoryId);
        $spendCtg = new SpendCategory();

        if (!$spendCategory) {
            abort(404, '支出カテゴリー情報は存在しません');
        }

        return Inertia::render('SpendCategory/Edit', [
            'spendCategory' => $spendCategory,
            'isRegisteredSpendByCategory' => $spendCtg->isRegisteredSpendByCategory($spendCategoryId)
        ]);
    }

    public function update(Request $request, $spendCategoryId) {
        $spendCategory = SpendCategory::find($spendCategoryId);

        if (!$spendCategory) {
            abort(404, '支出カテゴリー情報は存在しません');
        }

        $attributes = Validation::validate([
            'name'  => ['required', 'max:255'],
            'comment' => ['max:255']
        ]);

        $spendCategory->update([
            'name' => $request->name,
            'comment' => $request->comment
        ]);

        return redirect()->route('spendCategory.index')->with('status', '支出カテゴリー情報が更新されました。');
    }

    public function destroy($spendCategoryId) {
        $spendCategory = SpendCategory::find($spendCategoryId);

        if (!$spendCategory) {
            abort(404, '支出カテゴリー情報は存在しません');
        }

        $spendCategory->delete();

        return redirect()->route('spendCategory.index')->with('status', '支出カテゴリー情報が削除されました。');

    }
}
