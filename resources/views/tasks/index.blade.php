@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des tâches</h2>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Créer une tâche</a>
    
    @if($tasks->isEmpty())
        <p class="text-muted">Aucune tâche trouvée.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>
                            @if($task->status == 'À faire')
                                <span class="badge bg-secondary">{{ $task->status }}</span>
                            @elseif($task->status == 'En cours')
                                <span class="badge bg-warning">{{ $task->status }}</span>
                            @else
                                <span class="badge bg-success">{{ $task->status }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette tâche ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection