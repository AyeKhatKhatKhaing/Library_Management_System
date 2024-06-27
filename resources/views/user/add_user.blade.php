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
                                <div class="col-12 col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Add New User Card</h5>
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
                                            <form method="post" id="form" action="{{route('card')}}">
                                                @csrf
                                                <input type="hidden" value="" name="id">
                                                <div class="form-group">
                                                    <label for="barcodeId" class="text-uppercase">Bar Code Id :</label>
                                                    <input type="text" class="form-control" name="barcodeId" id="barcodeId" autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="text-uppercase">User Name :</label>
                                                    <input type="text" class="form-control" name="username" id="userName">
                                                </div>
                                                <div class="form-group">
                                                    <label for="rollno" class="text-uppercase">Roll Number :</label>
                                                    <input type="text" class="form-control" name="rollno">
                                                </div>
                                                <div class="form-group">
                                                    <label for="major" class="text-uppercase">Major :</label>
                                                    <select name="major" class="form-control">
                                                        <option value="selected" disabled selected>Select Major</option>
                                                        @foreach($major as $key=>$maj)
                                                            <option value="{{$key}}">{{$maj}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nrc" class="text-uppercase">NRC :</label>
                                                    <input type="text" class="form-control" name="nrc">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phoneno" class="text-uppercase">Phone Number :</label>
                                                    <input type="phone" class="form-control" name="phoneno">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address" class="text-uppercase">Address :</label>
                                                    <textarea name="address" rows="5" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" name="reg" id="reg" class="btn btn-primary w-100" value="add">
                                                        <i class="feather icon-user-plus"></i>Register</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-8">

                                    <div class="row">
                                        @if(count($cards))
                                        <div class="col-12 col-md-6">

                                                <div class="card theme-bg bitcoin-wallet">
                                                    <div class="card-block">
                                                        <h5 class="text-white mb-2">Total User</h5>
                                                        <h2 class="text-white mb-2 f-w-300">{{$userTotal}}</h2>
                                                        <span class="text-white d-block">Total User at {{date("d / m / Y")}}</span>
                                                        <i class="feather icon-users f-70 text-white"></i>
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="col-12 col-md-6">

                                            <div class="card bg-c-blue bitcoin-wallet">
                                                <div class="card-block">
                                                    <h5 class="text-white mb-2">Last User</h5>
                                                    <h2 class="text-white mb-2 f-w-300">{{$cards[0]["barcodeId"]}}</h2>
                                                    <span class="text-white d-block">{{$cards[0]["username"]}} from <b>{{$major[$cards[0]["major"]]}}</b></span>
                                                    <i class="feather icon-user f-70 text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                        @endif

                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Last 10 Users</h5>
                                        </div>
                                        <div class="card-content">
                                            <table class="table table-striped table-responsive-sm mb-0">
                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>User Bar Code</th>
                                                    <th>User Name</th>
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
        $("#barcodeId").on("change",function () {
           let x = $(this).val();
           console.log(x);
           if(x.length>6){
               $("#userName").focus();
           }
        });
    </script>
@endsection
