@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier la tâche</h2>

    <!-- Vérification des erreurs -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('POST') <!-- Laravel traite une mise à jour via POST -->

        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select class="form-control" id="status" name="status">
                <option value="À faire" @if($task->status == 'À faire') selected @endif>À faire</option>
                <option value="En cours" @if($task->status == 'En cours') selected @endif>En cours</option>
                <option value="Terminé" @if($task->status == 'Terminé') selected @endif>Terminé</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection