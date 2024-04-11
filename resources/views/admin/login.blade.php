@extends('layout.master');

@section('content')
<div class="container">
    <div id="content">
        @if (count($errors)>0)
        <div class="alert alert danger">
            @foreach($errors->all() as $err)
            {{ $err }}
            @endforeach
        </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert success">{{ Session::get('success') }} </div>
        @endif
        <form action="{{ route('admin.postLogin') }}" method="post" class="beta-form-checkout">
            @csrf

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" id="email" name='email' value="{{ old('email') }}" required>
                        @error('email')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="text" id="password" name='password' value="{{ old('password') }}" required>
                        @error('phone')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->

@endsection