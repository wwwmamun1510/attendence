@extends('layouts.app')

@section('content')
<div class="row">
     <div class="col-lg-6 m-auto">
          <div class="card">
              <div class="card-header">
               <h3 class="text-center">Add New Purchase</h3>
             </div>
             @if(session('success'))
               <div class="alert alert-success">{{ session('success') }}</div>
             @endif
            <div class="card-body">
            <form action="{{url('/purchase/insert')}}" method="POST">
              @csrf 
               <div class="mt-3">
                  <label for="" class="form-label">Product Name</label>
                  <input type="text" class="form-control" name="product_name">
                </div>
                <div class="mt-3">
                  <label for="" class="form-label">Product Price</label>
                  <input type="text" class="form-control" name="product_price">
                </div>
                <div class="mt-3">
                  <label for="" class="form-label">Description</label>
                  <textarea name="description" id="summernote" class="form-control"></textarea>
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
                        <h3 class="text-center">Purchase List Information</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Description</th>
                                <td>Created At</td>
                                <th>Action</th>
                            </tr>
                            @foreach($purchases as $key=>$purchase)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{$purchase->product_name }}</td>
                                <td>{{$purchase->product_price }}</td>
                                <td>{{$purchase->description}}</td>
                                <td>{{($purchase->created_at->diffforHumans() > 24)?$purchase->created_at->format('d/m/y h:i:s A'):$purchase->created_at->diffforHumans()}}</td>
                                <td>
                                   <a href="{{url('/purchase/edit')}}/{{$purchase->id}}" class="btn btn-danger">Edit</a>
                                   <a href="{{url('/purchase/view')}}" class="btn btn-info">view</a>
                                   <a href="{{url('/purchase/delete')}}/{{$purchase->id}}" class="btn btn-success">Delete</a>
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

