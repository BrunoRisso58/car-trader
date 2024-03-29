<?php

namespace App\Repositories\Eloquent;

use ErrorException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Repositories\Contracts\CarRepositoryInterface;
use App\Models\Car;
use App\Models\Feature;

class CarRepository extends AbstractRepository implements CarRepositoryInterface {

    protected $model = Car::class;

    /**
     * Get all cars that are not sold yet
     */
    public function getAllAvailableCars() {
        $cars = $this->model->where('sold', '=', 0)->get()->reverse();
        return $cars;
    }

    public function addCar(Request $request) {
        DB::beginTransaction();

        try {
            $attributes = $request->only('brand', 'model', 'color', 'price', 'description', 'features', 'image');
            $attributes['price'] = str_replace(',', '', $attributes['price']);
            $attributes['year'] = substr($attributes['model'], 0, 4);
            $attributes['user_id'] = Auth::user()->id;

            $car = $this->model->create($attributes);

            if ($attributes['image']) {
                $path = $attributes['image']->store(Str::slug($attributes['model']) . '-' . Str::slug(now()));
                $car->images()->create([
                    'path' => $path
                ]);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    public function isCarSold($id) {
        $car = $this->getOne($id);
        $isSold = $car['sold'] == 1 ? true : false;

        return $isSold;
    }

    public function getCarsByLoggedUser() {
        $cars = $this->model->where('user_id', '=', Auth::user()->id)->get()->reverse();
        return $cars;
    }

    /**
     * Verifies if the given car ad is created by the logged user and returns the car or null
     */
    public function verifyUserCar($carId) {
        $car = $this->model->where('id', $carId)
                           ->where('user_id', Auth::id())->first();

        return $car;
    }

    /**
     * Get all features that a car can have
     */
    public function getAllFeatures() {
        $features = Feature::all();
        return $features;
    }

    /**
     * Mark a car as sold or as not sold
     */
    public function markAsSold($id, Request $request) {
        $car = $this->model->findOrFail($id);
        $car['sold'] = $request->sell;
        $car->save();

        return $car;
    }

    /**
     * Update a car
     */
    public function updateCar(string $id, array $data) {

        DB::beginTransaction();

        try {
            $car = $this->getOne($id);
            $data['price'] = str_replace(',', '', $data['price']);
            $data['year'] = substr($data['model'], 0, 4);

            $car->fill($data);
            $car->save();

            if (isset($data['image'])) {
                $path = $data['image']->store(Str::slug($data['model']) . '-' . Str::slug(now()));
                $car->images()->update([
                    'path' => $path
                ]);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

}