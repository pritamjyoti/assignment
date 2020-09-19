@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   <label > Name : {{ Auth::guard('font')->user()->name }}</label><br>
                   <label > Email : {{ Auth::guard('font')->user()->email }}</label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
