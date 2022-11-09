<x-layout>
    <h1 align="center">Tasks</h1>
  
    <form action="{{ route("projects.tasks.store", $project->id) }}" method="POST" >
        @csrf
        <input type="text" name="body"><br>
    
        <button type="submit" class="btn btn-info">Create Task</button>
        
    </form>


    @foreach ($tasks as $task)
    
    <h1>{{ $task->body }}</h1>
<a class="btn btn-success" href="{{ route('projects.tasks.edit', [$task->project_id, $task->id]) }}">Edit</a>
    @endforeach

    

</x-layout>