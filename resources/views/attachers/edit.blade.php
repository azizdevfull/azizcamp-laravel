<x-layout>
    <link rel="stylesheet" href="/css/discussion-show.css">

    <h1 align="center">Edit Attachment</h1> <br><br><br>
    <a style="float: left;" href="{{ route("projects.attachers.index", $attacher->project_id,$attacher->id) }}"><button class="dis-delete">Back</button></a>

    <div class="card-body">
        <form style="margin-left: 42%;margin-top: -65px; display: flex;flex-wrap: wrap;" action="{{ route("projects.attachers.update", [$project_id, $attacher->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                {{-- <input type="hidden" name="discussion_id" value="{{ $discussion->id }}"> --}}
                {{-- <input  name="comment_body" rows="3" required> --}}
                <input class="comment-in form-control" type="text" value="{{ $attacher->name }}"  name="name" required>
                <input type="file" name="file" required>
            </div>
            <div class="form-group">
                <input type="submit" class="comment-but" style="font-size: 0.8em;" value="Update Attachment" />
            </div>
        </form>
       </div>

    
</x-layout>