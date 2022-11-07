<x-layout>
    <h1>All Discussions</h1>


    <table border="1px">
        <thead border="1px">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Show</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($discussions as $discussion)
                <tr>
                    <td>{{ $discussion->title }}</td>
                    <td>{{ $discussion->description }}</td>
                    <td><a class="btn btn-info" href="{{ route('discussions.show', $discussion->id) }}">Show</a></td>
                </tr>
                @endforeach
                
        </tbody>                

    </table>

    <br>

    <a href="{{ route('projects.discussions.create', $project->id) }}">New Discussion</a>


</x-layout>