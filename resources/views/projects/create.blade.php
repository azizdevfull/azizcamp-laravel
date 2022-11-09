<x-layout>
    <x-slot:title>
        Create Project
    </x-slot>
    <div class="container">

        <form align="center" action="{{ route('projects.store') }}" method="POST" class="mt-5" style="width: 120px; justify-content: center;">
            @csrf
            <input class="form-control" type="text" name="name" required> <br>
            <textarea name="description"  cols="30" rows="10" minlength="20" required></textarea><br>
            <input class="btn btn-primary" type="submit" value="Create Project">
        </form>
    </div>


</x-layout>
    
    