<x-layout>
    <h1>Edit Comment</h1>
    <form action="{{ route('comment.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="comment_body" value="{{ $comment->comment_body }}">
        <input type="submit" value="Update Comment" class="btn btn-primary">
    </form>
</x-layout>