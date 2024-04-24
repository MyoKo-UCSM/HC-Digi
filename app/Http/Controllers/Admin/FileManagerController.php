<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class FileManagerController extends Controller
{
    public $page = 'filemanager';

    public function filemanager()
    {
        $page = $this->page;
        
        return view('admin.filemanager.index', compact('page'));
    }
}
