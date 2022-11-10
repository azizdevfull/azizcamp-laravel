<x-layout>
    <h2 align="center">Create Discussion</h2>

    <link rel="stylesheet" href="/css/projects-edit.css">
    <div style="color: black;" class="login-box">
        <h2 style="color: black;">Create Discussion</h2>
        <form  action="{{ route('projects.discussions.store', $project->id) }}" method="POST" >
        @csrf
        {{-- @method('PUT') --}}
          <div class="user-box">
            <input style="color: black;" type="text" name="title" required>
            <label style="color: #dc3545;">Discussion Title</label>
          </div>
          <div class="user-box">
            {{-- <input style="color: black;" type="text" name="description" value="{{ $project->description }}" required> --}}
            <input style="color: black;" name="description" minlength="20" required>
            <label style="color: #dc3545;">Discussion Description</label>
          </div>
          <input type="submit" value="Create Project" class="button-update">

        </form>
        <a style="float: right;margin-top: -42px;" href="{{ route('projects.discussions.index', $project->id) }}" >Back</a>

      </div>
{{-- 
    <form action="{{ route("projects.discussions.store", $project->id) }}" method="POST">
        @csrf
        <input type="text" name="title"><br>
        <textarea name="description" cols="30" rows="10"></textarea> <br />
    
    
        <button type="submit" class="btn btn-info">Create Discussion</button>
        </form> --}}
</x-layout>