<?php use App\ActRules; ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New Product</div>

                <div class="card-body">
               <form action="{{ route('product.store') }}" method="POST">
                @csrf
                   
                    
                    <div class="form-group"><label>Name : </label>
                        <input type="text" class="form-control form-control-sm" name="name" placeholder="name" required>
                        @if($errors->has('name')) <em class="invalid-feedback"> {{ $errors->first('name') }} </em>  @endif
                    </div>
                    
                    <div class="form-group"><label>Price</label>
                        <input type="number" step="0.01" min="0" class="form-control form-control-sm" name="price" placeholder="Price" required>
                    </div>
                    <div class="form-group"><label>Quantity</label>
                        <input type="number" class="form-control form-control-sm" name="total" placeholder="Quantity" required>
                    </div>
                    <div class="form-group"><label>SKU</label>
                        <input type="text" class="form-control form-control-sm" name="sku" placeholder="SKU" required>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="status" placeholder="ar_title" value="1" checked>Active &nbsp; &nbsp;
                        <input type="radio" name="status" placeholder="ar_title" value="0"> In-Active
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="BTN">
                    </div>
                   
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
