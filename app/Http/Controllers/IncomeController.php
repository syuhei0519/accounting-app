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
               'comment'
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
}
