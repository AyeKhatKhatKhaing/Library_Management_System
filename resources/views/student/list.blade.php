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
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Reg Date</th>
                        <th>Controls</th>
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
                            <td>{{$out->name}}</td>
                            <td>{{$out->phone}}</td>
                            <td>{{$out->gender?"Male":"Female"}}</td>
                            <td>{{$out->created_at->format("d / m / Y")}}</td>
                            <td><a href="{{route('s.details', $out->id)}}" class="btn btn-info text-white btn-sm">Details</a>
                                <a href="{{route('s.delete', $out->id)}}" class="btn btn-danger text-whiter btn-sm">Delete</a>
                                <a href="{{route('s.edit', $out->id)}}" class="btn btn-primary text-white btn-sm">Edit</a>
                            </td>
                        </tr>
                        @endforeach()
                    </tbody>
                </table>
                {{$output->links()}}
            </div>
        </div>
    </div>
    @endsection