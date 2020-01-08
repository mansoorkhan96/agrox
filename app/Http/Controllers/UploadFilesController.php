<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Filetype;

class UploadFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['filetypes'] = Filetype::pluck('filetype', 'id');

        $data['images'] = File::where('filetype_id', '5')->get()->toArray();

        return view('file_upload.index')->with($data);
    }

    public function fetchByFiletype(Request $request) {
        $data['filetypes'] = Filetype::pluck('filetype', 'id');

        
        $data['title'] = Filetype::where('id', $request->input('filetype'))->pluck('filetype');

        $data['files'] = File::where('filetype_id', $request->input('filetype'))->get()->toArray();

        return view('file_upload.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['filetypes'] = Filetype::pluck('filetype', 'id');
        return view('file_upload.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'filetype' => 'present|required',
            'file' => 'present|required|file'
        ]);

        if($request->input('filetype') == 'pdf-file') {
            $this->validate($request, [
                'file' => 'mimetypes:application/pdf'
            ], ['mimetypes' => 'The file must be a file of type: PDF']);

            $filetype_id = 1;
            $path = 'pdf';

        } elseif($request->input('filetype') == 'ms-word') {
            $this->validate($request, [
                'file' => 'mimetypes:application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'
            ], ['mimetypes' => 'The file must be a file of type: Microsoft Word']);

            $filetype_id = 2;
            $path = 'ms-word';

        } elseif($request->input('filetype') == 'ms-excel') {
            $this->validate($request, [
                'file' => 'mimetypes:application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ], ['mimetypes' => 'The file must be a file of type: Microsoft Excel']);

            $filetype_id = 3;
            $path = 'ms-excel';

        } elseif($request->input('filetype') == 'ms-ppt') {
            $this->validate($request, [
                'file' => 'mimetypes:application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation'
            ], ['mimetypes' => 'The file must be a file of type: Microsoft PowerPoint']);

            $filetype_id = 4;
            $path = 'ms-powerpoint';

        } elseif($request->input('filetype') == 'image') {
            $this->validate($request, [
                'file' => 'image'
            ]);

            $filetype_id = 5;
            $path = 'images';

        }


        $filenameWithExt = $request->file('file')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        $extention = $request->file('file')->getClientOriginalExtension();
        $filenameToStore = $filename . '_' . time() . '.' . $extention;

        $request->file('file')->storeAs('public/' . $path, $filenameToStore);

        $file = new File;
        $file->filetype_id = $filetype_id;
        $file->filename = $filename;
        $file->path = $path. '/' . $filenameToStore;

        if($file->save()) {
            return redirect('files/create')->with('success', 'File Uploaded Successfully');
        }

        return redirect('files/create')->with('error', 'Failed! Could not upload file');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
