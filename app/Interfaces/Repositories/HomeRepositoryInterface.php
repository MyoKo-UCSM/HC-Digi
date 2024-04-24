<?php

namespace App\Interfaces\Repositories;

interface HomeRepositoryInterface
{
    /**
     * get the home data
     * @param $request
     * @return $home
     */
    public function getHomeIndex();

    /**
     * get the request data
     * @param $request
     * @return $data
     */

    public function saveHomeData($request);
}
