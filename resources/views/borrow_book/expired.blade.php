@extends('layout.master')
@section('title', "Borrow Book")
@section("style")
    <style>
        .w-250{
            width: 250px !important;
        }
        td{
            vertical-align: middle !important;
        }
    </style>
@endsection
@section('content')
    @include('layout.nav')
    @include('layout.header')

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
                                        <h5 class="m-b-10">Borrow Card</h5>
                                    </div>
                                                                        <ul class="breadcrumb">
                                                                            <li class="breadcrumb-item">
                                                                                <a href="#">
                                                                                    <i class="feather icon-home"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li class="breadcrumb-item">
                                                                                <a href="#">Expired Book</a>
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

                                <div class="col-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Borrow List</h5>
                                        </div>
                                        <div class="card-body">
                                            <table id="example" class="table table-responsive-sm">
                                                <thead>
                                                    <tr>
                                                        <th>User Bar Code</th>
                                                        <th>Start Date</th>
                                                        <th>Return Date</th>
                                                        <th>Return Status</th>
                                                        <th>Controls</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($list as $l)
                                                    <tr>
                                                        <td>{{$l->userId}}</td>
                                                        <td>{{$l->start_date}}</td>
                                                        <td>{{$l->last_date}}</td>
                                                        <td class="font-weight-bold text-uppercase {{$l->return_status?"text-success":"text-danger"}}">{{$l->return_status?"Returned":"Borroweded"}}</td>
                                                        <td>
                                                            <a href="{{route('bb.detail',$l->id)}}" class="btn btn-info"><i class="feather icon-info"></i> Detail</a>
                                                            <a href="{{route("bb.fineShow",$l->userId)}}" class="btn btn-success"><i class="feather icon-info"></i> Fine</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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

    @endsection
@section("script")



    @endsection
