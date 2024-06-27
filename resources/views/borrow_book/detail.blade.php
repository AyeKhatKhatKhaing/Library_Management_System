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
                                        <h5 class="m-b-10">Borrow Book Management</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#">
                                                <i class="feather icon-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">Borrow Book</a>
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
                                <div class="col-12 col-md-4 borrow-user">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Borrow Book Form</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="text-uppercase" for="">User's Bar Code</label>
                                                <input type="text" class="form-control" id="userCode" name="userCode" value="{{$borrowInfo->userId}}" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8 user-info">
                                    <div class="card">
                                        <div class="card-header">

                                            @php
                                                $user = new \App\UserCard();
                                                $userInfo = $user->where("barcodeId",$borrowInfo->userId)->first();
                                            @endphp

                                            <h5>{{$userInfo['username']}}'s Details information</h5>
                                        </div>
                                        <div class="card-content">
                                            <table class="table table-borderless">
                                                <tbody><tr>
                                                    <th>User Name</th>
                                                    <td>{{$userInfo['username']}}</td>
                                                    <th>Roll Number</th>
                                                    <td>{{$userInfo['rollno']}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Major</th>
                                                    <td>{{$major[$userInfo['major']]}}</td>
                                                    <th>NRC</th>
                                                    <td>{{$userInfo['nrc']}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone Number</th>
                                                    <td>{{$userInfo['phoneno']}}</td>
                                                    <th>Address</th>
                                                    <td>{{$userInfo['address']}}</td>
                                                </tr>
                                                </tbody></table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 data-table">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Borrow Book Form</h5>
                                        </div>
                                        <div class="card-content respond-area">

                                            <table class="table table-border table-responsive-sm">

                                                <thead>
                                                <tr>
                                                    <th style="width: 250px">Book Bar Code</th>
                                                    <th>Book Name</th>
                                                    <th>Author</th>
                                                    <th>Book Categories</th>
                                                    <th>Price</th>


                                                </tr>
                                                </thead>
                                                <tbody class="table-list">

                                                @foreach($borrowList as $bl)
                                                    @php $book = new \App\BookCard();$bDetail = $book->where("borrowbookId",$bl->bookId)->first();  @endphp

                                                    <tr>
                                                        <td>{{$bl->bookId}}</td>
                                                        <td>{{$bDetail->bookname}}</td>
                                                        <td>{{$bDetail->author}}</td>
                                                        <td>{{$bookCat[$bDetail->bookCat]}}</td>
                                                        <td>{{$bDetail->price}}</td>
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
    <!-- [ Main Content ] end -->
@endsection

@section('script')
@endsection
