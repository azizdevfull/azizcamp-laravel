<x-layout>
    <link rel="stylesheet" href="{{asset('css/projects.css')}}">
    
    <h1 align="center" style="margin-top: -75px;">Projects</h1> <br>
    <a href="{{ route('projects.create') }}"><button class="button-new" >New Project</button></a>
    <div class="wrapper">
        
        
        
        @if(count($projects) > 0)
        <div class="cards">
            @foreach ($projects as $project)
            <div class=" card ">
                <div class="card__inner [ js-expander ]">
                    <a style="float: left; margin-left: -26px; margin-top: -34px;" href="{{ url('projects', $project->id) }}"><i class="bi bi-eye" style="color: black;"></i></a>
                    <span class="span-p">{{ $project->name }}</span> <br>
                    
                    <b class="b-p">{{ $project->description }}</b>
                    <i class="fa fa-folder-o"></i>
                </div>
                <div class="card__expander">
                    <i class="fa fa-close [ js-collapser ]"></i>
                </div>
            </div>
            @endforeach
            @else
            <h4 align="center" style="color: #ffd300">You don't have any project yet!</h4>
            
        </div>
        @endif
      
      </div>
     <script src="/js/projects.js"></script>
</x-layout>