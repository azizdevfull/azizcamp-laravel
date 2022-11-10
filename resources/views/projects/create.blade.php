<x-layout>
    <x-slot:title>
        Create Project
    </x-slot>
    <link rel="stylesheet" href="/css/projects-edit.css">
    <h2 align="center">Create Project</h2>
    <div style="color: black;" class="login-box">
        <h2 style="color: black;">Create Project</h2>
        <form  action="{{ route('projects.store') }}" method="POST" >
        @csrf
        {{-- @method('PUT') --}}
          <div class="user-box">
            <input style="color: black;" type="text" name="name" required>
            <label style="color: #dc3545;">Project Name</label>
          </div>
          <div class="user-box">
            {{-- <input style="color: black;" type="text" name="description" value="{{ $project->description }}" required> --}}
            <input style="color: black;" name="description" minlength="20" required>
            <label style="color: #dc3545;">Project Description</label>
          </div>
          <input type="submit" value="Create Project" class="button-update">

        </form>
        <a style="float: right;margin-top: -42px;" href="{{ route('projects.index') }}" >Back</a>

      </div>

    {{-- <div class="container">
            @csrf
            <input class="form-control" type="text" name="name" required> <br>
            <textarea name="description"  cols="30" rows="10" minlength="20" required></textarea><br>
            <input class="btn btn-primary" type="submit" value="Create Project">
        </form>
    </div> --}}


</x-layout>
    
    