<x-layout>
    <link rel="stylesheet" href="/css/discussion-show.css">
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

    {{-- <form action="{{ route('comment.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="comment_body" value="{{ $comment->comment_body }}">
        <input type="submit" value="Update Comment" class="btn btn-primary">
    </form> --}}
</x-layout>