<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;
use App\Proficiency;
use App\Province;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProfilesController extends Controller
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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $location = $user->city()->get()->toArray();

        $location = Arr::collapse($location);

        return view('profiles.show', compact(['user', 'location']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if($user->id != auth()->user()->id) {
            abort(401, 'Cannot access this page!, Unauthorized Request');
        }

        $location = $user->city()->get()->toArray();

        $location = Arr::collapse($location);

        $proficiencies = Proficiency::pluck('proficiency', 'id');

        if(auth()->user()->role_id == 1) {
            $roles = Role::pluck('name', 'id');
        } else {
            $roles = Role::where('id', '!=', '1')->pluck('name', 'id');
        }

        $countries = Country::pluck('name', 'id');

        $provinces = Province::pluck('name', 'id');

        $cities = City::pluck('name', 'id');

        return view('profiles.edit', compact(['user', 'proficiencies', 'roles', 'countries', 'provinces', 'cities', 'location']));
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

        $data = $request->validate([
            'name' => ['required', 'string', 'max:190'],
            'role_id' => ['required', 'integer'],
            'city_id' => ['required', 'integer'],
            'bio' => ['nullable'],
            'address' => ['required'],
            'phone' => ['required'],
            'proficiency_id' => ['required', 'integer'],
            'avatar' => ['nullable', 'image', 'max:1990']
        ]);

        
        if(request()->hasFile('avatar')) {
            $data['avatar'] = request('avatar')->store('profiles', 'public');
        }

        auth()->user()->update($data);

        return redirect()->route('profile.show', auth()->user()->id)->with('success', 'Profile Updated Successfully!');
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
