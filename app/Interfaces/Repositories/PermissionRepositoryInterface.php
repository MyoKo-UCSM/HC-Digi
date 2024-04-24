<?php

namespace App\Interfaces\Repositories;

interface PermissionRepositoryInterface
{
    /**
     * get the permission list
     * @param $request
     * @return $data
     */
    public function getAllPermissionList($request);

    /**
     * get the permission list
     * @param $request
     * @return $permissions data
     */

    public function PermissionsData($request);

    /**
     * get the request data
     * @param $request, $id
     * @return $data
     */
    public function savePermissionData($request, $id = null);

    /**
     * get the permission by id
     * @param $id
     * @return $permission
     */
    public function getPermissionData($id);

    /**
     * get the permission by id
     * @param $id
     * @return $permission
     */
    public function deletePermission($id);
}
