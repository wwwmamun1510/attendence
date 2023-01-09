<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;



class PaymentController extends Controller
{
    function index(){
        $payments = Payment::all();
        return view('admin.payments.index', [
            'payments'=>$payments,
        
        ]);
    }
    public function insert(Request $request){  
           
        $request->validate([
             'product_name'=>'required|unique:payments',
             'product_price'=>'required|unique:payments',
             'total'=>'required|unique:payments',
             'note'=>'required|unique:payments',
            
            
           
        ],[
            'product_name.required'=>'Product Name is Not Exist',
            'product_name.unique'=>'Product Name is Already Exist',
            'product_price.required'=>'Product Price is Not Exist',
            'product_price.unique'=>'Product Price is Already Exist',
            'total.required'=>'Total is Not Exist',
            'total.unique'=>'Total is Already Exist',
            'note.required'=>'Note is Not Exist',
            'note.unique'=>'Note is Already Exist',
            

        ]);


        Payment::insert([
               'product_name'=> $request->product_name,
               'product_price'=> $request->product_price,
               'total'=> $request->total,
               'note'=> $request->note,
               'created_at'=>Carbon::now(),


          ]);
        return back()->with('success', 'Payment Added Successfully!');
       }
       function update(Request $request){
        Payment::where('id',$request->product_id)->update([
            'product_name'=> $request->product_name,
            'product_price'=> $request->product_price,
            'total'=> $request->total,
            'note'=> $request->note,
            'updated_at'=>Carbon::now(),
         ]);
         return back()-> with('success','Payment Updated!');
        }
      function delete($payment_id){
        Payment::find($payment_id)->delete();
        return back()->with('delete', 'Payment Delected');
        }
       function edit($payment_id){
         $edit =  Payment::find($payment_id);
         return view('admin.payments.edit',[
             'edit'=>$edit,
         ]);
      }
      function payment_view(){
        $payments= Payment::all();
        return view('admin.payments.invoice', [
            'payments'=>$payments,
        
        ]);
        
    }
}
