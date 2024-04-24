<?php

namespace App\Repositories;

use App\Interfaces\Repositories\LocationRepositoryInterface;
use App\Models\Location;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Log;
use Illuminate\Support\Facades\Validator;

class LocationRepository implements LocationRepositoryInterface
{
    public function getAllLocationList($request)
    {
        $locations = $this->locationData($request);

        $datatables = DataTables::of($locations)
            ->addIndexColumn()
            ->addColumn('no', function ($locations) {
                return '';
            })
            ->editColumn('status', function ($locations) {
                $status_change = '';
                $status_change .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route = "'" . route('admin.location.status.change') . "'";
                $id = (string) $locations->id;
                
                if ($locations->status) {
                    $status_change .= '<input data-id="' . $id . '" onclick="statusChange(' . $id . ',' . $route . ')"
                                class="form-check-input" type="checkbox" style="width : 3rem;"
                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                data-on="1" data-off="0" checked >';
                    $status_change .= '</div>';
                } else {
                    $status_change .= '<input data-id="' . $id . '" onclick="statusChange(' . $id . ',' . $route . ')"
                                class="form-check-input" type="checkbox" style="width : 3rem;"
                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                data-on="1" data-off="0"  >';
                    $status_change .= '</div>';
                }

                return $status_change;
            })
            ->addColumn('action', function ($locations) {
                $btn = '';

                $btn .= ' <a href="' . route('location.edit', $locations) . '" title="Edit Location"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                $btn .= '<form action="' . route('location.destroy', $locations->id) . '" method="POST" style="display:inline" class="deleteForm">
                                                ' . csrf_field() . '' . method_field("DELETE") . '
                                                    <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px show_confirm_delete"
                                                    ><i class="bi bi-trash"></i></a>
                                                </form>
                                            </div>';

                return "<div class='action-column hidden'>" . $btn . "</div>";

            })
            ->rawColumns(['status','action']);

        return $datatables->make(true);
    }

    public function locationData($request)
    {
        $search = $request->search;
        $data   = Location::orderBy('sort_order')->select('id', 'location_name','location_code','sort_order','description','status');

        if ($search) {
            $data->where('location_name', 'LIKE', "%$search%")->orWhere('location_code', 'LIKE', "%$search%");
        }

        return $data->get();
    }
    
    public function saveLocationData($request, $id = null)
    {
        
        if ($id) {
            $data = Location::findOrFail($id);
            $data->updated_by = auth()->user()->id;
            $data->update($request->all());
        } else {
            $data = new Location($request->all());
            $data->id = Str::uuid();

            $data->created_date = now();
            $data->created_by  = auth()->user()->id;

            if ($request->has('sort_order')  && $request->sort_order !== null) {
                $sortOrder = $request->input('sort_order');
            } else {
                $maxSortOrder = Location::max('sort_order');
                $sortOrder = $maxSortOrder ? $maxSortOrder + 1 : 1;
            }
            $data->sort_order = $sortOrder;
            $data->save();
        }

        return $data;
        
    }

    public function getLocationData($id)
    {
        return Location::findOrFail($id);
    }

    public function deleteLocation($id)
    {
        return Location::destroy($id);
    }

    // public function locationStatusChange($request)
    // {
    //     $location = Location::findOrFail($request->id);
    //     $location->update(['status' => !$location->status]);

    //     return $location;
    // }

    

    public function locationStatusChange($request)
    {
        // Assuming the request contains the UUID of the location
        $locationUuid = $request->id;
        
        // Find the location by UUID
        $location = Location::where('id', $locationUuid)->firstOrFail();
        
        // Update the status
        $location->update(['status' => !$location->status]);

        return $location;
    }

}
