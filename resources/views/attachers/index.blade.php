<x-layout>
    <h1>Attachers</h1>
<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">File</th>
                <th scope="col">Project Name</th>
                <th scope="col">Author</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attachers as $attacher)
            
            <tr>
                <td>{{ $attacher->name }}</td>
                <td>{{ $attacher->file }}</td>
                <td>{{ $attacher->project->name  }}</td>
                <td>{{ $attacher->project->user->name  }}</td>
                
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>


    <a href="/projects/{{ $project->id }}/attachers/create">New Attachment</a>
</x-layout>