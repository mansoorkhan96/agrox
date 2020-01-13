<?php

namespace App\Http\Controllers;

use App\Category;
use App\Consultancy;
use App\Http\Controllers\Controller;
use App\PrivateMessage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        if(auth()->user()->role_id != 1 && auth()->user()->role_id != 3) {

            $consultancies = Consultancy::where('consumer', auth()->user()->id)->get();
            $inbox = PrivateMessage::where('consultancy_id', $this->consultancy_id($consultancies))->latest()->with('from')->get()->toArray();

            $to = $this->findConsultant($consultancies->toArray());

        } else if(auth()->user()->role_id == 3) {

            $consultancies = Consultancy::where('consultant', auth()->user()->id)->get();
            $inbox = PrivateMessage::where('consultancy_id', $this->consultancy_id($consultancies))->with('from')->latest()->get();

        } else if(auth()->user()->role_id == 1) {
            //optinal
            $consultancies = Consultancy::all();
            $inbox = PrivateMessage::where('consultancy_id', $this->consultancy_id($consultancies))->latest()->get();

        }

        $consultants = User::where('role_id', 3)->pluck('name', 'id');
        $categories = Category::pluck('name', 'id');

        return view('consultancy.index', compact(['consultancies', 'inbox', 'consultants', 'categories', 'to']));
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
        $data = request()->validate([
            'category_id' => ['required'],
            'consultant' => ['required'],
            'title' => ['required'],
            'description' => ['required']
        ]);

        $data['consumer'] = auth()->user()->id;

        if(Consultancy::create($data)) {
            return back()->with('success', 'Thread request submitted successfully!');
        }

        return back()->with('success', 'Could not Submit Thread Request!');
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

    private function consultancy_id($consultancies) {
        if(request()->topic) {
            $consultancy_id = request()->topic;
        } else {
            $consultancy_id = $consultancies[0]->id;
        }

        return $consultancy_id;
    }

    private function findConsultant($consultancies) {
        if(request()->topic) {
            $GLOBALS['only'] = null;

            $consultant = array_map(function($item) {
                if($item['id'] == request()->topic) {
                    $GLOBALS['only'] = $item['consultant'];
                    return;
                }
            }, $consultancies);

            return $GLOBALS['only'];
            
        } else {
            $consultant = $consultancies[0]['consultant'];
        }

        return $consultant;
    }
}
