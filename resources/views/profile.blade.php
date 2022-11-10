<x-layout>
    <link rel="stylesheet" href="/css/projects-edit.css">



    <div style="color: black;" class="login-box">
        
        <h2 style="color: black;">Edit My Profile</h2>
        @if (session('message'))
        <div>

            {{ __('Success') }}
            {{ session('message') }} 
        </div><br>
@endif
        <form method="POST" action="{{ route('profile.update') }}">
            @method('PUT')
            @csrf
        {{-- @method('PUT') --}}
          <div class="user-box">
            <input style="color: black;" id="name" type="text" name="name" value="{{ auth()->user()->name }}" required autofocus />
            <label style="color: #dc3545;">User Name</label>
          </div>
          <div class="user-box">
            <input style="color:black;" id="email" type="email" name="email" value="{{ auth()->user()->email }}" required autofocus />

            <label style="color: #dc3545;">User Email</label>
          </div>
          <div class="user-box">
            {{-- <input style="color: black;" type="text" name="description" value="{{ $project->description }}" required> --}}
            {{-- <input style="color: black;" name="description" minlength="20" required> --}}
            <input style="color: black;" id="new_password" class="block mt-1 w-full"
                                             type="password"
                                             name="password"
                                             autocomplete="new-password" minlength="8" />
            <label style="color: #dc3545;">New Password</label>
          </div>
          <div class="user-box">
            {{-- <input style="color: black;" type="text" name="description" value="{{ $project->description }}" required> --}}
            {{-- <input style="color: black;" name="description" minlength="20" required> --}}
            {{-- <input style="color: black;" id="new_password" 
                                             type="password"
                                             name="password"
                                             autocomplete="new-password" minlength="20" required/> --}}
            <input style="color: black;" id="confirm_password"
                                             type="password"
                                             name="password_confirmation"
                                             autocomplete="confirm-password" minlength="8" />
            <label style="color: #dc3545;">Confirm Password</label>
          </div>
          <input type="submit" value="Update My Profile" class="button-update">
          {{-- <x-button class=">
            {{ __('Update') }}
        </x-button> --}}

        </form>
        <a style="float: right;margin-top: -42px;" href="/" >Back</a>

      </div>


    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- <x-validation-errors /> --}}
                    
                    
                        
                        {{-- <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="name" :value="__('Name')" />
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ auth()->user()->email }}" required autofocus />
                                </div>
                            </div>
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="new_password" :value="__('New password')" />
                                    <x-input id="new_password" class="block mt-1 w-full"
                                             type="password"
                                             name="password"
                                             autocomplete="new-password" required/>
                                             <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label for="confirm_password" :value="__('Confirm password')" />
                                    <x-input id="confirm_password" class="block mt-1 w-full"
                                             type="password"
                                             name="password_confirmation"
                                             autocomplete="confirm-password" required />
                                             <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    {{-- </div> --}} 
</x-layout>