<?php

namespace App\Repositories\Eloquent;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Repositories\Contracts\CarRepositoryInterface;
use App\Models\Car;

class CarRepository extends AbstractRepository implements CarRepositoryInterface {

    protected $model = Car::class;

}