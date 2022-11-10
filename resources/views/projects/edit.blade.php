<x-layout>
    <link rel="stylesheet" href="/css/projects-edit.css">
    <div style="color: black;" class="login-box">
        <h2 style="color: black;">Edit Project</h2>
        <form action="{{ route('projects.update',$project->id) }}" method="POST">
        @csrf
        @method('PUT')
          <div class="user-box">
            <input style="color: black;" type="text" name="name" value="{{ $project->name }}" required>
            <label style="color: #dc3545;">Project Name</label>
          </div>
          <div class="user-box">
            <input style="color: black;" type="text" name="description" value="{{ $project->description }}" required>
            <label style="color: #dc3545;">Project Description</label>
          </div>
          <input type="submit" value="Update Project" class="button-update">

        </form>
      </div>
</x-layout>