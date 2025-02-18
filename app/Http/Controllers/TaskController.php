<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks;
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create'); // Assure-toi que ce fichier existe
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required'
        ]);

        auth()->user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => auth()->id(), // Ajoute l'ID utilisateur
        ]);

        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        // Vérifier si l'utilisateur est bien le propriétaire de la tâche
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Accès interdit');
        }

        $task->update($request->all());

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        // Vérifier si l'utilisateur est bien le propriétaire de la tâche
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Accès interdit');
        }

        $task->delete();

        return redirect()->route('tasks.index');
    }
}