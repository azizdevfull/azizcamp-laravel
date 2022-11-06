<x-layout>
    <label for="">Project Name</label>
    <p>{{ $project->name }}</p> <br>
    <label for="">Project Description</label>
    <p>{{ $project->description }}</p>

    <br>
    <h1>Author : <strong>{{ $project->user->name }}</strong></h1>

    <a href="/projects/{{ $project->id }}/edit">Edit Project</a>

    <form action="{{ route('projects.destroy',$project->id) }}" method="Post">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are You Sure!')" class="btn btn-danger">Delete</button>
    </form>

</x-layout>