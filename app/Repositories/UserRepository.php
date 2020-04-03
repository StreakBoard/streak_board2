<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Str;

/**
 * To handle query repository for User model.
 *
 * @package App\Repositories
 * @author efriandika
 */
class UserRepository extends BaseRepository {

    public function __construct(User $user) {
        $this->model = $user;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function findOneByEmail($email) {
        $data = $this->model->with([]);

        $data->where('email', $email);

        return $data->first();
    }

    public function generateRandomPassword() {
        return Str::random(8);
    }
}
