<?php use App\ActRules; ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New Act & Rules</div>

                <div class="card-body">
               <form action="{{ route('act.store') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <input type="radio" name="ar_type" placeholder="ar_title" value="1" checked>UD &nbsp; &nbsp;
                        <input type="radio" name="ar_type" placeholder="ar_title" value="2"> MA
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm" name="ar_title" placeholder="ar_title">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm" name="ar_file" placeholder="ar_file">
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
