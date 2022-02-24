<?php

namespace App\Http\Controllers;

use App\Exports\CertificateExport;
use App\Models\Category;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->has('search')) {
            $datas = Certificate::where('batch', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $datas = Certificate::latest()->paginate(5);
        }

        return view('management_certificate.certificate.v_certificate', compact('datas', 'categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'files' => 'required',
            'category' => 'required',
            'upload_by' => 'required',
            'files.*' => 'mimes:pdf'
        ]);


        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $key => $file) {
                $name = $file->getClientOriginalName();
                $batch = pathinfo($name, PATHINFO_FILENAME);
                $folder = 'certificates/';
                $patch = $file->move($folder, $name);
                $upload_by = $request->input('upload_by');

                $insert[$key]['nama_document'] = $batch;
                $insert[$key]['category_id'] = $request->input('category');
                $insert[$key]['path'] = $patch;
                $insert[$key]['upload_by'] = $upload_by;
                $insert[$key]['created_at'] = date('Y-m-d H:i:s');
            }

            Certificate::insert($insert);

            return redirect()->route('certificate.index')->with('succes', 'Document berhasil diupload');
        } else {
            return redirect()->route('certificate.index')->with('error', 'Multiple File has been uploaded Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        $categories = Category::all();
        return view('management_certificate.certificate.edit', compact('certificate', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Certificate::find($id);
        $data->nama_document = $request->batch;
        $data->category_id = $request->category;
        $data->update();

        return redirect()->route('certificate.index')->with('succes', 'Edit success');
    }

    public function export()
    {
        return Excel::download(new CertificateExport, 'certificate.xlsx');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        File::delete($certificate->path);

        return redirect()->route('certificate.index');
    }
}
