<?php

namespace App\Services\Backend;

use App\Models\Admin;
use Illuminate\Support\{Collection, Facades\Hash};
use Symfony\Component\HttpFoundation\Response;

/**
 * handle admin profile related task
 */
class AdminProfileService
{
    private Collection $collection;

    /**
     * @param $request
     * @return Collection
     */
    public function updatePassword($request): Collection
    {
        if ($this->matchOldPassword($request->user()->password, $request->input('oldPassword'))) {
            $this->changePassword($request->user()->id, $request->input('newPassword'));
            $this->collection = $this->passwordUpdateSuccess();
        }
        $this->collection = $this->oldPasswordMismatch();
        return $this->collection;
    }


    public function updateGeneral($request): Collection
    {
        $this->collection = $this->updateProfile($request->user()->id, $request->validated())
            ? $this->generalUpdateSuccess()
            : $this->generalUpdateFailed();
        return $this->collection;
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
    private function changePassword($id, $password): bool
    {
        return Admin::find($id)->update([
            'password' => Hash::make($password)
        ]);
    }

    private function updateProfile($id, $data): bool
    {
        return Admin::find($id)->update($data);
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

    /**
     * @return Collection
     */
    private function generalUpdateSuccess(): Collection
    {
        return new Collection([
            'success' => true,
            'message' => trans('profile.success'),
            'status' => Response::HTTP_OK,
        ]);
    }

    private function generalUpdateFailed(): Collection
    {
        return new Collection([
            'success' => false,
            'error' => trans('profile.failed'),
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
        ]);
    }
}