<?php

namespace App\Http\Controllers\Auth;

use JWTAuth;
use App\User;
use App\Transformers\UserTransformer;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Authenticate User
     *
     * @param Request $request
     * @return array
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if(! $token = JWTAuth::attempt($credentials))
            {
                return $this->response->errorUnauthorized('Unable to sign in with those credentials.');
            }
        } catch (JWTException $ex) {
            return $this->response->error('Something went wrong!', 500);
        }

        $user = JWTAuth::toUser($token);
        $role = $user->getRole();
        return compact('token','role','user');
    }

    /**
     * Get user
     *
     * @param  void
     * @return User
     */
    public static function getUser()
    {
        try {
            $user = JWTAuth::parseToken()->toUser();
            
            if(!$user) {
                return $self->response->errorNotFound('User not found');
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $ex) {
            return $self->response->errorUnauthorized('Token is invalid');
        } catch ( \Tymon\JWTAuth\Exceptions\TokenExpiredException $ex) {
            return $self->response->errorUnauthorized('Token has expired');
        } catch ( \Tymon\JWTAuth\Exceptions\TokenBlackListedException $ex) {
            return $self->response->errorUnauthorized('Token is blacklisted');
        }

        return $user;
    }

    /**
     * Authenticate Any User Type
     *
     * @param Request $request
     * @return response
     */
    public function authenticateAny(Request $request)
    {
        $auth = $this->authenticate($request);
        $user = $this->transformItem($auth['user'], new UserTransformer);

        return $this->response->array(
                array_merge( array_except($auth,['user']), compact('user') )
        )->setStatusCode(200);
    }

    /**
     * Get user
     *
     * @param  void
     * @return User
     */
    public function show(Request $request)
    {
        $data = $request->only('role');
        $user = $this->getUser();
        $role = $user->getRole();
        $user = $this->transformItem($user, new UserTransformer);

        if (!is_null($data['role']) && $data['role'] != $role ) {
            return $this->response->errorUnauthorized("Invalid Credentials");
        }

        return $this->response->array(compact('role','user'))->setStatusCode(200);
    }
}
