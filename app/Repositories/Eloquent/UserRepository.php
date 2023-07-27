<?php

namespace App\Repositories\Eloquent;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends AbstractRepository implements UserRepositoryInterface {

    protected $model = User::class;

    public function addUser(array $data) {

        DB::beginTransaction();

        try {
            $user = $this->model->create($data);

            if ($data['image']) {
                $path = $data['image']->store(Str::slug($data['name']) . '-' . Str::slug(now()));
                $user->image()->create([
                    'path' => $path
                ]);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function updateUser(array $data, $id) {

        DB::beginTransaction();

        try {
            $path = $data['image']->store(Str::slug($data['name']) . '-' . Str::slug(now()));

            $user = $this->model->findOrFail($id);
            $user->fill($data);
            $user->save();
    
            $user->image()->update([
                'path' => $path
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

}