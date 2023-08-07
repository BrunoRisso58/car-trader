<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Repositories\Eloquent\CarRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    protected $model;

    public function __construct(CarRepository $model) {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = $this->model->getAll();
        return view('cars.cars', [
            "cars" => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $features = Feature::all();
        return view('cars.add', [
            "features" => $features
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->model->addCar($request);
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $isByLoggedUser = $this->model->verifyUserCar($id);
        $car = $this->model->getOne($id);
        return view('cars.car', [
            "car" => $car,
            "isByLoggedUser" => $isByLoggedUser
        ]);
    }

    /**
     * Display a listing of the car ads that were created by the logged user.
     */
    public function myList()
    {
        $cars = $this->model->getCarsByLoggedUser();
        return view('cars.myList', [
            "cars" => $cars
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ($this->model->verifyUserCar($id) == null) {
            return redirect()->route('cars.index');
        }

        $car = $this->model->getOne($id);
        $features = Feature::all();

        return view('cars.edit', [
            "car" => $car,
            "features" => $features
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
