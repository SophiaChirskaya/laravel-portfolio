@extends("layouts.projects")

@section("title", $project->title)
@section("content")


<div class="d-flex py-4 gap-2">
    <a class="btn btn-outline-warning" href="{{ route("projects.edit", $project) }}">Modifica</a>
    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Elimina
</button>
    
</div>
<div class="mb-4 d-flex flex-column">
    <small>
    {{$project->content}}
    </small>
    <h4>Linguaggio di programmazione: {{$project->type->name}}</h4>
    
    @if(count($project->technologies) > 0 )
    <small>
      @foreach($project->technologies as $technology)
      <span class="badge" style="background-color: {{$technology->color}}">{{$technology->name}}</span>
      @endforeach
    </small>
    @endif
</div>

@if($project->image)
<div id="project-image">
  <img src="{{ asset("storage/" . $project->image) }}" alt="">
</div>
@endif

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il progetto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sei sicuro di volere eliminare il progetto?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        <form action="{{ route("projects.destroy", $project) }}" method="POST">
            @csrf
            @method("DELETE")
            <input type="submit" class="btn btn-outline-danger" value="Elimina definitivamente">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
