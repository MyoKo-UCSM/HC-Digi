<?php

namespace App\Interfaces\Repositories;

interface GradeRepositoryInterface
{
    /**
     * get the grade list
     * @param $request
     * @return $data
     */
    public function getAllGradeList($request);

    /**
     * get the grade list
     * @param $request
     * @return $grade data
     */

    public function gradeData($request);

    /**
     * get the request data
     * @param $request, $id
     * @return $data
     */
    public function saveGradeData($request, $id = null);

    /**
     * get the grade by id
     * @param $id
     * @return $grade
     */
    public function getGradeData($id);

      /**
     * get the request list
     * @param $request
     * @return $data
     */
    public function createGrade();
    
    /**
     * get the grade by id
     * @param $id
     * @return $grade
     */
    public function deleteGrade($id);

    /**
     * get the request data
     * @param $id
     * @return $grade
     */
    public function gradeStatusChange($request);
}
