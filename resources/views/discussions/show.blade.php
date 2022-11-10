<x-layout>
    <link rel="stylesheet" href="/css/discussion-show.css">
    <h2 align="center" style="margin-top: -50px" class="mt-5">{{ $discussion->title }}</h2>
                   
                   
                    @foreach ($projects as $project)
                            @if($discussion->project_id == $project->id)

                                @if (Auth::id() == $project->user_id)

                                    <a  href="{{ route('discussions.edit', $discussion->id) }}"> <button class="dis-update"> Edit</button></a>
                                    <form action="{{ route('discussions.destroy',$discussion->id) }}" method="Post">
                                        @csrf
                                        @method('DELETE')
                                        <button style="float: right;margin-top: -56px;" class="dis-delete" type="submit" onclick="return confirm('Are You Sure!')" >Delete</button>
                                    </form>
                                    @else
                                    <a  > <button class="dis-update"> </button></a>
                                    <button style="float: right;margin-top: -56px;" class="dis-delete" ></button>
                                    
                                    @endif
                                    @endif
                                    @endforeach
                                    <a style="float: right; margin-right: 8px;" href="{{ route('projects.discussions.index', $project->id, $discussion->id) }}">Back</a>
                                        
          
    
        <div class="card-body">
            <form style="margin-left: 42%;margin-top: -65px; display: flex;flex-wrap: wrap;" action="{{ url('comments') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                    <input class="comment-in form-control" name="comment_body" rows="3" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="comment-but" style="font-size: 0.8em;" value="Add Comment" />
                </div>
            </form>
           </div>



           <div class="comments-container">


            <ul id="comments-list" class="comments-list">
                <li>
                    @foreach ($discussions as $comment)
                    <div class="comment-main-level">
                        <!-- Avatar -->
                        {{-- <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div> --}}
                        <!-- Contenedor del Comentario -->
                        <div class="comment-box">
                            <div class="comment-head">
                                <h6 class="comment-name by-author"><a>@if ($comment->user){{ $comment->user->name }}@endif</a></h6>
                                {{-- <span>{{ $comment->created_at->format('d-m-y') }}</span> --}}
                                @if (Auth::id() == $comment->user->id)
                                <a href="/comment/{{ $comment->id }}/edit"><i class="bi bi-pen"></i></a>
                                <button style="width: 0;height: 0;float: right;" type="button" value="{{ $comment->id }}" class="deleteComment"><i class="bi bi-trash2-fill"></i></button>
                                @endif
                            </div>
                            <div class="comment-content">{{ $comment->comment_body }} </div>
                        </div>
                    </div>
                    
                    <br />
                    @endforeach
                              

                    </div>
                    
            </ul>
        </div>
          


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
                                thisClicked.closest('.comment-box').remove();
                                // alert(res.message);
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