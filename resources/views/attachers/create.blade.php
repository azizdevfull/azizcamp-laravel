<x-layout>
    <link rel="stylesheet" href="/css/discussion-show.css">
    <h1 align="center">Create Attachment</h1><br><br><br>

    {{-- <form action="{{ route('projects.attachers.store') }}" method="POST"> --}}
        <a style="float: left;" href="{{ route("projects.attachers.index", $project->id) }}"><button class="dis-delete">Back</button></a>

        {{-- <h2 align="center">Create Attachment</h2> --}}
        <div class="card-body">
            <form style="margin-left: 42%;margin-top: -65px; display: flex;flex-wrap: wrap;" action="{{ route("projects.attachers.store", $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    {{-- <input type="hidden" name="discussion_id" value="{{ $discussion->id }}"> --}}
                    {{-- <input  name="comment_body" rows="3" required> --}}
                    <input class="comment-in form-control" type="text" name="name" required>
                    <input type="file" name="file" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="comment-but" style="font-size: 0.8em;" value="Create Attachment" />
                </div>
            </form>
           </div>
  
</x-layout>