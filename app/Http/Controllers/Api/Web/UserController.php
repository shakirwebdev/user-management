<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Web\DeleteUserRequest;
use App\Http\Requests\Api\Web\StoreUserRequest;
use App\Http\Requests\Api\Web\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function add(StoreUserRequest $request)
    {
        try {
            User::create($request->validated());

            return response()->json($this->responses([
                'response' => [
                    'errCode' => 0,
                    'errMsg' => '',
                ],
            ]));
        } catch (\Exception $e) {
            return response()->json($this->responses([
                'response' => [
                    'errCode' => 1001,
                    'errMsg' => 'Create User Failed',
                ],
            ]));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UpdateUserRequest $request)
    {
        $request = $request->validated();

        try {
            $user = User::find($request['id']);
            unset($request['id']);
            $user->update($request);

            return response()->json($this->responses([
                'response' => [
                    'errCode' => 0,
                    'errMsg' => '',
                ],
            ]));
        } catch (\Exception $e) {
            return response()->json($this->responses([
                'response' => [
                    'errCode' => 1001,
                    'errMsg' => 'Update User Failed',
                ],
            ]));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(DeleteUserRequest $request)
    {
        $request = $request->validated();

        try {
            $user = User::find($request['id']);
            $user->delete();

            return response()->json($this->responses([
                'response' => [
                    'errCode' => 0,
                    'errMsg' => '',
                ],
            ]));
        } catch (\Exception $e) {
            return response()->json($this->responses([
                'response' => [
                    'errCode' => 1001,
                    'errMsg' => 'Delete User Failed',
                ],
            ]));
        }
    }

    /**
     * List all of the user.
     */
    public function all()
    {
        try {
            return response()->json($this->responses([
                'response' => [
                    'errCode' => 0,
                    'errMsg' => '',
                ],
                'data' => User::all()->toArray(),
            ]));
        } catch (\Exception $e) {
            return response()->json($this->responses([
                'response' => [
                    'errCode' => 1001,
                    'errMsg' => 'Failed to get data',
                ],
            ]));
        }
    }
}
