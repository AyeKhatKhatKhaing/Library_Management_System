@extends("layout.master")
@section("title","Login To App")

@section("content")

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-uppercase text-primary">Login User</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route("login")}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="text-uppercase text-dark">User Name</label>
                                <input type="email" value="{{old('email')}}" name="email" class="form-control" required>

                            </div>
                            <div class="form-group">
                                <label class="text-uppercase text-dark">Password</label>
                                <input type="password" value="{{old('password')}}" name="password" class="form-control" required>

                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary m-0 mt-3"> <i class="feather icon-log-in"></i>Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
