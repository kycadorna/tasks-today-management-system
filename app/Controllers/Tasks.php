<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Tasks extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    public function index()
    {
        $data = [
            'tasks' => $this->taskModel
                ->where('is_archived', 0)
                ->orderBy('task_date', 'ASC')
                ->findAll()
        ];

        return view('tasks/index', $data);
    }

    public function new()
    {
        return view('tasks/new');
    }

    public function create()
    {
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'permit_empty',
            'task_date' => 'required|valid_date[Y-m-d]'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->insert([
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date' => $this->request->getPost('task_date'),
            'is_archived' => 0
        ]);

        return redirect()
            ->to('/tasks')
            ->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        $task = $this->taskModel
            ->where('task_id', $id)
            ->where('is_archived', 0)
            ->first();

        if (!$task) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('tasks/edit', [
            'task' => $task
        ]);
    }

    public function update($id)
    {
        $task = $this->taskModel
            ->where('task_id', $id)
            ->where('is_archived', 0)
            ->first();

        if (!$task) {
            throw PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'permit_empty',
            'task_date' => 'required|valid_date[Y-m-d]'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->update($id, [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()
            ->to('/tasks')
            ->with('success', 'Task updated successfully.');
    }

    public function delete($id)
    {
        $task = $this->taskModel
            ->where('task_id', $id)
            ->where('is_archived', 0)
            ->first();

        if (!$task) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->taskModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()
            ->to('/tasks')
            ->with('success', 'Task archived successfully.');
    }
}