<?php

namespace App\Interfaces\Repositories;

interface MemberRepositoryInterface
{
    /**
     * get the member list
     * @param $request
     * @return $data
     */
    public function getAllMemberList($request);

    /**
     * get the member list
     * @param $request
     * @return $member data
     */

    public function memberData($request);

    /**
     * get the request data
     * @param $request, $id
     * @return $data
     */
    public function saveMemberData($request, $id = null);

    /**
     * get the member by id
     * @param $id
     * @return $member
     */
    public function getMemberData($id);

    /**
     * get the member by id
     * @param $id
     * @return $member
     */
    public function deleteMember($id);

    /**
     * get the request data
     * @param $id
     * @return $member
     */
    public function memberStatusChange($request);

}
