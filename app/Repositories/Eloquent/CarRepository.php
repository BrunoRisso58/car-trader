<?php

namespace App\Repositories\Eloquent;

use ErrorException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Repositories\Contracts\CarRepositoryInterface;
use App\Models\Car;

class CarRepository extends AbstractRepository implements CarRepositoryInterface {

    protected $model = Car::class;

    public function addCar(Request $request) {
        DB::beginTransaction();

        try {
            $attributes = $request->only('brand', 'model', 'color', 'price', 'description', 'features', 'image');
            $attributes['year'] = substr($attributes['model'], 0, 4);
            $attributes['user_id'] = 1;

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

}