@extends('layout.master');

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng kí</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
       
        @if(Session::has('success'))
        <div class="alert alert success">{{ Session::get('success') }} </div>
        @endif
        <form action="{{ route('postsignup') }}" method="POST" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Fullname*</label>
                        <input type="text" id="your_last_name" name="full_name" value="{{ old('full_name') }}" required>
                        @error('full_name')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-block">
                        <label for="adress">Address*</label>
                        <input type="text" id="adress" value="Street Address" name="address" value="{{ old('address') }}" required>
                        @error('address')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-block">
                        <label for="phone">Phone*</label>
                        <input type="text" id="phone" name="phone" value="{{ old('email') }}" required>
                        @error('phone')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="text" id="phone" name="password" value="{{ old('email') }}" required>
                        @error('password')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-block">
                        <label for="phone">Re password*</label>
                        <input type="text" id="phone" name="repassword" required>
                        @error('repassword')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection