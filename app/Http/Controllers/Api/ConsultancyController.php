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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * recipient of the message
         * 
         * [type] @int
         * 
         */
        $to = null;

        /**
         * consultant (the accepter of the thread)
         * 
         * [type] @int
         * 
         */
        $accepter = null;

        /**
         * an array that contains all the messages for a perticular topic
         * 
         * [type] @array
         * 
         */
        $inbox = [];
        $consultancies = Consultancy::latest()->get();

        if(auth()->user()->role_id != 1 && auth()->user()->role_id != 3) {

            $consultancies = Consultancy::latest()->where('consumer', auth()->user()->id)->get();
            
            if(! $consultancies->isEmpty()) {
                $inbox = PrivateMessage::where('consultancy_id', $this->consultancy_id($consultancies))->latest()->with(['from', 'consultancies'])->get()->toArray();
            }

            if(! $consultancies->isEmpty()) {
                $to = $this->findConsultant($consultancies->toArray());
                $accepter = $this->findConsultant($consultancies->toArray());
            }

        } else if(auth()->user()->role_id == 3) {

            $consultancies = Consultancy::latest()->where('consultant', auth()->user()->id)->get();

            if(! $consultancies->isEmpty()) {
                $inbox = PrivateMessage::where('consultancy_id', $this->consultancy_id($consultancies))->with(['from', 'consultancies'])->latest()->get()->toArray();
            }

            if(! $consultancies->isEmpty()) {
                $to = $this->findConsumer($consultancies->toArray());
                $accepter = $this->findConsultant($consultancies->toArray());
            }
        }

        $consultants = User::where('role_id', 3)->pluck('name', 'id');
        $categories = Category::pluck('name', 'id');

        return view('consultancy.index', compact(['consultancies', 'inbox', 'consultants', 'categories', 'to', 'accepter']));
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
    public function destroy(Consultancy $consultancy)
    {
        PrivateMessage::where('consultancy_id', $consultancy->id)->delete();
        $consultancy->delete();

        return back()->with('success', 'Thread Deleted with all messages');
    }

    /**
     * Accept the specified Consultancy.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accept(Consultancy $consultancy)
    {
        $consultancy->status = 'Accepted';
        $consultancy->save();

        return back()->with('success', 'Thread request accepted!');
    }

    /**
     * Accept the specified Consultancy.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reject(Consultancy $consultancy)
    {
        $consultancy->status = 'Rejected';
        $consultancy->save();

        return back()->with('success', 'Thread request rejected!');
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
            $GLOBALS['consultant'] = null;

            $consultant = array_map(function($item) {
                if($item['id'] == request()->topic) {
                    $GLOBALS['consultant'] = $item['consultant'];
                    return;
                }
            }, $consultancies);

            return $GLOBALS['consultant'];
            
        } else {
            $consultant = $consultancies[0]['consultant'];
        }

        return $consultant;
    }

    private function findConsumer($consultancies) {
        if(request()->topic) {
            $GLOBALS['consumer'] = null;

            $consultant = array_map(function($item) {
                if($item['id'] == request()->topic) {
                    $GLOBALS['consumer'] = $item['consumer'];
                    return;
                }
            }, $consultancies);

            return $GLOBALS['consumer'];
            
        } else {
            return $consultancies[0]['consumer'];
        }
    }
}
