<x-layout>
    <link rel="stylesheet" href="/css/projects-edit.css">

    <h1 align="center">Edit Task</h1>

    <div style="color: black;" class="login-box">
        <h2 style="color: black;">Edit Task</h2>
        <form action="{{ route("projects.tasks.update", [$project_id, $task->id]) }}" method="POST">
        @csrf
        @method('PUT')
          <div class="user-box">
            {{-- <input  type="text" name="name" value="{{ $project->name }}" required> --}}
            <input style="color: black;" type="text"value="{{ $task->body }}" name="body" required>
            <label style="color: #dc3545;">Task Body</label>
          </div>
          <input type="submit" value="Upadte Task" class="button-update">

        </form>
        <a style="float: right;margin-top: -42px;" href="{{ route('projects.tasks.index', $project_id) }}" >Back</a>

      </div>

</x-layout>