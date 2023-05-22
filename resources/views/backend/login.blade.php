@extends('backend.v_layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <img src="backend/img/logo-login.png" />
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-11">
                    <div class="card card-body bg-light">
                        <form id="login-form" action="{{ route('login') }}" method="post">
                            @csrf
                            <h2 class="login-title text-success font-strong font-weight-bold">Serba Sambal</h2>
                            <div class="form-group">
                                <div class="input-group-icon right">
                                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                                    <input class="form-control" type="email" placeholder="Masukkan Email" name="email"
                                        value="{{ old('email') }}" class="frm-inp @error('email') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group-icon right">
                                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                                    <input class="form-control" type="password" name="password" placeholder="Password"
                                        class="frm-inp @error('email') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-block" type="submit">Login</button>
                            </div>
                        </form>
                        <div class="text-center">
                            <a href="register" class="text-success">Register New Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection