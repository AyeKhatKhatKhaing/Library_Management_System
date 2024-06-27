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
                                <div class="col-12 col-md-12">
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
                                                        <th>Control</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    @for($i=1;$i<4;$i++)
                                                        <tr class="row{{$i}}">
                                                            <td>
                                                                <input type="text" class="form-control book w-250 book-{{$i}}" data="{{$i}}">
                                                            </td>
                                                            <td class="bookName{{$i}}"></td>
                                                            <td class="author{{$i}}"></td>
                                                            <td class="bookCat{{$i}}"></td>
                                                            <td class="price{{$i}}"></td>
                                                            <td class="clear del-{{$i}}">
                                                                <button type="button" onclick="del({{$i}})" class="btn btn-icon btn-rounded m-0 btn-outline-danger">
                                                                    <i class="feather icon-trash-2"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>

                                            </table>

                                        </div>
                                    </div>
                                    <button type="button" onclick="save()" class="btn btn-lg btn-primary">
                                        <i class="feather icon-check-circle"></i>Borrow Now
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
                    if(data.status == 1){
                        alert(`${currentVal} dose not return yet ...`);
                    }else{
                        $.get("{{url('isreg')}}/"+currentVal,function (data) {
                            if(data.length){
                                let d = data[0];
                                $(".borrow-user").after(

                                    `<div class="col-12 col-md-8">
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



                                $(".book-1").focus();
                            }else{
                                console.log("hello");
                                if(confirm(`${currentVal} is not register yet.Go register`)){
                                    location.href = '{{route("user_add")}}';
                                }else{
                                    location.reload();
                                }
                            }
                        })

                    }
                });
            }
        });
        $(".book").on("change",function () {
            let rowId = Number($(this).attr("data"));
            let barCode = $(this).val();
            if(barCode.length >= 6){

                $.get("{{url("bookinfo")}}/"+barCode,function (data) {
                    if(data.length){
                        if(data[0]["availability"] != 1){

                            alert("This book already borrowed ...");
                            $(".book").val("");

                        }else{

                            $(".bookName"+rowId).html(data[0].bookname);
                            $(".author"+rowId).html(data[0].author);
                            $(".bookCat"+rowId).html(bookCat[data[0].bookCat]);
                            $(".price"+rowId).html(data[0].price);
                            if(rowId<3){
                                $(".book-"+(rowId+1)).focus();
                            }
                        }
                    }else{

                        alert(`${barCode} is not our book`);
                        $(".book-"+rowId).val("");

                    }
                });
            }
        });

        function del(x) {
            $(".book-"+x).val("");
            $(".bookName"+x).html("");
            $(".author"+x).html("");
            $(".bookCat"+x).html("");
            $(".price"+x).html("");
        }

        function save() {

            let userStatus = 0;
            let bookStatus = 0;
            let borrowLastId = "";

           let barCode = $("#userCode").val();
           if(barCode.length >= 6){

               userStatus = 1;

           }else{
               alert("There is no User Bar Code");
               $("#userCode").focus();
           }


           let book = $(".book");
           book.each(

               function (index) {

                   if($(this).val().length >= 6){
                       console.log($(this).val());
                       bookStatus = 1;


                   }

               }

           );

           console.log(userStatus);
           console.log(bookStatus);

           if(userStatus == 1 && bookStatus ==1){

               console.log("ok ok");

               $.get("{{url('/borrow-store')}}/"+barCode,function (data) {
                   borrowLastId = data.lastId;
                   console.log(data);

                   book.each(
                       function (index) {
                           let bookbarcode = $(this).val();
                           if(bookbarcode.length >= 6){
                               $.get("{{url("borrow-list")}}/"+bookbarcode+"/"+borrowLastId,function (data) {
                                   console.log(data);
                               })
                           }
                       }
                   );

                   location.reload();
               })






           }else{
               console.log("not ok")
           }
        }



    </script>
    @endsection
