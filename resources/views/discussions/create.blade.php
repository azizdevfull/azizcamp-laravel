<x-layout>
    <h1 align="center">Create Discussion</h1>


    <form action="{{ route("projects.discussions.store", $project->id) }}" method="POST">
        @csrf
        <input type="text" name="title"><br>
        <textarea name="description" cols="30" rows="10"></textarea> <br />
    
    
        <button type="submit" class="btn btn-info">Create Discussion</button>
        </form>
</x-layout>