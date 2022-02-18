<?php

namespace App\Modules\Api\Controllers\Auth;

use App\Modules\Api\Traits\HasTokenTrait;
use CodeIgniter\RESTful\ResourceController;

class LoginController extends ResourceController
{
    use HasTokenTrait;

    /**
     * @OA\Post(
     *     path="/auth/login",
     *     tags={"Authentication"},
     *     summary="login page to authenticate user",
     *     operationId="userLogin",
     *     @OA\RequestBody(
     *       required=true,
     *       description="Login user",
     *       @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(
     * 				type="object",
     * 				@OA\Property(property="email",type="string"),
     * 				@OA\Property(property="password",type="string"),
     * 			)
     *       ),
     * 	   ),
     *     @OA\Response(
     *         response=200,
     *         description="Login successed",
     *         @OA\JsonContent(
     * 			@OA\Schema(
     * 				type="object",
     * 				@OA\Property(property="token",type="string")
     * 			)
     * 		),
     *         @OA\XmlContent(
     * 			@OA\Schema(
     * 				type="object",
     * 				@OA\Property(property="token",type="string")
     * 			)
     * 		),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid email/password supplied"
     *     ),
     * )
     */

    /**
     * Attempts to log the user in.
     */
    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function action()
    {
        $credentials             = $this->request->getPost(setting('Auth.validFields'));
        $credentials             = array_filter($credentials);
        $credentials['password'] = $this->request->getPost('password');

        // Attempt to login
        $result = auth('session')->attempt($credentials);
        if (! $result->isOK()) {
            unset($credentials['password']);
            // Events::trigger('failedLogin', $credentials);

            return $this->failUnauthorized('Unauthorized', null, $result->reason());
        }
        $user = $result->extraInfo();

        return $this->respondUpdated([
            'token' => $this->getTokenSecret($user),
        ], lang('Auth.loginSuccess'));
    }
}
