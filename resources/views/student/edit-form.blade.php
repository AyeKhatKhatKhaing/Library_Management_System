@extends('layout.master')
@section('title', "UserInfo")
@section('content')
    <div class="container ">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="col-5 mt-5">
                <div class="form-test m-5 border border-faded p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group-item">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form c1ass="p-4" method="post" action="{{route('s.update')}}">

                        <h4 class="text-primary text-uppercase text-center">Registration Updated</h4>
                        <hr>
                        @csrf
                            <input type="hidden" value="{{$result->id}}" name="id">
                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input type="text" class="form-control" name="name" value="{{$result->name}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number :</label>
                            <input type="text" class="form-control" name="phone" value="{{$result->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="">Select Gender</label><br>
                            <label class="border border-faded p-2 bg-white rounded">
                                <input type="radio" name="gender" value="1" {{$result->gender?"checked":""}}> Male
                            </label>
                            <label class="border border-faded p-2 bg-white rounded">
                                <input type="radio" name="gender" value="0" {{$result->gender?"":"checked"}}> Female
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="form-test" class="btn btn-primary w-100">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
