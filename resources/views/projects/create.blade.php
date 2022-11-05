<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Create</title>
</head>
<body>
    
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <input type="text" name="name" required>
        <input type="text" name="description" required>
        <input type="submit" value="Create Project">
    </form>

</body>
</html>