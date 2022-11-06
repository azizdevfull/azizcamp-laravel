<x-layout>
    <h1 align="center" class="mt-5">Attachers</h1>
<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">File</th>
                <th scope="col">Project Name</th>
                <th scope="col">Author</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>

                
            </tr>
        </thead>
        <tbody>
            @foreach ($attachers as $attacher)
            
            <tr>
                <td>{{ $attacher->name }}</td>
                <td><img src="/attachment/{{ $attacher->file }}" width="100px"></td>
                <td>{{ $attacher->project->name  }}</td>
                <td>{{ $attacher->project->user->name  }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('projects.attachers.show', [$attacher->project_id, $attacher->id]) }}">Show</a>
                </td>
                <td>
                    <a class="btn btn-success" href="{{ route('projects.attachers.edit', [$attacher->project_id, $attacher->id]) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('projects.attachers.destroy', [$attacher->project_id, $attacher->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>


    <a style="float: right;" href="{{ route("projects.attachers.create", $project->id) }}">Add Attachment</a>
</x-layout>