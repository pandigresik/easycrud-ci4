<?php

namespace App\Modules\Api\Controllers\Auth;

use App\Modules\Api\Entities\User;
use App\Modules\Api\Traits\HasTokenTrait;
use CodeIgniter\RESTful\ResourceController;

class RegisterController extends ResourceController
{
    use HasTokenTrait;

    /**
     * @OA\Post(
     *     path="/auth/register",
     *     tags={"Authentication"},
     *     summary="register page to new user",
     *     operationId="userRegister",
     *     @OA\RequestBody(
     *       required=true,
     *       description="Login user",
     *       @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(
     * 				type="object",
     * 				@OA\Property(property="email",type="string"),
     * 				@OA\Property(property="username",type="string"),
     * 				@OA\Property(property="password",type="string"),
     * 				@OA\Property(property="pass_confirm",type="string"),
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
     *         description="Invalid username/password supplied"
     *     ),
     * )
     */

    /**
     * Attempts to register the user.
     */
    public function action()
    {
        // Check if registration is allowed
        if (! setting('Auth.allowRegistration')) {
            return $this->failForbidden('Forbidden', null, lang('Auth.registerDisabled'));
        }

        $users = $this->getUserProvider();

        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules();

        if (! $this->validate($rules)) {
            return $this->failValidationErrors(service('validation')->getErrors());
        }

        // Save the user
        $allowedPostFields = array_merge(setting('Auth.validFields'), setting('Auth.personalFields'));
        $user              = $this->getUserEntity();

        $user->fill($this->request->getPost($allowedPostFields));

        if (! $users->save($user)) {
            return $this->failResourceExists('Conflict', null, $users->errors());
        }

        // Get the updated user so we have the ID...
        $user = $users->find($users->getInsertID());

        // Store the email/password identity for this user.
        $user->createEmailIdentity($this->request->getPost(['email', 'password']));

        // Add to default group
        $users->addToDefaultGroup($user);

        return $this->respondUpdated([
            'token' => $this->getTokenSecret($user),
        ], lang('Auth.registerSuccess'));
    }

    /**
     * Returns the User provider.
     *
     * @return mixed
     */
    protected function getUserProvider()
    {
        return model('UserModel'); // @phpstan-ignore-line
    }

    /**
     * Returns the Entity class that should be used.
     *
     * @return \Sparks\Shield\Entities\User
     */
    protected function getUserEntity()
    {
        return new User();
    }

    /**
     * Returns the rules that should be used for validation.
     *
     * @return string[]
     */
    protected function getValidationRules()
    {
        return [
            'username'     => 'required|alpha_numeric_space|min_length[3]|is_unique[users.username]',
            'email'        => 'required|valid_email|is_unique[auth_identities.secret]',
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];
    }
}
