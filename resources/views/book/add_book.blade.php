@extends('layout.master')
@section('title', "BookCard")

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
                                            <a href="#">Add Book Card</a>
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
                                <div class="col-12 col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Add New Book</h5>
                                        </div>
                                        <div class="card-body">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul class="list-group-item">
                                                        @foreach ($errors->all() as $error)
                                                            <li class="list-group-item">{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form method="post" id="reg" action="{{route('book')}}">
                                                @csrf
                                                <input type="hidden" value="" name="id">
                                                <div class="form-group">
                                                    <label for="borrowbookId" class="text-uppercase">Bar Code Id :</label>
                                                    <input type="text" class="form-control" name="borrowbookId" id="borrowbookId" autofocus value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookname" class="text-uppercase">Book Name:</label>
                                                    <input type="text" class="form-control" name="bookname" id="bookName" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookCat" class="text-uppercase">Categories :</label>
                                                    <select name="bookCat" class="form-control" id="">
                                                        <option disabled selected class="text-uppercase">
                                                            <label class="text-uppercase">Select Categories</label>
                                                        </option>
                                                        @foreach($bookCat as $key=>$book)

                                                            <option value="{{$key}}" 
                                                            class="text-uppercase" >{{$book}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="author" class="text-uppercase">Author :</label>
                                                    <input type="text" class="form-control" name="author" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price" class="text-uppercase">Price :</label>
                                                    <input type="text" class="form-control" name="price" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="remark" class="text-uppercase">Remark :</label>
                                                    <input type="text" class="form-control" name="remark" value="">
                                                </div>
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="availability" class="text-uppercase">Availability :</label>--}}
{{--                                                    <select name="availability" class="form-control" id="">--}}
{{--                                                        @foreach($availability as $key=>$available)--}}
{{--                                                            <option value="{{$key}}" {{$key?'selected':''}}>{{$available}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-primary w-100" name="reg" id="run" value="add">
                                                        <i class="feather icon-user-plus"></i> Register
                                                    </button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="row">
                                        @if(count($books))
                                        <div class="col-12 col-md-6">

                                            <div class="card theme-bg bitcoin-wallet">
                                                <div class="card-block">
                                                    <h5 class="text-white mb-2">Total Book</h5>
                                                    <h2 class="text-white mb-2 f-w-300">{{$bookTotal}}</h2>
                                                    <span class="text-white d-block">Total Book at {{date("d / m / Y")}}</span>
                                                    <i class="feather icon-bookmark f-70 text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-6">

                                            <div class="card bg-c-blue bitcoin-wallet">
                                                <div class="card-block">
                                                    <h5 class="text-white mb-2">Last Book</h5>
                                                    <h2 class="text-white mb-2 f-w-300">{{$books[0]["borrowbookId"]}}</h2>
                                                    <span class="text-white d-block">{{$books[0]["bookname"]}} from <b>{{$bookCat[$books[0]["bookCat"]]}}</b></span>
                                                    <i class="feather icon-book f-70 text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                            @endif
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Last 10 Books</h5>
                                        </div>
                                        <table class="table table-striped table-responsive-sm mb-0">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Book Name</th>
                                                <th>Book Bar Code</th>
                                                <th>Author</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($books as $key=>$book)
                                                <tr>
                                                    <td>{{$book->id}}</td>
                                                    <td>{{$book->bookname}}</td>
                                                    <td>{{$book->borrowbookId}}</td>
                                                    <td>{{$book->author}}</td>
                                                    <td>
                                                        <a href="{{route('b.edit', $book->id)}}" class="btn btn-icon btn-info text-white btn-sm mb-0"><i class="feather icon-edit"></i></a>
                                                        <a href="{{route('b.detail', $book->id)}}" class="btn btn-icon btn-primary text-white btn-sm mb-0"><i class="feather icon-info"></i></a>
                                                        <a href="{{route('b.delete', $book->id)}}" class="btn btn-icon btn-danger text-white btn-sm mb-0"><i class="feather icon-trash-2"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach()
                                            </tbody>
                                        </table>
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
            let x = $(this).val();
            console.log(x);
            if(x.length>=6){
                $("#bookName").focus();
            }
        });


        $("#bookName").on("change",function () {
            $("#run").attr("type","submit");
        });

    </script>

@endsection
