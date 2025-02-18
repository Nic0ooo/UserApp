@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tableau de bord</h1>

    <div class="row">
        <!-- Carte des statistiques -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Tâches totales</div>
                <div class="card-body">
                    <h2 class="card-title">{{ $totalTasks }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Tâches en cours</div>
                <div class="card-body">
                    <h2 class="card-title">{{ $inProgressTasks }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Tâches terminées</div>
                <div class="card-body">
                    <h2 class="card-title">{{ $completedTasks }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des tâches -->
    <div class="card">
        <div class="card-header">
            Mes Tâches
            <a href="{{ route('tasks.create') }}" class="btn btn-success float-end">Nouvelle Tâche</a>
        </div>
        <div class="card-body">
            @if($tasks->isEmpty())
                <p class="text-muted">Aucune tâche disponible.</p>
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
                        @foreach($tasks as $task)
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
    </div>
</div>
@endsection