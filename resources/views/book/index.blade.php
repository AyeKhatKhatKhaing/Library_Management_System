@extends('layout.master')
@section('title', "BookCard")

@section("style")
    <style>
        .fade-book{

            background-color: #e3e3e3 !important;

        }
        .show-book{
            background-color: #ffffff;
        }
    </style>
    @endsection

@section('content')
    @include('layout.header')
    @include('layout.nav')
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
                                        <h5 class="m-b-10">Book Card Management</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#">
                                                <i class="feather icon-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">All Book List</a>
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

                                        <div class="row">
                                            @foreach($books as $key=>$book)
                                            <div class="col-12 col-md-4 ">

                                                    <div class="card user-card {{$book->availability?"show-book":"fade-book"}}">
                                                        <div class="card-block">
                                                            <h4 class="m-b-15">{{$book->bookname}}</h4>
                                                            <h5 class="f-w-300 mb-3">Borrow Book Id : {{$book->borrowbookId}}</h5>
                                                            <span class="text-muted"><label class="label theme-bg text-white f-12 f-w-400">{{$book->price}}</label>{{$book->author}}</span>
                                                            <span class="float-right">
{{--                                                                <a href="{{route('b.edit', $book->id)}}" class="btn btn-icon btn-info text-white btn-sm mb-0"><i class="feather icon-edit"></i></a>--}}
                                                                <a href="{{route('b.detail', $book->id)}}" class="btn btn-icon btn-primary text-white btn-sm mb-0"><i class="feather icon-info"></i></a>
                                                                <a href="{{route('b.delete', $book->id)}}" class="btn btn-icon btn-danger text-white btn-sm mb-0"><i class="feather icon-trash-2"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                            </div>
                                                @endforeach
                                            </div>
{{--                                        </div>--}}
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

    @section("script")

        <script>

            $("#borrowbookId").on("change",function () {
                console.log("is work");
                // $("#run").attr("type","submit");
            })
            $("#bookName").on("change",function () {
                $("#run").attr("type","submit");
            })

        </script>

        @endsection