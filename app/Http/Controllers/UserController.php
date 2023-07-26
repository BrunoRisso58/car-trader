<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $model;

    /**
     * Create a new instance of User model
     */
    public function __construct(UserRepository $model) {
        $this->model = $model;
    }
    
    /**
     * Display a listing of users
     */
    public function index()
    {
        $users = $this->model->getAll();
        return view('users.users', [
            "users" => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check() && Auth::user()->permission_id != 1)
            return redirect()->route('cars.index');
        
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $this->model->addUser($request->validated());
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->model->getOne($id);
        return view('users.user', [
            "user" => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->model->getOne($id);
        return view('users.edit', [
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $this->model->updateUser($request->all(), $id);
        return redirect()->route('user.show', $id);
    }

    /**
     * Shows the login form
     */
    public function loginForm()
    {
        if (Auth::check())
            return redirect()->route('cars.index');
            
        return view('users.loginForm');
    }

    /**
     * Authenticate user
     */
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('cars.index'));
        }

        return redirect()->route('login');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
