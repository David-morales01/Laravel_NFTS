
@extends('layout.main')

<div class="header__container__2">
    <span class="title">Login</span>
    <nav class="menu">
        <ul>
            <li><a href="#">Home</a></li>/
            <li><a href="#">Pages</a></li>/
            <li><a href="#">Signup</a></li>
        </ul>
    </nav>
</div> 

@section('main')
<div class="main_container">
    <div class="login">
        <span class="title">
            Sigup to NFTs
        </span>
        <div class="divide">
            <span>Login with social</span>
        </div> 
        <div class="login__buttons">
            <button>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_519_736)">
                    <path d="M3.54991 6.03331L0.824781 4.45996C0.298219 5.52406 3.125e-05 6.72412 0 8C0 9.25822 0.301406 10.4603 0.836062 11.5339L3.54972 9.96716C3.28206 9.36447 3.13041 8.69972 3.13044 8C3.13047 7.30031 3.28222 6.63578 3.54991 6.03331Z"   />
                    <path d="M13.2476 1.9615C11.8417 0.738564 10.0045 -0.00134192 7.99441 1.82717e-06C5.24437 0.00184558 2.78981 1.40578 1.34766 3.557L4.075 5.13169C4.96191 3.92188 6.38875 3.13041 8.00003 3.13044C9.17462 3.13047 10.2513 3.55035 11.0923 4.2461C11.2982 4.41638 11.5992 4.40078 11.7881 4.21188L13.2734 2.72653C13.4876 2.51235 13.4761 2.16025 13.2476 1.9615Z"   />
                    <path d="M15.945 7.07405C15.9139 6.80921 15.6912 6.60874 15.4246 6.60874L8.86941 6.6084C8.58128 6.6084 8.34766 6.84199 8.34766 7.13015V9.21537C8.34766 9.50349 8.58125 9.73712 8.86941 9.73712H12.5428C12.2044 10.6177 11.6167 11.3747 10.8686 11.925L12.4288 14.6275C13.9993 13.5632 15.1934 11.9541 15.7193 10.0546C16.0053 9.02184 16.0567 8.02315 15.945 7.07405Z"   />
                    <path d="M9.96599 12.4498C9.36427 12.7178 8.70003 12.8699 7.99952 12.87C6.38643 12.87 4.9604 12.0785 4.07412 10.8691L1.3584 12.4371C2.78846 14.5671 5.21552 16.0004 7.99946 16.0004C9.25796 16.0004 10.4558 15.6927 11.5272 15.154L9.96599 12.4498Z"   />
                    </g>
                    <defs>
                    <clipPath id="clip0_519_736">
                    <rect width="16" height="16"   />
                    </clipPath>
                    </defs>
                </svg>
                <span>Google</span>
            </button>
            <button>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 8.04815C0.0009308 12.0079 2.86262 15.3794 6.74937 16V10.3744H4.71984V8.04815H6.75177V6.27731C6.66093 5.43821 6.94578 4.60193 7.52905 3.99529C8.11232 3.38865 8.93357 3.07452 9.77006 3.1381C10.3705 3.14786 10.9694 3.20166 11.562 3.29909V5.2784H10.5508C10.2027 5.23252 9.85274 5.3482 9.59948 5.59286C9.34622 5.83751 9.2171 6.18465 9.24848 6.5365V8.04815H11.4652L11.1108 10.3752H9.24848V16C13.4519 15.3316 16.3995 11.4689 15.9559 7.21028C15.5122 2.95166 11.8326 -0.212053 7.5828 0.0111118C3.33297 0.234277 0.000675558 3.76619 0 8.04815Z"   />
                </svg>
                <span>Facebook</span>  
            </button>
        </div>
        <div class="divide">
            <span>Or login with email</span>
        </div> 
        <form method="POST" action="{{ route('register') }}" class="form form_auth">
            @csrf
        
            <input id="name"  type="text" name="name" :value="old('name')" placeholder="Your Full Name" required   />
    
            <input id="email"  type="email" name="email" :value="old('email')" placeholder="Your Email Address" required />

            <input id="password"  type="password" name="password" placeholder="Set Your Password" required  />
       
            <input id="password_confirmation"  type="password" name="password_confirmation" placeholder="Confirm your password" required />
        
            <div class="options">
                <label>
                    <input id="remember_me" type="checkbox" class="checkbox" name="remember">Remember me
                </label>       
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
                <a href="{{ route('login') }}">
                   Already registered?
                </a>
            </div>
           
            

    
            <button class="button" type="submit"> Login </button> 
    
        </form>
    </div>

</div>

@endsection()

  