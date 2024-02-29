
@extends('custom_layouts.app')
@section('title', 'Create Product')
@section('main')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card mt-3">
            <div class="card-header">
                <h3>Add new product</h3>
            </div>
            <div class="card-body">
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" name="title">
                    </div>

                    <div class="mb-3">
                        <label for="">Short Description</label>
                        <input type="text" class="form-control" name="description">
                    </div>

                    <div class="mb-3">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name="price">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Discount Type</label>
                        <select class="form-select" name="discount_type" id="">
                            <option value="flat">Flat</option>
                            <option value="percentage">Percentage</option>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="">Discount</label>
                        <input type="number" class="form-control" name="discount">
                    </div>

                    <div class="mb-3">
                        <label for="">TAX (%)</label>
                        <input type="number" class="form-control" name="tax">
                    </div>

                    {{-- <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" role="switch" name="status" value="1" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Product Status</label>
                    </div> --}}

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="status" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Product Status
                        </label>
                      </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success px-5">Add Now</button>
                        <a href="{{route('products.index')}}" class="btn btn-primary px-5">Go back!</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('customJs')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const switchElement = document.getElementById('flexCheckDefault');
        switchElement.addEventListener('change', function () {
            if (this.checked) {
                this.value = 1;
            } else {
                this.value = 0;
            }
        });
    });
</script>
@endsection
