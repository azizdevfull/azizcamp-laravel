<x-layout> <br> <br>
    <form action="{{ route('discussions.update',$discussion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $discussion->title }}" required>
        <input type="text" name="description" value="{{ $discussion->description }}" required>
        <input type="submit" value="Update Discussion">
    </form>
</x-layout>