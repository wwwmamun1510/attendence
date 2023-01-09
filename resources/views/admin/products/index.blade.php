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
            <form action="{{url('/product/insert')}}" method="POST">
              @csrf 
              <div class="mt-3">
                  <label for="" class="form-label">Product Name</label>
                  <input type="text" class="form-control" name="product_name">
               </div>
               <div class="mt-3">
                  <label for="" class="form-label">Type</label>
                  <input type="text" class="form-control" name="type">
               </div>
               <div class="mt-3">
                   <label for="" class="form-label">Coast Price</label>
                   <input type="text" class="form-control" name="coast_price">
              </div>
               <div class="mt-3">
                  <label for="" class="form-label">Sale Price</label>
                  <input type="text" class="form-control" name="sale_price">
               </div>
               <div class="mt-3">
                  <label for="" class="form-label">Has Stock</label>
                  <input type="text" class="form-control" name="has_stock">
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
                        <h3 class="text-center">Products List Information</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Type</th>
                                <th>Coast Price</th>
                                <th>Sale Price</th>
                                <th>Has Stock</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            @foreach($products as $key=>$product)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $product->product_name}}</td>
                                <td>{{ $product->type}}</td>
                                <td>{{ $product->coast_price}}</td>
                                <td>{{ $product->sale_price }}</td>
                                <td>{{ $product->has_stock}}</td>
                                <td>{{($product->created_at->diffforHumans() > 24)?$product->created_at->format('d/m/y h:i:s A'):$product->created_at->diffforHumans()}}</td>
                                <td>
                                   <a href="{{url('/product/edit')}}/{{$product->id}}" class="btn btn-danger">Edit</a>
                                   <a href="{{url('/product/view')}}" class="btn btn-info">view</a>
                                   <a href="{{url('/product/delete')}}/{{$product->id}}" class="btn btn-success">Delete</a>
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

