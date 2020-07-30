@extends('template.mainTemplate')
@section('title','KAPMI Nasional - Login')
@section('content')
<div class="card mx-auto mb-5 login" >
  <div class="card-body">
        <h1 class="text-center">LOGIN USER</h1>
        <form action="#" class="col-12">
            <div class="form-group mb-3">
                <label for="uname">Username</label>
                <input type="text" class="form-control" id="uname" name="uname">
            </div>
            <div class="form-group mb-3">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="pass" name="pass">
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success">login</button>
            </div>
            <div class="col-12 text-center mt-3">
                <a href="/register">create your account</a> or <a href="#">forgot password</a>?
            </div>
        </form>
  </div>
</div>
@endsection