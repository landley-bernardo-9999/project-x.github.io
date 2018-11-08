@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Verify Your Email Address') }}</div> --}}
                <div class="card-header">{{ __('Account verification.') }}</div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Another request has been sent.') }}
                            {{-- {{ __('A fresh verification link has been sent to your email address.') }} --}}
                        </div>
                    @endif
                    {{ __('Our system will review your information.') }}
                    {{ __('Please reload this page within 60 seconds.  If you still do not have access') }}, <a href="{{ route('verification.resend') }}">{{ __('please click this link') }}</a>.
                    {{-- {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>. --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center"> 
    <img src="/storage/img/copper-loader.gif" alt="loading-image" style="height: 250px">
</div>

<div class="container-fluid text-center">
    <!-- Footer -->
    <footer class="page-footer font-small blue">   
        <!-- Copyright -->
        <hr>
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
          <a href="http://www.marthaservices.com/" target="new_blank">Martha's Official Website</a>
        </div>
        <!-- Copyright -->
      
      </footer>
      <!-- Footer -->
</div>
@endsection
