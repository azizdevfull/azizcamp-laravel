<x-layout>
    <link rel="stylesheet" href="{{asset('css/projects.css')}}">
    
    <div class="wrapper">
        
        {{-- <a href="{{ url('projects', $project->id) }}">Show This Project</a> --}}
        
        <div class="cards">
            @foreach ($projects as $project)
            <div class=" card ">
                <div class="card__inner [ js-expander ]">
                    <a style="float: left; margin-left: -26px; margin-top: -34px;" href="{{ url('projects', $project->id) }}"><i class="bi bi-eye"></i></a>
                    <span>{{ $project->name }}</span>
                    
                    <b>{{ $project->description }}</b>
                    <i class="fa fa-folder-o"></i>
                </div>
                <div class="card__expander">
                    <i class="fa fa-close [ js-collapser ]"></i>
                </div>
            </div>
            @endforeach
      
        </div>
      
      </div>
     <script src="/js/projects.js"></script>
</x-layout>