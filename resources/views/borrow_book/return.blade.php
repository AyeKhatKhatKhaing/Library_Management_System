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
                                                <label class="text-uppercase" for="">User Bar Code</label>
                                                <input type="text" class="form-control" id="userCode" name="userCode" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 data-table" style="display: none">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Borrow Book Form</h5>
                                        </div>
                                        <div class="card-content respond-area">

                                            <table class="table table-border table-responsive-sm">

                                                <thead>
                                                <tr>
                                                    <th style="width: 250px">Book code</th>
                                                    <th>Book Name</th>
                                                    <th>Author</th>
                                                    <th>Book Categories</th>
                                                    <th>Price</th>


                                                </tr>
                                                </thead>
                                                <tbody class="table-list">


                                                </tbody>

                                            </table>

                                        </div>
                                    </div>
                                    <button type="button" onclick="save()"  class="btn btn-lg btn-primary">
                                        <i class="feather icon-check-circle"></i>Return Book
                                    </button>
                                    <button type="button" onclick="location.reload()" class="btn btn-lg btn-outline-primary">
                                        <i class="feather icon-book"></i> New Borrow
                                    </button>
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
    <script>

        function goNext(where){

            return $("where").focus();

        }

        $("#userCode").on("change",function () {
            let currentVal = $(this).val();
            if(currentVal.length >= 6){
                $.get("{{url('return-check')}}/"+currentVal,function (data) {
                    console.log(data);
                    // return "";
                    if(data.status == 1){
                        let d = data["userInfo"];
                        $(".user-info").remove();
                        $(".borrow-user").after(

                            `<div class="col-12 col-md-8 user-info">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>${d['username']}'s Details information</h5>
                                        </div>
                                        <div class="card-content">
                                            <table class="table table-borderless">
                                                <tbody><tr>                                                    <th>User Name</th>
                                                    <td>${d['username']}</td>
                                                    <th>Roll Number</th>
                                                    <td>${d['rollno']}</td>
                                                </tr>
                                                <tr>
                                                    <th>Major</th>
                                                    <td>${major[d['major']]}</td>
                                                    <th>NRC</th>
                                                    <td>${d['nrc']}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone Number</th>
                                                    <td>${d['phoneno']}</td>
                                                    <th>Address</th>
                                                    <td>${d['address']}</td>
                                                </tr>
</tbody></table>
                                        </div>
                                    </div>
                                </div>`
                        );
                        $(".table-list").empty();
                        $(".data-table").show();

                        let list = data.borrowList;

                        console.log(list);

                        let x;

                        for(x in list){

                            console.log(x);

                            $.get("{{url("bookinfo")}}/"+(list[x].bookId),function (data) {

                                console.log(data);



                                $(".table-list").append(`
                                    <tr class="row0">
                                        <td >${data[0].borrowbookId}</td>
                                        <td >${data[0].bookname}</td>
                                        <td >${data[0].author}</td>
                                        <td >${bookCat[data[0].bookCat]}</td>
                                        <td >${data[0].price}</td>

                                    </tr>
                                `);

                            });

                        }



                        $(".book-1").focus();
                    }else if(data.status == 2){

                        if(confirm(data.text)){
                            location.href = "{{url('fine')}}/"+currentVal;
                        }else{

                            $("#userCode").val("");
                            $("#userCode").focus();

                        }

                    }else if(data.status == 0){
                        alert(data.text);
                        $("#userCode").val("");
                        $("#userCode").focus();


                    }
                })
            }
        });




        function save() {

            let barCode = $("#userCode").val();

            $.get("{{url("return-save")}}/"+barCode ,function (data) {

                if(data){
                    location.reload();
                }else{
                    alert("something Error");
                }

            });

        }



    </script>
@endsection
