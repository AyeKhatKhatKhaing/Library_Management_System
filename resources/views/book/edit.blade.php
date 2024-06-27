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
                                <div class="col-12 col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Add New Book</h5>
                                        </div>
                                        <div class="card-body">

                                            <form method="post" action="{{route('b.update')}}">
                                                @csrf
                                                <input type="hidden" value="{{$result->id}}" name="id">
                                                <div class="from-group ">
                                                    <label for="borrowbookId" class="text-uppercase">Bar Code Id :</label>
                                                    <input type="text" class="form-control" name="borrowbookId" value="{{$result->borrowbookId}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookname" class="text-uppercase">Book Name :</label>
                                                    <input type="text" class="form-control" name="bookname" value="{{$result->bookname}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="author" class="text-uppercase">Author :</label>
                                                    <input type="text" class="form-control" name="author" value="{{$result->author}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price" class="text-uppercase">Price :</label>
                                                    <input type="text" class="form-control" name="price" value="{{$result->price}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="remark" class="text-uppercase">Remark :</label>
                                                    <input type="text" class="form-control" name="remark" value="{{$result->remark}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="availability" class="text-uppercase">Availability :</label>
                                                    <select name="availability" class="form-control" id="">
                                                        @foreach($availability as $key=>$available)
                                                            <option value="{{$key}}" {{$result->$available == $key ? "selected":""}}>{{$available}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <a href="{{route('b.name')}}" class="btn btn-primary">Home</a>
                                                    <button type="submit" class="btn btn-primary" name="reg" value="add">
                                                        <i class="feather icon-user-plus"></i> Update Book Card
                                                    </button>
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
