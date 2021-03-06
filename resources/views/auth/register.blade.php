@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Company Email-Address:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="example@marthservices.com">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password:') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobileNumber" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number:') }}</label>

                            <div class="col-md-6">
                                <input id="mobileNumber" type="text" class="form-control{{ $errors->has('mobileNumber') ? ' is-invalid' : '' }}" name="mobileNumber" value="{{ old('mobileNumber') }}" required autofocus>

                                @if ($errors->has('mobileNumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobileNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right" >User Type:</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="type" id="type">
                                        <option value=""disabled selected>Select one</option> 
                                        <option value="leasingOfficer">Leasing Officer</option>   
                                        <option value="finance">Finance</option>
                                        <option value="adminAssistant">Admin Assistant</option>
                                        <option value="maintenance">Maintenance</option>
                                        <option value="executive">Executive</option>
                                        <option value="developer" disabled>Developer</option>
                                    </select>
                                </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right" >Department :</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="department" id="department">
                                        <option value=" " disabled selected>Select one</option> 
                                        <option value="Leasing">Leasing Management</option>    
                                        <option value="Property Management">Property Management</option>
                                    </select>
                                </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid text-center" >
    <!-- Footer -->
    <footer class="page-footer font-small blue" style="padding-top:10%">   
        <!-- Copyright -->
        <hr>
        <div class="footer-copyright text-center py-3">Copyright © 2018 
          {{-- <a href="http://www.marthaservices.com/" target="new_blank">Martha's Official Website</a> --}}
        </div>
        <!-- Copyright -->
      
      </footer>
      <!-- Footer -->
</div>
@endsection
