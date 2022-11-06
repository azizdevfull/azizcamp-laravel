<x-layout>
    <h1 align="center">Create Attachment</h1>

    {{-- <form action="{{ route('projects.attachers.store') }}" method="POST"> --}}
        <form action="{{ route("projects.attachers.store", $project->id) }}" method="POST">
    @csrf
    <input type="text" name="name">
    <input type="text" name="file">


    <button type="submit" class="btn btn-info">Create Attachment</button>
    </form>
</x-layout>