
@extends('custom_layouts.app')
@section('title', 'Dashboard')
@section('main')
@include('customer.modals')
    <div class="row py-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="data">
                               
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
