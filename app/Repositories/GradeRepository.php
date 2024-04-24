<?php

namespace App\Repositories;

use App\Interfaces\Repositories\GradeRepositoryInterface;
use App\Models\Grade;
use App\Models\Position;
use Yajra\Datatables\Datatables;
// use Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class GradeRepository implements GradeRepositoryInterface
{
    public function getAllGradeList($request)
    {
        $grade = $this->gradeData($request);

        $datatables = DataTables::of($grade)
            ->addIndexColumn()
            ->addColumn('no', function ($grade) {
                return '';
            })
            ->editColumn('status', function ($grade) {

                $status_change = '';
                $status_change .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route = "'" . route('admin.grade.status.change') . "'";
                if ($grade->status) {
                    $status_change .= '<input data-id="' . $grade->id . '" onclick="statusChange(' . $grade->id . ',' . $route . ')"
                                class="form-check-input" type="checkbox" style="width : 3rem;"
                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                data-on="1" data-off="0" checked >';
                    $status_change .= '</div>';
                } else {
                    $status_change .= '<input data-id="' . $grade->id . '" onclick="statusChange(' . $grade->id . ',' . $route . ')"
                                class="form-check-input" type="checkbox" style="width : 3rem;"
                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                data-on="1" data-off="0"  >';
                    $status_change .= '</div>';

                }

                return $status_change;
            })
            ->editColumn('updated_at', function ($grade) {
                $user_name    = $grade->updateUser ? $grade->updateUser->name : ($grade->createUser ? $grade->createUser->name : '');
                $updated_user = '';
                $updated_user .= "<span class='fw-bolder'>" . $user_name . "</span></br>";
                $updated_user .= "<span>" . $grade->updated_at . "</span>";
                return $updated_user;
            })
            ->addColumn('action', function ($grade) {
                $btn = '';

                $btn .= ' <a href="' . route('grade.edit', $grade->id) . '" title="Edit grade"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                $btn .= '<form action="' . route('grade.destroy', $grade->id) . '" method="POST" style="display:inline" class="deleteForm">
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

    public function gradeData($request)
    {
        $search = $request->search;
        $status = $request->status == null ? 'all' : $request->status;

        $data = Grade::orderBy('sort_order')->with(['createUser', 'updateUser'])->select('*');

        if ($search) {
            $data->where('grade_name', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%");
        }

        if (isset($status) && $status != 'all') {
            $data->where('status', $status);
        }

        return $data->get();

    }

    public function createGrade()
    {
        $grades = Grade::select('id', 'position_title')->get();
        $grades = $grades->pluck('position_title', 'id');

        return $grades;
    }
    
    public function saveGradeData($request, $id = null)
    {
        try {
            $requestData = $request->all();
            if ($id) {
                $requestData['updated_by'] = auth()->user()->id;
                $grade                    = Grade::findOrFail($id);
                $grade->update($requestData);
            } else {
                $requestData['created_date'] = now();
                $requestData['created_by']   = auth()->user()->id;
                $grade                      = Grade::create($requestData);
            }    
            return $grade;
        }catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                // Unique constraint violation occurred
                Log::error('Error saving grade data: ' . $e->getMessage());
                // Return an error response
                return response()->json(['error' => 'Grade name already exists'], 422);
            }
            // Handle other types of exceptions
            Log::error('Error saving grade data: ' . $e->getMessage());
            // Return an error response
            return response()->json(['error' => 'Error saving grade data'], 500);
        }
    }    

    public function getGradeData($id)
    {
        return Grade::findOrFail($id);
    }

    public function deleteGrade($id)
    {
        return Grade::destroy($id);
    }

    public function gradeStatusChange($request)
    {
        $grade = Grade::findOrFail($request->id);
        $grade->update(['status' => !$grade->status]);

        return $grade;
    }
}
