@extends('layout.master')
@section('title', "UserCard")
@section('content')
    @include('layout.nav')
    @include('layout.header')
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">User Card</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#">
                                                <i class="feather icon-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">Update User Card</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!--content start-->
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Update User Card</h5>
                                        </div>
                                        <div class="card-body">

                                            <form method="post" action="{{route('c.update', $result->id)}}">
                                                @csrf
                                                <input type="hidden" value="{{$result->id}}" name="id">
                                                <div class="from-group ">
                                                    <label for="barcodeId" class="text-uppercase">Bar Code Id :</label>
                                                    <input type="text" class="form-control" name="barcodeId" value="{{$result->barcodeId}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="text-uppercase">User Name :</label>
                                                    <input type="text" class="form-control" name="username" value="{{$result->username}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="rollno" class="text-uppercase">Roll Number :</label>
                                                    <input type="text" class="form-control" name="rollno" value="{{$result->rollno}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="major" class="text-uppercase">Major :</label>
                                                    <input type="text" class="form-control" name="major" value="{{$major[$result['major']]}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nrc" class="text-uppercase">NRC :</label>
                                                    <input type="text" class="form-control" name="nrc" value="{{$result->nrc}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phoneno" class="text-uppercase">Phone Number :</label>
                                                    <input type="phone" class="form-control" name="phoneno" value="{{$result->phoneno}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address" class="text-uppercase">Address :</label>
                                                    <textarea name="address" rows="5" class="form-control">{{$result->address}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="reg" class="btn btn-primary w-100" value="add">
                                                        <i class="feather icon-user-plus"></i>Update</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--content end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
@endsection
