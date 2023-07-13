<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\UserRepository;
use Illuminate\Http\Request;

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
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'yep!';
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
