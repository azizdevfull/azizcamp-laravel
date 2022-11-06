<x-layout>
    <h1>Edit Attachment</h1>

    <form action="{{ route("projects.attachers.update", [$project_id, $attacher->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" value="{{ $attacher->name }}" name="name">
        <input type="file" name="file">
        {{-- <input type="text" value="{{ $attacher->file }}" name="file"> --}}
    
    
        <button type="submit" class="btn btn-info">Upadte Attachment</button>
        </form>
</x-layout>