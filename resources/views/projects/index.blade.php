<x-layout>
    <h1>Projects</h1>

    @foreach ($projects as $project)
    
    <h1>{{ $project->name }}</h1> <br>


    <h3>{{ $project->description }}</h3>

    <a href="{{ url('projects', $project->id) }}">Show This Project</a>

    @endforeach

    <br>
     <a href="{{ url('projects/create') }}">New Project</a> 

</x-layout>