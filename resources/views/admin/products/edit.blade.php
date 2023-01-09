@extends('layouts.app')

@section('content')
    <div class="">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title text-center" >Edit Product List Details</h2>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success mt-1 ">{{session('success')}}</div>
                        @endif
                        <div class="card-body">
                            <form action="{{url('/product/update')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-label">Product Name</label>
                                    <input type="hidden" name="product_id" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="product_name" value="{{$edit->product_name}}">
                                    
                                    @error('product_name')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Type</label>
                                    <input type="hidden" name="type_id" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="type" value="{{$edit->type}}">
                                    
                                    @error('type')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Coast Price</label>
                                    <input type="hidden" name="coast_price" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="coast_price" value="{{$edit->coast_price}}">
                                    
                                    @error('coast_price')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Sale Price</label>
                                    <input type="hidden" name="sale_id" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="sale_price" value="{{$edit->sale_price}}">
                                    
                                    @error('sale_price')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Has Stock</label>
                                    <input type="hidden" name="has_stock" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="has_stock" value="{{$edit->has_stock}}">
                                    
                                    @error('has_stock')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group pt-2 text-center">
                                    <button type="submit" class="btn btn-primary">Update Product List</button>
                               </div>
                           </form>
                       </div>
                 </div>
            </div>
      </div>
</div>
@endsection