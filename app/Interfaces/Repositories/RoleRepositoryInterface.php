<?php

namespace App\Interfaces\Repositories;

interface RoleRepositoryInterface
{
    /**
     * get the role list
     * @param $request
     * @return $data
     */
    public function getAllRoleList($request);

    /**
     * get the role list
     * @param $request
     * @return $roles data
     */

    public function rolesData($request);

    /**
     * get the request list
     * @param $request
     * @return $data
     */
    public function createRole();

    /**
     * get the request data
     * @param $request, $id
     * @return $data
     */
    public function saveRoleData($request, $id = null);

    /**
     * get the role by id
     * @param $id
     * @return $role
     */
    public function getRoleData($id);

    /**
     * get the role by id
     * @param $id
     * @return $role
     */
    public function deleteRole($id);
}
