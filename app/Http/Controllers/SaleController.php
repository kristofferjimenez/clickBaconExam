<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Category;
use App\SalesItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::get();

        $total_sales = Sale::select('sales.id', DB::raw("SUM(amount) as total"))
                ->rightJoin('sales_items', 'sales.id', '=', 'sales_items.sales_id')
                ->groupBy('sales.id')
                ->get();

        // Store total_sales to total property
        for ($i=0; $i < count($sales); $i++) 
        { 
            $sales[$i]->total = $total_sales[$i]->total;
        }
        
        return view('/pages/sales/index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
      
        return view('/pages/sales/new', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sale $sale)
    {
        $attributes = $request->validate([
            'date'        => 'required',
            'amount'      => 'required',
            'category_id' => 'required'
        ]);
     
        $sale = Sale::create([
            'date' => $attributes['date']
        ]);

        for ($i=0; $i < count($attributes['amount']); $i++) 
        { 

            SalesItem::create([
                'sales_id'    => $sale->id,
                'category_id' => $attributes['category_id'][$i],
                'amount'      => $attributes['amount'][$i]
            ]);

        }

        return redirect('/sales');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $total = 0;
        $sales = Sale::find($id)->first();
        
        $salesItems = SalesItem::select('sales_items.id', 'sales_items.category_id', 'sales_items.amount', 'categories.name')
                            ->join('categories', 'sales_items.category_id', '=', 'categories.id')
                            ->where('sales_items.sales_id', '=', $id)
                            ->get();
        
        // Get total sales
        foreach ($salesItems as $salesItem) 
        {
            $total += $salesItem->amount;
        }
        
        return view('/pages/sales/edit', compact(['sales', 'salesItems', 'total']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes = $request->validate([
            'date'        => 'required',
            'amount'      => 'required',
            'category_id' => 'required'
        ]);
            
        $sale = Sale::where('id', $id)->update([
            'date' => $attributes['date']
        ]);
     
        for ($i=0; $i < count($attributes['amount']); $i++) 
        { 

            SalesItem::where('sales_id', $id)
                    ->where('category_id', $attributes['category_id'][$i])
                    ->update(['amount' => $attributes['amount'][$i]]);

        }

        return redirect('/sales');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy($sales)
    {
        Sale::destroy($sales);
    }
}
