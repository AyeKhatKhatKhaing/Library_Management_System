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
                                        <h5 class="m-b-10">Dashboard</h5>
                                    </div>
{{--                                    <ul class="breadcrumb">--}}
{{--                                        <li class="breadcrumb-item">--}}
{{--                                            <a href="#">--}}
{{--                                                <i class="feather icon-home"></i>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="breadcrumb-item">--}}
{{--                                            <a href="#">Add User Card</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!--content start-->
                            <div class="row">
                                <div class="col-md-6 col-xl-4">
                                    <div class="card theme-bg bitcoin-wallet">
                                        <a href="{{route('bb.index')}}">
                                            <div class="card-block">
                                                <h5 class="text-white mb-2">Book</h5>
                                                <h2 class="text-white mb-2 f-w-300">Borrow</h2>
                                                <span class="text-white d-block zg">စာအုပ္ငွားရမ္းရန္</span>
                                                <i class="feather icon-briefcase f-70 text-white"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card bg-warning bitcoin-wallet">
                                        <a href="{{route('bb.return')}}">
                                            <div class="card-block">
                                                <h5 class="text-white mb-2">Book</h5>
                                                <h2 class="text-white mb-2 f-w-300">Return </h2>
                                                <span class="text-white d-block zg">Book ျပန္အပ္ရန္</span>
                                                <i class="feather icon-inbox f-70 text-white"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card theme-bg2 bitcoin-wallet">
                                        <a href="{{route('add')}}">
                                            <div class="card-block">
                                                <h5 class="text-white mb-2">Book</h5>
                                                <h2 class="text-white mb-2 f-w-300">Book Add</h2>
                                                <span class="text-white d-block zg">Book ထည့္ရန္</span>
                                                <i class="feather icon-book f-70 text-white"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card bg-c-blue bitcoin-wallet">
                                        <a href="{{route('user_add')}}">
                                            <div class="card-block">
                                                <h5 class="text-white mb-2">User</h5>
                                                <h2 class="text-white mb-2 f-w-300">Card Add</h2>
                                                <span class="text-white d-block zg">User ထည့္ရန္</span>
                                                <i class="feather icon-user-plus f-70 text-white"></i>
                                            </div>
                                        </a>
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
