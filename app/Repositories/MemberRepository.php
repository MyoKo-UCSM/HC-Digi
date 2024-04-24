<?php

namespace App\Repositories;

use App\Interfaces\Repositories\MemberRepositoryInterface;
use App\Models\Member;
use Yajra\Datatables\Datatables;

class MemberRepository implements MemberRepositoryInterface
{
    public function getAllMemberList($request)
    {
        $member = $this->MemberData($request);

        $datatables = DataTables::of($member)
            ->addIndexColumn()
            ->addColumn('no', function ($member) {
                return '';
            })
            ->editColumn('status', function ($member) {

                $status_change = '';
                $status_change .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route = "'" . route('admin.member.status.change') . "'";
                if ($member->status) {
                    $status_change .= '<input data-id="' . $member->id . '" onclick="statusChange(' . $member->id . ',' . $route . ')"
                                class="form-check-input" type="checkbox" style="width : 3rem;"
                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                data-on="1" data-off="0" checked >';
                    $status_change .= '</div>';
                } else {
                    $status_change .= '<input data-id="' . $member->id . '" onclick="statusChange(' . $member->id . ',' . $route . ')"
                                class="form-check-input" type="checkbox" style="width : 3rem;"
                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                data-on="1" data-off="0"  >';
                    $status_change .= '</div>';

                }

                return $status_change;
            })
            ->editColumn('updated_at', function ($member) {
                $user_name    = $member->updateUser ? $member->updateUser->name : ($member->createUser ? $member->createUser->name : '');
                $updated_user = '';
                $updated_user .= "<span class='fw-bolder'>" . $user_name . "</span></br>";
                $updated_user .= "<span>" . $member->updated_at . "</span>";
                return $updated_user;
            })
            ->addColumn('action', function ($member) {
                $btn = '';

                $btn .= ' <a href="' . route('member.edit', $member->id) . '" title="Edit Member"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                $btn .= '<form action="' . route('member.destroy', $member->id) . '" method="POST" style="display:inline" class="deleteForm">
                                                ' . csrf_field() . '' . method_field("DELETE") . '
                                                    <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px show_confirm_delete"
                                                    ><i class="bi bi-trash"></i></a>
                                                </form>
                                            </div>';

                return "<div class='action-column hidden'>" . $btn . "</div>";

            })
            ->rawColumns(['image', 'status', 'updated_at', 'action']);

        return $datatables->make(true);

    }

    public function memberData($request)
    {
        $search = $request->search;
        $status = $request->status == null ? 'all' : $request->status;

        $data = Member::with(['createUser', 'updateUser'])->select('*');

        if ($search) {
            $data->where('title', 'LIKE', "%$search%")
                ->orWhere('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('institution', 'LIKE', "%$search%");
        }

        if (isset($status) && $status != 'all') {
            $data->where('status', $status);
        }

        return $data->get();

    }

    public function saveMemberData($request, $id = null)
    {
        $requestData = $request->all();

        if ($id) {
            $requestData['updated_by'] = auth()->user()->id;
            $member                    = Member::findOrFail($id);
            $member->update($requestData);
        } else {
            $requestData['created_date'] = now();
            $requestData['created_by']   = auth()->user()->id;
            $member                      = Member::create($requestData);
        }

        return $member;
    }

    public function getMemberData($id)
    {
        return Member::findOrFail($id);
    }

    public function deleteMember($id)
    {
        return Member::destroy($id);
    }

    public function memberStatusChange($request)
    {
        $member = Member::findOrFail($request->id);
        $member->update(['status' => !$member->status]);

        return $member;
    }
}
