<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductDetails;
use App\Product;
class ProductController extends Controller
{
    public function index(){
        $view= Product::all();
        return view('product/index',compact('view'));
    }
    public function create(){
        return view('product/create');
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:product,name',
                   
        ]);
        $data['name'] = $request->name;
        $data['quantity'] = $request->total;
        $data['amount'] = $request->price;
        $data['sku'] = $request->sku;
        $data['status'] = $request->status;
        $data['in_stock'] = 1;
       $res =  Product::create($data);
        $slave['product_id'] = $res->id;
        for($i=0; $i<$data['quantity']; $i++ ){
            $slave['pro_sku'] = $data['sku']."-".$i;
            ProductDetails::create($slave);
        }

        return redirect()->route('product.index')->with('success','New product Is created successfully');
    }
    

}
