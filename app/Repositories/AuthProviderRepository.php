<?php

namespace App\Repositories;

use App\Models\AuthProvider;

/**
 * To handle query repository for Auth Provider model.
 *
 * @package App\Repositories
 * @author efriandika
 */
class AuthProviderRepository extends BaseRepository {

    public function __construct(AuthProvider $authProvider) {
        $this->model = $authProvider;
    }

    /**
     * Find auth provider
     *
     * @param $provider
     * @param $providerId
     * @param $email
     * @return AuthProvider|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function findConnectedProvider($provider, $providerId, $email = '') {
        $data = $this->model->join('users', 'users.id', '=', 'auth_providers.user_id');

        $data->where('auth_providers.provider', $provider);
        $data->where('auth_providers.provider_id', $providerId);

        if (!empty($email)) {
            $data->where('users.email', $email);
        }

        return $data->first();
    }
}
