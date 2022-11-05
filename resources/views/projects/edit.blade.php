<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Project</title>
</head>
<body>

    <form action="{{ route('projects.update',$project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $project->name }}" required>
        <input type="text" name="description" value="{{ $project->description }}" required>
        <input type="submit" value="Update Project">
    </form>
    
</body>
</html>