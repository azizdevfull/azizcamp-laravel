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
<br>
<br>

    
        <div class="card-body">
            <h5>Leave a comment</h5>
            <form  action="{{ url('comments') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                    <textarea name="comment_body" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Add Comment" />
                </div>
            </form>
           </div>


           @forelse ($discussion->comments as $comment)
           <div class="comment-container">

               <label for="">@if ($comment->user)
                {{ $comment->user->name }}
                @endif</label>
                <h3>{{ $comment->comment_body }}</h3> 
                
                <p> Created At: 
                    <b>{{ $comment->created_at->format('d-m-y') }}</b>
                </p>

                <br>
                @if (Auth::id() == $comment->user->id)
                <div>
                    <a href="" class="btn btn-success">Edit</a>
                    <button type="button" value="{{ $comment->id }}" href="" class="deleteComment  btn btn-danger">Delete</button>

                </div>
                @endif

            </div>
           @empty
           <h6>No Comment Yet.</h6>
           @endforelse


           <script>
            $(document).ready(function(){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).on('click', '.deleteComment', function(){
                   
                    if (confirm('Are you sure you want to delete this comment'))
                    {
                    var thisClicked = $(this);
                    var comment_id = thisClicked.val();
                    
                    $.ajax({
                        type: "POST",
                        url: "/delete-comment",
                        data: {
                            'comment_id': comment_id
                        },
                        success: function(res){
                            if (res.status == 200) {
                                thisClicked.closest('.comment-container').remove();
                                alert(res.message);
                            }else{
                                alert(res.message);   
                            }
                        }
                    });
                }

                });
            });
           </script>



</x-layout>