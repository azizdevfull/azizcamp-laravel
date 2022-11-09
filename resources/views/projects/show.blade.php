<x-layout>
    <link rel="stylesheet" href="{{asset('css/projects.css')}}">

    <div class="container">
    <h1 align="center">{{ $project->name }}</h1>
 
    <a style="float: right;"  href="/projects/{{ $project->id }}/edit"><button class="button-new">Edit Project</button></a>
    <form action="{{ route('projects.destroy',$project->id) }}" method="Post">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are You Sure!')" class=" button-del">Delete</button>
    </form>

    <div class="wrapper">
        <div class="cards">
            <div class=" card ">
                <div class="card__inner [ js-expander ]">
                    <a href="{{ route('projects.discussions.index',$project->id) }}"><span class="span-p">Discussions</span></a>

                </div>
            </div>

            <div class=" card ">
                <div class="card__inner [ js-expander ]">
                    <a href="{{ route('projects.attachers.index',$project->id) }}"><span class="span-p">Attachments</span></a>
                </div>
            </div>

            <div class=" card ">
                <div class="card__inner [ js-expander ]">
                    <a href="{{ route('projects.tasks.index',$project->id) }}"><span class="span-p">Tasks</span></a>
                </div>
            </div>
            
        </div>
      
      </div>

    </div>
</x-layout>