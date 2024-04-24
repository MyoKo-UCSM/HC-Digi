<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\LocationRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LocationFormRequest;

class LocationController extends Controller
{
    public $page = 'location';
    private LocationRepositoryInterface $locationRepository;

    public function __construct(LocationRepositoryInterface $locationRepository)
    {
        //$this->middleware('role:admin');
        $this->locationRepository = $locationRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $this->page;
        return view('admin.location.index', compact('page'));
    }

    public function getLocation(Request $request)
    {
        return $this->locationRepository->getAllLocationList($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $page = $this->page;
        return view('admin.location.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationFormRequest $request){
        $this->locationRepository->saveLocationData($request);
        return redirect('admin/location')->with('flash_message', 'Location added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page  = $this->page;
        $location  = $this->locationRepository->getLocationData((string) $id);

        return view('admin.location.edit', compact('location','page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationFormRequest $request, string $id)
    {
        $this->locationRepository->saveLocationData($request, $id);

        return redirect('admin/location')->with('flash_message', 'Location updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->locationRepository->deleteLocation((string) $id);

        return redirect('admin/location')->with('flash_message', 'Location deleted!');
    }
    
    public function statusChange(Request $request)
    {
        Log::info("Location Status");
        $location = $this->locationRepository->locationStatusChange($request);

        return response()->json(["success" => true]);
    }
    
}
