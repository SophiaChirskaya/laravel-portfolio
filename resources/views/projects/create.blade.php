@extends("layouts.projects")

@section("title", "Aggiungi un progetto")

@section("content")

<form action="{{ route("projects.store") }}" method="POST">
    @csrf
    <div class="form-control mb-3 d-flex flex-column">
        <label for="title">Titolo</label>
        <input type="text" name="title" id="title">
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="content">Descrizione</label>
        <textarea name="content" id="content" width="100%" rows="3"></textarea>
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="image">Image</label>
        <input type="file" name="image" id=image>
    </div>

    <input type="submit" value="Salva">

</form>

@endsection