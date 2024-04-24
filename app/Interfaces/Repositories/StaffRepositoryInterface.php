<?php

namespace App\Interfaces\Repositories;

interface StaffRepositoryInterface
{
    /**
     * get the staff list
     * @param $request
     * @return $data
     */
    public function getAllStaffList($request);

    /**
     * get the staff list
     * @param $request
     * @return $staff data
     */

    public function staffData($request);

    /**
     * get the request data
     * @param $request, $id
     * @return $data
     */
    public function saveStaffData($request, $id = null);

    /**
     * get the staff by id
     * @param $id
     * @return $staff
     */
    public function getStaffData($id);

      /**
     * get the request list
     * @param $request
     * @return $data
     */
    public function createStaff();
    
    /**
     * get the staff by id
     * @param $id
     * @return $staff
     */
    public function deleteStaff($id);

    /**
     * get the request data
     * @param $id
     * @return $staff
     */
    public function staffStatusChange($request);
}
