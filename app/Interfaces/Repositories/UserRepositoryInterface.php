<?php

namespace App\Interfaces\Repositories;

interface UserRepositoryInterface
{
    /**
     * get the user list
     * @param $request
     * @return $data
     */
    public function getAllUserList($request);

    /**
     * get the user list
     * @param $request
     * @return $users data
     */

    public function usersData($request);

    /**
     * get the request list
     * @param $request
     * @return $data
     */
    public function createUser();

    /**
     * get the request data
     * @param $request, $id
     * @return $data
     */
    public function saveUserData($request, $id = null);

    /**
     * get the user by id
     * @param $id
     * @return $user
     */
    public function getUserData($id);

    /**
     * get the user by id
     * @param $id
     * @return $user
     */
    public function deleteUser($id);
}
