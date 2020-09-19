<?php use App\ActRules; ?>
@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Product </div>
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
                        <td>  <a href="#" onclick="add_to_cart('{{ $row->name }}',{{ $row->id }},{{$row->quantity}})" class="btn btn-primary btn-sm">Add To Cart</a>
                                                
                        
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
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <form accept="#" method="POST" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Product add To Cart Header</h4>
        </div>
        <div class="modal-body">
          Product Name : <span id="p_name"></span>
         <div class="form-group">
             <label>Enetr Quantity</label>
             <input type="humber" min="1">
         </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-secondary">Add to cart</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      myModal
    </div>
  </div>
@endsection

@section('script')
<script>
    function add_to_cart(name ,total, id){
        $('#p_name').html(name);
        $('#myModal').modal('show');
        
    }
</script>

@endsection