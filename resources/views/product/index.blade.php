<?php use App\ActRules; ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Product </div>
                @can('create', Auth::user())
                <div style="float: right;"><a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">Add new Product</a></div>  
                @endcan

                <div class="card-body">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                    <tr>
                    <th>sl</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>SKU</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($view as $k=>$row){  ?>

                    <tr>
                    <td>{{$k+1}}</td>
                     
                        <td>{{$row->name}}</td>
                        <td>{{$row->amount}}</td>
                        <td>{{$row->quantity}}</td>
                        <td>{{$row->sku}}</td>
                        <td>{{($row->ar_type ==1)?"Active":"In-Active"}}</td>
                        <td>  <a href="{{ route('product.edit',$row->id) }}" class="btn btn-primary btn-sm">edit</a>
                                                
                        
                        </td>
                    </tr>
                    <?php } 
                    
                    ?>
                    </tbody>
                    </table>
                    <br>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
