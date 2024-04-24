<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\SubCategoryRepositoryInterface;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public $page = 'sub_category';
    private SubCategoryRepositoryInterface $subCategoryRepository;

    public function __construct(SubCategoryRepositoryInterface $subCategoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page  = $this->page;
        return view('admin.sub-categories.index', compact('page'));
    }

    public function getSubCategory(Request $request)
    {
        return $this->subCategoryRepository->getAllSubCategoryList($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = $this->categoryRepository->createCategory();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->subCategoryRepository->saveSubCategoryData($request);

        return redirect('admin/sub-categories')->with('flash_message', 'Sub Category added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sub_category = $this->subCategoryRepository->getSubCategoryData($id);

        return response()->json([
            'id'                => $sub_category->id,
            'sub_category_name' => $sub_category->sub_category_name,
            'category_id'       => $sub_category->category_id,
            'description'       => $sub_category->description,
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->subCategoryRepository->saveSubCategoryData($request, $id);

        return redirect('admin/sub-categories')->with('flash_message', 'Sub Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->subCategoryRepository->deleteSubCategory($id);

        return redirect('admin/sub-categories')->with('warning', 'Sub Category deleted!');
    }

    public function statusChange(Request $request)
    {
        $sub_category = $this->subCategoryRepository->subCategoryStatusChange($request);

        return response()->json(["success" => true]);
    }
}
