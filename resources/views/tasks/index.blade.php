<x-layout>
    <h1 align="center">Tasks</h1>
  
    <form action="{{ route("projects.tasks.store", $project->id) }}" method="POST" >
        @csrf
        <input type="text" name="body"><br>
    
        <button type="submit" class="btn btn-info">Create Task</button>
        
    </form>

<div class="task-div">

    @foreach ($tasks as $task)
    
    <h1>{{ $task->body }}</h1>
    <a class="btn btn-success" href="{{ route('projects.tasks.edit', [$task->project_id, $task->id]) }}">Edit</a>
    <button type="button" value="{{ $task->id }}" class="deleteTask  btn btn-danger">Delete</button>
    
    @endforeach
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