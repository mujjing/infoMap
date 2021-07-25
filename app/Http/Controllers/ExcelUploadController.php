<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ExcelImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;
use DB;

class ExcelUploadController extends Controller
{
    function index()
    {
        $data = DB::table('map')->orderBy('id', 'DESC')->paginate(10);
        return view('excelUpload/list', compact('data'));
    }

    function excel(Request $request)
    {
        $this->validate($request, [
            'file'  => 'required|mimes:xls,xlsx'
        ]);
        $file = $request->file;
        Excel::import(new ExcelImport, $file);
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function update($id)
    {
        $data = DB::table('map')->where('id', $id)->first();
        return view('excelUpload/update', compact('data'));
    }

    public function updateSubmit(Request $request)
    {
        $validate_rule = [
            'id'                            => ['nullable', 'integer'],
            'Location'                      => ['nullable', 'string'],
            'Address'                       => ['nullable', 'string'],
            'Latitude'                      => ['nullable'],
            'Longitude'                     => ['nullable'],
            'note'                          => ['nullable', 'integer'],
            ];
            
            $this->validate($request, $validate_rule);

        $data = [
            'Location'                      => $request->Location,
            'Address'                       => $request->Address,
            'Latitude'                      => $request->Latitude,
            'Longitude'                     => $request->Longitude,
            'note'                          => $request->note,
        ];

        DB::table('map')
            ->where('id', $request->id)
            ->update($data);
        return redirect()->route('excel.index');
    }

    public function allDelete() {

        DB::table('map')->delete();
        return redirect()->route('excel.index');
    }

    public function delete(Request $request) {
        DB::table('map')
            ->where('id', $request->id)
            ->delete();
        return redirect()->route('excel.index');
    }
}
