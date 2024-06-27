@extends('layout.master');
@section('content')
@section('style')
    <style>
        td {
            vertical-align: middle !important;
        }
    </style>
@endsection
<div class="container">
    <div class="row">
        <div class="col-12 pt-5">
            <table class="table table-striped">
                <h2 class="text-center text-primary">All Students List</h2>
                <thead>
                <tr>
                    <th>No</th>
                    <th>Bar Code Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Major</th>
                    <th>Reg Date</th>
                </tr>
                </thead>
                <tbody>
                @php
                    if(isset($_GET['page'])) {
                $page = $_GET['page'];
                }else {
                    $page = 1;
                }
                @endphp
                @foreach($output as $key=>$out)
                    <tr>
                        <td>{{(($page-1)*5)+$key+1}}</td>
                        <td>{{$out->barcodeid}}</td>
                        <td>{{$out->name}}</td>
                        <td>{{$out->email}}</td>
                        <td>{{$out->phone}}</td>
                        <td>{{$out->major}}</td>
                        <td>{{$out->created_at->format("d / m / Y")}}</td>
                    </tr>
                @endforeach()
                </tbody>
            </table>
            {{$output->links()}}
        </div>
    </div>
</div>
@endsection