@extends('layout.master')
@section('title', "UserInfo")
@section('content')
    <div class="container ">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="col-5 mt-5">
                <div class="form-test m-5 border border-faded p-4">
                    <form c1ass="p-4" method="post">
                        <h4 class="text-primary text-uppercase text-center">User Registration</h4>
                        <hr>
                        @csrf
                        <div class="form-group">
                            <label for="barcodeid">Bar Code Id :</label>
                            <input type="number" class="form-control" name="barcodeid">
                        </div>
                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number :</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="major">Major :</label>
                            <input type="text" class="form-control" name="major">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="form-test" class="btn btn-primary w-100">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection