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

class ProfilesController extends Controller
{
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
        return view('profiles.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $proficiencies = Proficiency::pluck('proficiency', 'id');

        $roles = Role::pluck('name', 'id');

        $countries = Country::pluck('name', 'id');

        $provinces = Province::pluck('name', 'id');

        $cities = City::pluck('name', 'id');

        return view('profiles.edit', compact(['user', 'proficiencies', 'roles', 'countries', 'provinces', 'cities']));
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
