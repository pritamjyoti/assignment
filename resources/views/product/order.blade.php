<?php use App\ActRules; ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Order </div>
                @can('create', Auth::user())
                
                @endcan

                <div class="card-body">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                    <tr>
                    <th>sl</th>
                    <th>Customer Name</th>    
                    <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Order No</th>
                        <th>Order Date</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($view as $k=>$row){  ?>

                    <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$row->user->name}}</td>
                        <td>{{$row->product->name}}</td>
                        <td>{{$row->price}}</td>
                        <td>{{$row->quantity}}</td>
                        <td>{{$row->order}}</td>
                        <td>{{date('d-m-Y',strtotime($row->created_at))}}</td>
                       
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
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Product add To Cart Header</h4>
        </div>
        <form action="{{ url('add_to_cart') }}" method="POST" >
          @csrf
        <div class="modal-body">
          Product Name : <span id="p_name"></span>
         <div class="form-group">
             <label>Enetr Quantity</label>
             <input type="number" min="1" id="quantity" max="10" name="quantity" required>
             <input type="hidden" id="pr_name"  name="pr_name" required>
             <input type="hidden" name="pr_id" id="pr_id" required>
             <input type="hidden" name="pr_price" id="pr_price" required>
         </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-secondary">Add to cart</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>
@endsection

@section('script')
<script>
    function add_to_cart(name,id,total,pr_price){
        $('#p_name').html(name);
        $('#pr_id').val(id);
        $('#pr_name').val(name);
        $('#pr_price').val(pr_price);
        $("#quantity").val('');
        $("#quantity").attr("max",total);
        $('#myModal').modal('show');
        
    }
</script>

@endsection