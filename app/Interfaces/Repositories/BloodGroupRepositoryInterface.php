<?php

namespace App\Interfaces\Repositories;

interface BloodGroupRepositoryInterface
{
    /**
     * get the news list
     * @param $request
     * @return $data
     */
    public function getAllBloodGroupList($request);

    /**
     * get the permission list
     * @param $request
     * @return $permissions data
     */

     public function bloodGroupData($request);

   /**
     * get the request data
     * @param $request, $id
     * @return $data
     */
    public function saveBloodGroupData($request, $id = null);

    /**
     * get the department by id
     * @param $id
     * @return $blood_group
     */
    public function getBloodGroupData($id);

    /**
     * get the department by id
     * @param $id
     * @return $blood_group
     */
    public function deleteBloodGroup($id);

    /**
     * get the blood_group by id
     * @param $id
     * @return $blood_group
     */
    public function bloodGroupStatusChange($request);
}
