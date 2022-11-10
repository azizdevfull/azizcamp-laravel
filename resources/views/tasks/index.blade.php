<x-layout>
    <link rel="stylesheet" href="/css/discussion-show.css">

    <h1 align="center">Tasks</h1> <br>
  
    <a style="margin-left: 50px;" href=" {{ route('projects.show',  $project->id) }} "><button class="dis-delete">Back</button></a>

    <div class="card-body">
        <form style="margin-left: 42%;margin-top: -65px; display: flex;flex-wrap: wrap;" action="{{ route("projects.tasks.store", $project->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <input class="comment-in form-control" name="body" rows="3" required>
            </div>
            <div class="form-group">
                <input type="submit" class="comment-but" style="font-size: 0.8em;" value="Create Task" />
            </div>
        </form>
       </div>
    </form>

    <div class="container">
        <div class="tester">

            @foreach ($tasks as $task)
            <div class="task-div task-list" align="center" style="">
                
                <h2>{{ $task->body }}</h2>
                <a style="margin-right: -472px;"  href="{{ route('projects.tasks.edit', [$task->project_id, $task->id]) }}"><button class="dis-update">Edit</button></a>
                <button type="button" value="{{ $task->id }}" class="deleteTask dis-delete">Delete</button>
                
                
            </div>
            @endforeach
        </div>
            </div>


    

    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.deleteTask', function(){
               
                if (confirm('Are you sure you want to delete this comment'))
                {
                var thisClicked = $(this);
                var task_id = thisClicked.val();
                
                $.ajax({
                    type: "POST",
                    url: "/delete-task",
                    data: {
                        'task_id': task_id
                    },
                    success: function(res){
                        if (res.status == 200) {
                            thisClicked.closest('.task-div').remove();
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