<x-layout>
    <h1 align="center">Create Attachment</h1>

    {{-- <form action="{{ route('projects.attachers.store') }}" method="POST"> --}}
        <form action="{{ route("projects.attachers.store", $project->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name"><br>
    <input type="file" name="file"> <br> <br>


    <button type="submit" class="btn btn-info">Create Attachment</button>
    </form>
</x-layout>