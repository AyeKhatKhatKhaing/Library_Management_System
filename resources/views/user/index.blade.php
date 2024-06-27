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
                                        <a href="#">Add User Card</a>
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
                                        <h5>Last 10 Users</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped table-responsive-sm mb-0" id="example">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Bar Code Id</th>
                                                <th>User Name</th>
                                                <th>Phone Number</th>
                                                <th>Major</th>
                                                <th>Reg Date</th>
                                                <th>Controls</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cards as $key=>$card)
                                                <tr>
                                                    <td>{{$card->id}}</td>
                                                    <td>{{$card->barcodeId}}</td>
                                                    <td>{{$card->username}}</td>
                                                    <td>{{$card->phoneno}}</td>
                                                    <td>{{$major[$card['major']]}}</td>
                                                    <td>{{$card->created_at->format('d/m/Y')}}</td>
                                                    <td><a href="{{route('c.edit', $card->id)}}" class="btn btn-icon btn-info text-white btn-sm mb-0"><i class="feather icon-edit"></i></a>
                                                        <a href="{{route('c.detail', $card->id)}}" class="btn btn-icon btn-primary text-white btn-sm mb-0"><i class="feather icon-info"></i></a>
                                                        <a href="{{route('c.delete', $card->id)}}" class="btn btn-icon btn-danger text-white btn-sm mb-0"><i class="feather icon-trash-2"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach()
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
    <script>
        $("#userName").on("change",function () {
            $("#reg").attr("type","submit");
        })
    </script>
    @endsection
