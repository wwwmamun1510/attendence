@extends('layouts.app')

@section('content')
<div class="row">
     <div class="col-lg-6 m-auto">
          <div class="card">
              <div class="card-header">
               <h3 class="text-center">Add New Product</h3>
             </div>
             @if(session('success'))
               <div class="alert alert-success">{{ session('success') }}</div>
             @endif
             <div class="card-body">
            <form action="{{url('/payment/insert')}}" method="POST">
              @csrf 
              <div class="mt-3">
                  <label for="" class="form-label">Product Name</label>
                  <input type="text" class="form-control" name="product_name">
               <div class="mt-3">
                  <label for="" class="form-label">Product Price</label>
                  <input type="text" class="form-control" name="product_price">
               </div>
               <div class="mt-3">
                   <label for="" class="form-label">Total</label>
                   <input type="text" class="form-control" name="total">
              </div>
              <div class="mt-3">
                  <label for="" class="form-label">Note</label>
                  <textarea name="note" id="summernote" class="form-control"></textarea>
              </div>
              <div class="mt-3 text-center">
                  <button type="submit" class="btn btn-primary">Added</button>
              </div>
             </form>
            </div>
           </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
                 <div class="card">
                 <div class="card-header">
                        <h3 class="text-center">Payment List Information</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Total</th>
                                <th>Note</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            @foreach($payments as $key=>$payment)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{$payment->product_name }}</td>
                                <td>{{$payment->product_price}}</td>
                                <td>{{$payment->total}}</td>
                                <td>{{$payment->note}}</td>
                                <td>{{($payment->created_at->diffforHumans() > 24)?$payment->created_at->format('d/m/y h:i:s A'):$payment->created_at->diffforHumans()}}</td>
                                <td>
                                   <a href="{{url('/payment/edit')}}/{{$payment->id}}" class="btn btn-danger">Edit</a>
                                   <a href="{{url('/payment/view')}}" class="btn btn-info">view</a>
                                   <a href="{{url('/payment/delete')}}/{{$payment->id}}" class="btn btn-success">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                      </table>
                  </div>
                </div>
            </div>
        </div>
     </div>
  </div>
@endsection

