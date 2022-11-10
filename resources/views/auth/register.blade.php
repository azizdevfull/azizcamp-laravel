<br><br><br>
    <h1 align="center">My Basecamp</h1>
    
    <link rel="stylesheet" href="/css/projects-edit.css">

    
    <div style="color: black;" class="login-box">
        <h2 style="color: black;" >Sign Up</h2>
        
        @if (session('message'))
        <div>

            {{ __('Success') }}
            {{ session('message') }} 
        </div><br>
@endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
          <div class="user-box">
            <input style="color: black;" id="name" type="text" name="name" required autofocus />
            <label style="color: #dc3545;">User Name</label>
          </div>
          <div class="user-box">
            <input style="color:black;" id="email" type="email" name="email" required autofocus />

            <label style="color: #dc3545;">User Email</label>
          </div>
          <div class="user-box">
            <input style="color: black;" id="password" class="block mt-1 w-full"
                                             type="password"
                                             name="password"
                                             autocomplete="new-password" minlength="8" required/>

                                             {{-- <x-text-input id="password" class="block mt-1 w-full"
                                             type="password"
                                             name="password"
                                             required autocomplete="new-password" minlength="8" required/> --}}
            <label style="color: #dc3545;">Password</label>
          </div>
          <div class="user-box">
            <input style="color: black;" id="password_confirmation"
                                             type="password"
                                             name="password_confirmation"
                                             min="8" required />
            <label style="color: #dc3545;">Confirm Password</label>

          </div>
          <input type="submit" value="Sign Up" class="button-update">
        </form>
        <a style="float: right;margin-top: -42px;" href="/login" >Log In</a>

      </div>


       

            {{-- <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form> --}}
