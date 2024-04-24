<?php

namespace App\Interfaces\Repositories;

interface EmployeeRepositoryInterface
{
    /**
     * get the employee list
     * @param $request
     * @return $data
     */
    public function getAllEmployeeList($request);

    /**
     * get the committee list
     * @param $request
     * @return $employees data
     */

    public function employeeData($request);

     /**
     * get the request list
     * @param $request
     * @return $data
     */
    public function createEmployee();    

    /**
     * get the request data
     * @param $request, $id
     * @return $data
     */
    public function saveEmployeeData($request, $id = null);

    /**
     * get the employee by id
     * @param $id
     * @return $employee
     */
    public function getEmployeeData($id);

    /**
     * get the committee by id
     * @param $id
     * @return $employee
     */
    public function deleteEmployee($id);

    /**
     * get the request data
     * @param $id
     * @return $employee
     */
    public function employeeStatusChange($request);


    /**
     * get sub employee
     * @param Employee:$id
     * @return $employee
     */
    public function getEmployeeByDepartmentId($id);

}