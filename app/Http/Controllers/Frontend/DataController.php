<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function data()
    {
        $getDataUser = User::groupBy('created_at')
                            ->select('created_at', DB::raw('count(*) as total'))
                            ->get();
        
        return view('data', compact('getDataUser'));
    }

    public function storeDataName(Request $request)
    {           
        $request->validate([
            'file' => 'required|mimes:csv,xlsx'
        ]);

        $file = $request->file('file');

        Excel::import(new UsersImport, $file);        
            
        return redirect()->back()->with('success', 'Data imported successfully!');
    }

    public function updateDataEmail(Request $request)
    {
        
    }
}
