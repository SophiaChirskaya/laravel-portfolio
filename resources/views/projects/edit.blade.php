@extends("layouts.projects")

@section("title", "Modifica il progetto")

@section("content")

<form action="{{ route("projects.update", $project) }}" method="POST">
    @csrf
    @method("PUT")
    <div class="form-control mb-3 d-flex flex-column">
        <label for="title">Titolo</label>
        <input type="text" name="title" id="title" value="{{ $project->title }}">
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="content">Descrizione</label>
        <textarea name="content" id="content" width="100%" rows="3">{{ $project->content }}"</textarea>
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="type_id">Linguaggio</label>
        <select name="type_id" id="type_id">
            @foreach($types as $type)
            <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="image">Image</label>
        <input type="file" name="image" id=image>
    </div>

    <input type="submit" value="Salva">

</form>

@endsection