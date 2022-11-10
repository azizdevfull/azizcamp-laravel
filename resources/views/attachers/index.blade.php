<x-layout>
    <link rel="stylesheet" href="/css/discussion-show.css">
    <h2 align="center" class="mt-5">Attachments</h2>
    <a  style="float: right;" href="{{ route("projects.attachers.create", $project->id) }}"><button class="dis-delete">Add Attachment</button></a>
    <a  style="float: left;" href="{{ route("projects.show", $project->id) }}"><button class="dis-delete">Back</button></a>

<div class="container">
@if (count($attachers) > 0)
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Download</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>

                
            </tr>
        </thead>
        <tbody>
            @foreach ($attachers as $attacher)
            
            <tr>
                <td>{{ $attacher->name }}</td>
                <td><a  href="/attachment/{{ $attacher->file }}" width="100px" target="_blank" download>
               <button class="dis-update"> Download</button>
                </a>
                </td>
                <td>
                    <a href="{{ route('projects.attachers.edit', [$attacher->project_id, $attacher->id]) }}"> <button class="dis-update">Edit</button></a>
                </td>
                <td>
                    <form action="{{ route('projects.attachers.destroy', [$attacher->project_id, $attacher->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" onclick="return confirm('Are You Sure!')" class="dis-delete" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
    @endif
</div>


</x-layout>