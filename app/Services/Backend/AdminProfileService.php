<?php

namespace App\Services\Backend;

use App\Models\Admin;
use Illuminate\Support\{
    Collection,
    Facades\Hash
};
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class AdminProfileService
{
    /**
     * @param $request
     * @return Collection
     */
    public function updatePassword($request): Collection
    {
        if ($this->matchOldPassword($request->user()->password, $request->input('oldPassword'))) {
            $this->changePassword($request->user()->id, $request->input('newPassword'));
            return $this->passwordUpdateSuccess();
        }
        return $this->oldPasswordMismatch();
    }

    /**
     * @param $userPassword
     * @param $oldPassword
     * @return bool
     */
    private function matchOldPassword($userPassword, $oldPassword): bool
    {
        return Hash::check($oldPassword, $userPassword);
    }

    /**
     * @return Collection
     */
    private function oldPasswordMismatch(): Collection
    {
        return new Collection([
            'success' => false,
            'error' => trans('auth.password'),
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
        ]);
    }

    /**
     * @param $id
     * @param $password
     * @return void
     */
    private function changePassword($id, $password): void
    {
        Admin::find($id)->update([
            'password' => Hash::make($password)
        ]);
    }

    /**
     * @return Collection
     */
    private function passwordUpdateSuccess(): Collection
    {
        return new Collection([
            'success' => true,
            'message' => trans('passwords.reset'),
            'status' => Response::HTTP_OK,
        ]);
    }
}