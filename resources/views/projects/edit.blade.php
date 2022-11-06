<x-layout>
    <form action="{{ route('projects.update',$project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $project->name }}" required>
        <input type="text" name="description" value="{{ $project->description }}" required>
        <input type="submit" value="Update Project">
    </form>
</x-layout>