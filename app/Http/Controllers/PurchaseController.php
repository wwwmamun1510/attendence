<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Purchase;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    function index(){
        $purchases = Purchase::all();
        return view('admin.Purchases.index', [
            'purchases'=>$purchases,
        
        ]);
    }
    public function insert(Request $request){  
           
        $request->validate([
             'product_name'=>'required|unique:purchases',
             'product_price'=>'required|unique:purchases',

             
            
           
        ],[
            'product_name.required'=>'Product Name is Not Exist',
            'product_name.unique'=>'Product Name is Already Exist',
            'product_price.required'=>'Product Price is Not Exist',
            'product_price.unique'=>'Product Price is Already Exist',

    
            

        ]);


        Purchase::insert([
               'product_name'=> $request->product_name,
               'product_price'=> $request->product_price,
               'description'=> $request->description,
               'created_at'=>Carbon::now(),


          ]);
        return back()->with('success', 'Purchase Added Successfully!');
       }
       function delete($purchase_id){
        Purchase::find($purchase_id)->delete();
        return back()->with('delete', 'Purchase Delected');
        }
       function edit($purchase_id){
         $edit =  Purchase::find($purchase_id);
         return view('admin.Purchases.edit',[
             'edit'=>$edit,
         ]);
      }
     function update(Request $request){
        Purchase::where('id',$request->product_id)->update([
            'product_name'=> $request->product_name,
            'product_price'=> $request->product_price,
            'description'=> $request->description,
            'updated_at'=>Carbon::now(),
         ]);
         return back()-> with('success','Purchase Updated!');
       }
       function purchase_view(){
        $purchases= Purchase::all();
        return view('admin.Purchases.invoice', [
            'purchases'=>$purchases,
        
        ]);
        
    }
}
