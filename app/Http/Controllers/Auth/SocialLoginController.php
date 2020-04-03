<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuthProvider;
use App\Providers\RouteServiceProvider;
use App\Repositories\AuthProviderRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Redirect the user to the Provider authentication page.
     *
     * @param $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        switch (strtoupper($provider)) {
            case AuthProvider::PROVIDER_APPLE:
                return Socialite::driver("apple")
                    ->scopes(["name", "email"])
                    ->redirect();
            case AuthProvider::PROVIDER_GOOGLE:
                return Socialite::driver('google')->redirect();
            case AuthProvider::PROVIDER_MICROSOFT:
                return Socialite::driver('graph')
                    ->scopes(['openid', 'email'])->redirect();
            default:
                abort(404);
                break;
        }
    }

    /**
     * Obtain the user information from Provider.
     *
     * @param Request $request
     * @param UserRepository $userRepository
     * @param AuthProviderRepository $authProviderRepository
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback(Request $request, UserRepository $userRepository, AuthProviderRepository $authProviderRepository, $provider)
    {
        $provider = strtoupper($provider);
        $now = Carbon::now();
        $user = null;
        $authProvider = null;
        $response = null;
        $tokenExpiration = null;

        try {

            // Provider Checking
            switch ($provider) {
                case AuthProvider::PROVIDER_APPLE:
                    $response = Socialite::driver('apple')->user();

                    $tokenExpiration = Carbon::now()->addSeconds($response->expiresIn);

                    break;
                case AuthProvider::PROVIDER_GOOGLE:
                    $response = Socialite::driver('google')->user();
                    $authProvider = $authProviderRepository->findConnectedProvider($provider, $response->id, $response->email);
                    $tokenExpiration = Carbon::now()->addMinutes($response->expiresIn);

                    break;
                case AuthProvider::PROVIDER_MICROSOFT:
                    $response = Socialite::driver('graph')->user();

                    if (is_null($response->email)) {
                        $response->email = $response->user['userPrincipalName'];
                    }

                    $tokenExpiration = Carbon::now()->addMinutes($response->expiresIn);

                    break;
                default:
                    abort(404);
                    break;
            }

            if (!is_null($response) && !is_null($authProvider)) {
                // Login Success
                $user = $userRepository->findOne($authProvider->user_id);

                if (is_null($user->email_verified_at)) {
                    $user->email_verified_at = $now;
                }

                $user->save();

                $authProvider->provider_id = $response->id;
                $authProvider->last_login_at = $now;
                $authProvider->access_token = $response->token;
                $authProvider->access_token_expired_at = $tokenExpiration;
                $authProvider->save();

                Log::info('Login with '.$provider.' is successful. Provider ID: '.$response->id, [
                    '$now' => $now,
                    '$tokenExpiration' => $tokenExpiration,
                ]);
            } else if (!is_null($response)) {
                // Check the same email
                $user = $userRepository->findOneByEmail($response->email);

                if (is_null($user)) {
                    Log::info('Trying to Register with '.$provider.'. Provider ID: '.$response->id);

                    return redirect()->route('register')->withInput([
                        'name' => $response->name,
                        'email' => $response->email,
                    ])->with('success', 'Please complete the registration form first');
                }

                // Add provider
                $authProvider = new AuthProvider();
                $authProvider->user_id = $user->id;
                $authProvider->provider = $provider;
                $authProvider->provider_id = $response->id;
                $authProvider->last_login_at = $now;
                $authProvider->access_token = $response->token;
                $authProvider->access_token_expired_at = $tokenExpiration;

                $authProvider->save();

            } else {
                abort(401);
            }

            // Mark as Logged In
            Auth::login($user);

            return redirect()->intended($this->redirectTo);

        } catch (QueryException $e) {
            Log::error('Social login service error [QueryException]: '.$e->getMessage());
            return redirect()->route('login')
                ->withErrors(__('Login with Discord Failed. Please make sure your discord account has an active / verified email address'));
        } catch (\Exception $e) {
            Log::error('Social login service error [Exception]: '.$e->getMessage());
            return redirect()->route('login')->withErrors(__($e->getMessage()));
        }
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }
}
