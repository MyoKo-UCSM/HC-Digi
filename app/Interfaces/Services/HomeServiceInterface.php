<?php

namespace App\Interfaces\Services;

interface HomeServiceInterface
{
    /**
     * get the our theme form
     * @param $request
     * @return $html form
     */

    public function getOurTheme($request);

    /**
     * get the organized form
     * @param $request
     * @return $html form
     */

    public function getOrganizedBy($request);

    /**
     * get the co organized form
     * @param $request
     * @return $html form
     */

    public function getCoOrganizedBy($request);

    /**
     * get the sponsored form
     * @param $request
     * @return $html form
     */

    public function getSponsoredBy($request);

    /**
     * get the speaker form
     * @param $request
     * @return $html form
     */

    public function getSpeaker($request);
}
