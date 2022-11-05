<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Show | {{ $project->name }}</title>
</head>
<body>
    
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
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>

</body>
</html>