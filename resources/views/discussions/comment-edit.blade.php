<x-layout>
    <link rel="stylesheet" href="/css/discussion-show.css">
    <div class="container">

        <a  href="{{ route('discussions.show', $comment->discussion_id) }}"><button class="dis-update">Back</button></a>
    </div>
    <h2 align="center">Edit Comment</h2><br><br><br>
    <div class="card-body">
    <form style="margin-left: 42%;margin-top: -65px; display: flex;flex-wrap: wrap;" action="{{ route('comment.update', $comment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                {{-- <input type="hidden" name="discussion_id" value="{{ $discussion->id }}"> --}}
                {{-- <input  name="comment_body" rows="3" required> --}}
                <input class="comment-in form-control" type="text" name="comment_body" value="{{ $comment->comment_body }}">
            </div>
            <div class="form-group">
                <input type="submit" class="comment-but" style="font-size: 0.8em;" value="Update Comment" />
            </div>
        </form>
       </div>
</x-layout>