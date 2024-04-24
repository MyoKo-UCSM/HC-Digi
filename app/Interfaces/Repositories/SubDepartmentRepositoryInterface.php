<?php

namespace App\Interfaces\Repositories;

interface SubDepartmentRepositoryInterface
{
    /**
     * get the news list
     * @param $request
     * @return $data
     */
    public function getAllSubDepartmentList($request);

    /**
     * get the permission list
     * @param $request
     * @return $permissions data
     */

     public function subDepartmentData($request);

   /**
     * get the request data
     * @param $request, $id
     * @return $data
     */
    public function saveSubDepartmentData($request, $id = null);

    /**
     * get the department by id
     * @param $id
     * @return $sub_department
     */
    public function getSubDepartmentData($id);

    /**
     * get the department by id
     * @param $id
     * @return $sub_department
     */
    public function deleteSubDepartment($id);

    /**
     * get the sub_department by id
     * @param $id
     * @return $sub_department
     */
    public function subDepartmentStatusChange($request);
}
