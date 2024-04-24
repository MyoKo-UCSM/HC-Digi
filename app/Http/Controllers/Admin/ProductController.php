<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $page = 'product';
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        //$this->middleware('role:admin');
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $this->page;
        return view('admin.product.index', compact('page'));
    }

    public function getUnit(Request $request)
    {
        return $this->productRepository->getAllUnitList($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $page = $this->page;
        return view('admin.product.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $this->productRepository->saveProductData($request);
        return redirect('admin/unit')->with('flash_message', 'Unit added!');
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
        $page       = $this->page;
        $unit = $this->productRepository->getUnitData($id);

        return view('admin.product.edit', compact('unit', 'page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->productRepository->saveProductData($request, $id);

        return redirect('admin/unit')->with('flash_message', 'Unit updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->productRepository->deleteUnit($id);

        return redirect('admin/unit')->with('flash_message', 'Unit deleted!');
    }

    public function statusChange(Request $request)
    {
        $unit = $this->productRepository->unitStatusChange($request);

        return response()->json(["success" => true]);
    }
}

