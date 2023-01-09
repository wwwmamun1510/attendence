@extends('layouts.app')

@section('content')
    <div class="">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title text-center" >Edit Purchase List Details</h2>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success mt-1 ">{{session('success')}}</div>
                        @endif
                        <div class="card-body">
                            <form action="{{url('/purchase/update')}}" method="POST">
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
                                    <label for="" class="form-label">Product Price</label>
                                    <input type="hidden" name="price_id" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="product_price" value="{{$edit->product_price}}">
                                    
                                    @error('product_price')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Description</label>
                                    <input type="hidden" name="description" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="description" value="{{$edit->description}}">
                                    
                                    @error('description')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group pt-2 text-center">
                                    <button type="submit" class="btn btn-primary">Update Purchase</button>
                               </div>
                           </form>
                       </div>
                 </div>
            </div>
      </div>
</div>
@endsection