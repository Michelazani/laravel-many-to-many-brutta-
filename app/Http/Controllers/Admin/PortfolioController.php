<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Type;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios=Portfolio::all();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types= Type::all();
        return view('admin.portfolios.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'Project'=>['required', 'min:3', 'string', 'max:150'],
            'Author'=>['required','min:3', 'string', 'max:50'],
            'Description'=>['required', 'min:3', 'string', 'max:250']
        ]);
        $portfolio = Portfolio::create($data);
        return redirect()->route('admin.portfolios.show', $portfolio);
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolios.show',compact('portfolio') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        $types= Type::all();
        return view('admin.portfolios.edit', compact('portfolio', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $data = $request->all();
        $portfolio ->update($data);
        return redirect()->route('admin.portfolios.show', $portfolio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('admin.portfolios.index');

    }
}
