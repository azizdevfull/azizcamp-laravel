<x-layout>
    <h1 align="center" class="mt-5">Show Discussion</h1>


    <table border="1px" align="center" width="1000px">
        <thead >
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $discussion->title }}</td>
                    <td>{{ $discussion->description }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('discussions.edit', $discussion->id) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('discussions.destroy',$discussion->id) }}" method="Post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are You Sure!')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                
        </tbody>                

    </table>

    <br>



</x-layout>