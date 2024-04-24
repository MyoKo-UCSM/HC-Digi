<?php

namespace App\Interfaces\Repositories;

interface LocationRepositoryInterface
{
    /**
     * get the news list
     * @param $request
     * @return $data
     */
    public function getAllLocationList($request);

    /**
     * get the permission list
     * @param $request
     * @return $permissions data
     */

     public function locationData($request);

   /**
     * get the request data
     * @param $request, $id
     * @return $data
     */
    public function saveLocationData($request, $id = null);

    /**
     * get the JobLocation by id
     * @param $id
     * @return $JobLocation
     */
    public function getLocationData($id);

    /**
     * get the JobLocation by id
     * @param $id
     * @return $JobLocation
     */
    public function deleteLocation($id);

    public function locationStatusChange($request);
}
