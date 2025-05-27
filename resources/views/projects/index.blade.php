@extends("layouts.projects")

@section("title", "tutti i progetti")

@section("content")
<div class="d-flex py-4 gap-2">
    <a class="btn btn-outline-primary" href="{{ route("projects.create") }}">Aggiungi un progetto</a>    
</div>

<table>
    <thead>
        <th>Titolo</th>
        <th>Contenuto</th>
        <th>Immagine</th>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{ $project->title }}</td>
            <td>{{ $project->content }}</td>
            <td>{{ $project->image }}</td>
            <td>
                <a href="{{ route("projects.show", $project->id) }}">Visualizza</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
