
@extends('custom_layouts.app')
@section('main')
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="mb-3">
            <a href="{{route('products.create')}}">Create New Product</a>
        </div>
    </div>
</div>
@endsection