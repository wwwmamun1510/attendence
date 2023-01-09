<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    function index(){
        $products = Product::all();
        return view('admin.products.index', [
            'products'=>$products,
        
        ]);
    }
    public function insert(Request $request){  
           
        $request->validate([
             'product_name'=>'required|unique:products',
             'type'=>'required|unique:products',
             'coast_price'=>'required|unique:products',
             'sale_price'=>'required|unique:products',
   
            
           
        ],[
            'product_name.required'=>'Product Name is Not Exist',
            'product_name.unique'=>'Product Name is Already Exist',
            'type.required'=>'Product Price is Not Exist',
            'type.unique'=>'Product Price is Already Exist',
            'coast_price.required'=>'Discount price is Not Exist',
            'coast_price.unique'=>'Discount price is Already Exist',
            'sale_price.required'=>'Discount is Not Exist',
            'sale_price.unique'=>'Discount is Already Exist',
      
            

        ]);


        Product::insert([
               'product_name'=> $request->product_name,
               'type'=> $request->type,
               'coast_price'=> $request->coast_price,
               'sale_price'=> $request->sale_price,
               'has_stock'=> $request->has_stock,
               'created_at'=>Carbon::now(),


          ]);
        return back()->with('success', 'Product Added Successfully!');
       }
       function delete($product_id){
        Product::find($product_id)->delete();
        return back()->with('delete', 'Product Delected');
        }
       function edit($product_id){
         $edit = Product::find($product_id);
         return view('admin.products.edit',[
             'edit'=>$edit,
         ]);
      }
     function update(Request $request){
        Product::where('id',$request->product_id)->update([
            'product_name'=> $request->product_name,
            'type'=> $request->type,
            'coast_price'=> $request->coast_price,
            'sale_price'=> $request->sale_price,
            'has_stock'=> $request->has_stock,
            'updated_at'=>Carbon::now(),
         ]);
         return back()-> with('success','Product Updated!');
       }
       function product_view(){
        $products= Product::all();
        return view('admin.products.invoice', [
            'products'=>$products,
        
        ]);
        
    }
}
