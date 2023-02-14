<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->messages()
            ],422);
        }
        try {
            if(!Auth::guard('admin')->attempt( $validator->validated())){
                return response()->json([
                    'success' => false,
                    'error' => "Email & Password does not match with our record."
                ],422);
            }

            $admin = Admin::where('email', $validator->validated()['email'])->first();

            return response()->json([
                'success' => true,
                'message' => 'Logged In Successfully',
                'token' => $admin->createToken('token',['role:admin'])->plainTextToken
            ]);

        }catch (\Exception $ex){
            return response()->json([
                    'success' => false,
                    'errors' => $ex->getMessage(),
                ],422
            );
        }
    }
}
