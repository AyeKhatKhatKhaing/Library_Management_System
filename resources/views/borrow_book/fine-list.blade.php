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
                                            <a href="#">Fine List</a>
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
                                                    <th>Date</th>
                                                    <th>User Bar Code</th>
                                                    <th>Book Bar Code</th>
                                                    <th>Execeded Day</th>
                                                    <th>Fine Amount</th>
                                                    <th>Cost</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($all as $l)
                                                    <tr>
                                                        <td>{{$l->created_at->format("Y-m-d")}}</td>
                                                        <td>{{$l->user}}</td>
                                                        <td>{{$l->bookId}}</td>
                                                        <td>{{$l->eDay}}</td>
                                                        <td>{{$l->fineAmount}}</td>
                                                        <td>{{$l->eDay * $l->fineAmount}}</td>

                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="text-center font-weight-bold" colspan="5">
                                                        Total Fine
                                                    </td>
                                                    <td class=" font-weight-bold total">

                                                    </td>
                                                </tr>
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
        let fineData = @json($all);
        let arr = [];
        for(x in fineData){
           let userFine = fineData[x].fineAmount * fineData[x].eDay;
           arr.push(userFine);
        }
        let str = arr.join("+");
        let total = eval(str);
        $(".total").html(total);
    </script>

@endsection
