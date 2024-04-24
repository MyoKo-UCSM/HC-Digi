<?php

namespace App\Interfaces\Repositories;

interface DepartmentRepositoryInterface
{
    /**
     * get the news list
     * @param $request
     * @return $data
     */
    public function getAllDepartmentList($request);

    /**
     * get the permission list
     * @param $request
     * @return $permissions data
     */

     public function departmentData($request);

   /**
     * get the request data
     * @param $request, $id
     * @return $data
     */
    public function saveDepartmentData($request, $id = null);

    /**
     * get the department by id
     * @param $id
     * @return $department
     */
    public function getDepartmentData($id);

    /**
     * get the department by id
     * @param $id
     * @return $department
     */
    public function deleteDepartment($id);

    /**
     * get the department by id
     * @param $id
     * @return $department
     */
    public function departmentStatusChange($request);
}
