@extends('layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
       <div class="card border-0">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-6 p-0">
             
                   
                    <img src="register.png"class="w-100 rounded-4 shadow-4" data-aos="zoom-in"  data-aos-duration="500" style="background-color: rgb(158,14,14);">
                
                
            </div>
            <div class="col-md-6 p-0">
                <div class=" d-flex justify-content-center align-items-cente p-2 mb-2">
             
                    <span class="fw-normal" style="font-size: 20px"> Register</span>
                   
                </div>
                <div class="card border-0 ">
               
                    <div class="card-body p-0 m-0">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row d-flex mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="row m-1">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-dark">
                                        {{ __('Register') }}
                                    </button>
                               
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-6 offset-md-4">
                                   
                                    <a class="btn btn-link " href="{{ route('login') }}">
                                        Already have a count!
                                    </a>
                               
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
       </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
@endsection
