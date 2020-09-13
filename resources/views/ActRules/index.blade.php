<?php use App\ActRules; ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Act & Rules</div>
                @can('create', Auth::user())
                <div style="float: right;"><a href="{{ route('act.create') }}" class="btn btn-primary btn-sm">Add new Act & Rules</a></div>  
                @endcan

                <div class="card-body">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                    <tr>
                    <th>sl</th>
                        <th>title</th>
                        <th>type</th>
                        <th>file</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php /* ActRules::chunk(200, function ($flights) {  foreach($flights as $k=>$row){  foreach (ActRules::orderBy('ar_id','desc')->cursor() as $k=>$row) {  */  foreach($view as $k=>$row){  ?>

                    <tr>
                    <td>{{$k+1}}</td>
                        <td>{{($row->ar_type ==1)?"UD":"MA"}}</td>
                        <td>{{$row->ar_title}}</td>
                        <td>{{$row->ar_file}}</td>
                        <td>  <a href="{{ route('act.edit',$row->ar_id) }}" class="btn btn-primary btn-sm">edit</a>
                            <a href="{{ url('act_delete',$row->ar_id) }}" class="btn btn-primary btn-sm">Delete</a>
                        
                        
                        
                        </td>
                    </tr>
                    <?php } 
                    /* });*/
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
