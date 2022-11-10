{{-- <x-guest-layout> --}}
    <br><br><br>
        <h1 align="center" class="mt-5">My Basecamp</h1>
  
    <link rel="stylesheet" href="/css/projects-edit.css">

    
    <div style="color: black;" class="login-box">
        <h2 style="color: black;" >Log In</h2>
        
        @if (session('message'))
        <div>

            {{ __('Success') }}
            {{ session('message') }} 
        </div><br>
@endif
<form method="POST" action="{{ route('login') }}">
    @csrf
          <div class="user-box">
            <input style="color:black;" id="email" type="email" name="email" required autofocus />
            <label style="color: #dc3545;">User Email</label>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
          <div class="user-box">
            <input style="color: black;" id="password" class="block mt-1 w-full"
                                             type="password"
                                             name="password"
                                             autocomplete="current-password" minlength="8" required/>

            <label style="color: #dc3545;">Password</label>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
          <input type="submit" value="Login" class="button-update">
        </form>
        <a style="float: right;margin-top: -42px;" href="/register" >Sign Up</a>

      </div>

        <!-- Session Status -->
        {{-- <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
