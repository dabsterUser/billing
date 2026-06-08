<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Expense;

use DB;

class ExpensesController extends Controller
{
    public function index()
    {

        $id = Auth()->user()->id;

        $expenses = Expense::where('user_id', $id)->get();

        $totalExpense = Expense::where('user_id', $id)->select(DB::raw('SUM(amount) as total_amount'))->get();

        return view('expenses.index', compact('expenses', 'totalExpense'));
    }

    public function store(Request $request)
    {

        $user_id = auth()->user()->id;

        $expense = new Expense;
        $expense->user_id = $user_id;
        $expense->date = $request->get('expense_date');
        $expense->title = $request->get('expense_title');
        $expense->additional_note = $request->get('expense_note');
        $expense->amount = $request->get('expense_amount');
        $expense->save();

        return redirect()->back()->with('message', 'Expense Added Successfully');

    }

    public function update(Request $request, $id)
    {
        $expense = Expense::find($id);

        $user_id = auth()->user()->id;

        $expense->user_id = $user_id;
        $expense->date = $request->get('expense_date');
        $expense->title = $request->get('expense_title');
        $expense->additional_note = $request->get('expense_note');
        $expense->amount = $request->get('expense_amount');
        $expense->update();

        return redirect()->back()->with('message', 'Expense Updated Successfully');
    }
}
