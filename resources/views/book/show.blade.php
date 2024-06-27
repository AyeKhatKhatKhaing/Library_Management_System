@extends('layout.master')
@section('title', "BookCard")
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
                                        <h5 class="m-b-10">Book Management</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#">
                                                <i class="feather icon-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">Book Details</a>
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
                                            <h5>{{$result->bookname}}'s Details information</h5>
                                        </div>
                                        <div class="card-content">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>No</th>
                                                    <td>{{$result->id}}</td>
                                                    <th>Bar Code Id</th>
                                                    <td>{{$result->borrowbookId}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Book Name</th>
                                                    <td>{{$result->bookname}}</td>
                                                    <th>Categories</th>
                                                    <td>{{$bookCat[$result['bookCat']]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Author</th>
                                                    <td>{{$result->author}}</td>
                                                    <th>Price</th>
                                                    <td>{{$result->price}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Remark</th>
                                                    <td>{{$result->remark}}</td>
                                                    <th>Reg Date</th>
                                                    <td>{{$result->created_at->format('d/m/Y')}}</td>
{{--                                                    <th>Availability</th>--}}
{{--                                                    <td>{{$result->availability}}</td>--}}
                                                </tr>
                                                <tr>

{{--                                                    <th>Controls</th>--}}
{{--                                                    <td>{{$result->created_at->format('h:i A')}}</td>--}}
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="card theme-bg2">
                                        <div class="card-block">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col">
                                                    <i class="feather icon-user text-white" style="font-size: 5em;"></i>
                                                </div>
                                                <div class="col">
                                                    <h2 class="text-white f-w-300">{{$result->borrowbookId}}</h2>
                                                    <h6 class="text-white text-uppercase">Borrow Book Id</h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card note-bar">
                                        <div class="card-header">
                                            <h5>Card Controls</h5>
                                        </div>
                                        <div class="card-block text-center">
                                            <a href="{{route('b.edit', $result->id)}}" class="btn btn-info text-white btn-sm mb-0"><i class="feather icon-edit"></i>Edit</a>
{{--                                            <a href="{{route('c.name')}}" class="btn btn-primary text-white btn-sm mb-0"><i class="feather icon-home"></i>Home</a>--}}
                                            <a href="{{route('b.delete', $result->id)}}" class="btn btn-danger text-white btn-sm mb-0"><i class="feather icon-trash-2"></i>Delete</a>
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
