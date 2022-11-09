<x-layout>
    <h1>Edit Task</h1>

    <form action="{{ route("projects.tasks.update", [$project_id, $task->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" value="{{ $task->body }}" name="body">
    
    
        <button type="submit" class="btn btn-info">Upadte Task</button>
        </form>
</x-layout>