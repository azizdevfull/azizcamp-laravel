<x-layout>
    <link rel="stylesheet" href="/css/projects-edit.css">
    <h2 align="center">Edit Discussion</h2>
    <div style="color: black;" class="login-box">
        <h2 style="color: black;">Edit Discussion</h2>
        <form action="{{ route('discussions.update',$discussion->id) }}" method="POST">
        @csrf
        @method('PUT')
          <div class="user-box">
            {{-- <input  type="text" name="name" value="{{ $project->name }}" required> --}}
            <input style="color: black;" type="text" name="title" value="{{ $discussion->title }}" required>
            <label style="color: #dc3545;">Discussion Title</label>
          </div>
          <div class="user-box">
            <input style="color: black;" type="text" name="description" value="{{ $discussion->description }}" required>
            {{-- <input  type="text" name="description" value="{{ $project->description }}" required> --}}
            <label style="color: #dc3545;">Discussion Description</label>
          </div>
          <input type="submit" value="Update Discussion" class="button-update">

        </form>
        <a style="float: right;margin-top: -42px;" href="{{ route('discussions.show', $discussion->id) }}" >Back</a>

      </div>
    
    {{-- <form action="{{ route('discussions.update',$discussion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $discussion->title }}" required>
        <input type="text" name="description" value="{{ $discussion->description }}" required>
        <input type="submit" value="Update Discussion">
    </form> --}}
</x-layout>