<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TaskModel;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;


class ToDoList extends Controller
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/signin');
        }

        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->where('user_id', session()->get('user_id'))->findAll();
        return view('home', $data);
    }

    public function signin()
    {
        if ($this->request->getMethod() === 'POST') {
            $model = new UserModel();
            $user = $model->where('email', $this->request->getPost('email'))->first();

            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                session()->set([
                    'user_id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/');
            } else {
                return redirect()->back()->with('error', 'Invalid credentials');
            }
        }
        return view('signin');
    }

    public function signup()
    {
        if ($this->request->getMethod() === 'POST') {
            $model = new UserModel();
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
            ];

            $model->save($data);
            return redirect()->to('/signin');
        }
        return view('signup');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/signin');
    }

   public function profile()
    {
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/signin');
    }

    $model = new UserModel();
    $user = $model->find(session()->get('user_id'));

    if ($this->request->getMethod() === 'post') {
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email')
        ];
        $model->update(session()->get('user_id'), $data);
        session()->set(['name' => $data['name'], 'email' => $data['email']]);
    }

    return view('profile', ['user' => $user]);
    }

    public function createTask()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/signin');
        }

        if ($this->request->getMethod() === 'POST') {
            $taskModel = new TaskModel();
            $taskModel->save([
                'user_id' => session()->get('user_id'),
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description')
            ]);
            return redirect()->to('/');
        }
        return view('create_task');
    }

    public function editTask($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/signin');
        }

        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if ($this->request->getMethod() === 'POST') {
            $taskModel->update($id, [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description')
            ]);
            return redirect()->to('/');
        }
        return view('edit_task', ['task' => $task]);
    }

    public function deleteTask($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/signin');
        }

        $taskModel = new TaskModel();
        $taskModel->delete($id);
        return redirect()->to('/');
    }

    public function search()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/signin');
        }

        $taskModel = new TaskModel();
        $keyword = $this->request->getGet('keyword');
        $tasks = $taskModel->like('title', $keyword)->orLike('description', $keyword)->where('user_id', session()->get('user_id'))->findAll();

        return view('home', ['tasks' => $tasks]);
    }
}
class Todo extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();
        $tasks = $taskModel->findAll(); // Mengambil semua task dari database

        return view('todo_list', ['tasks' => $tasks]);
    }

    public function updateTimer($taskId)
    {
        $taskModel = new TaskModel();
        $data = $this->request->getJSON();

        $taskModel->update($taskId, ['timer_duration' => $data->timer_duration]);

        return $this->response->setJSON(['success' => true]);
    }
}
