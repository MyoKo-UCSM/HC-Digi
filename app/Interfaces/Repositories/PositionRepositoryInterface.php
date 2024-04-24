<?php

namespace App\Interfaces\Repositories;

interface PositionRepositoryInterface
{
    /**
     * get the position list
     * @param $request
     * @return $data
     */
    public function getAllPositionList($request);

    /**
     * get the committee list
     * @param $request
     * @return $positions data
     */

    public function positionData($request);

     /**
     * get the request list
     * @param $request
     * @return $data
     */
    public function createPosition();    

    /**
     * get the request data
     * @param $request, $id
     * @return $data
     */
    public function savePositionData($request, $id = null);

    /**
     * get the position by id
     * @param $id
     * @return $position
     */
    public function getPositionData($id);

    /**
     * get the committee by id
     * @param $id
     * @return $position
     */
    public function deletePosition($id);

    /**
     * get the request data
     * @param $id
     * @return $position
     */
    public function positionStatusChange($request);


    /**
     * get sub department
     * @param Department:$id
     * @return $department
     */
    public function getPositionByDepartmentId($id);

}