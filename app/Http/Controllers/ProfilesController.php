<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;
use App\Like;
use App\Post;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $userPostCount = Post::where('user_id', $user->id)->count();
    
        $userPostLikeCount = collect(Post::where('user_id', $user->id)->withCount('likes')->get()->toArray())->sum('likes_count');

        $location = $user->city()->get()->toArray();

        $location = Arr::collapse($location);

        $proficiency = null;
        if($user->proficiency) {
            $proficiency = $user->proficiency()->first()->proficiency;
        }
        
        return view('profiles.show', compact([
            'user',
            'proficiency',
            'location',
            'userPostCount',
            'userPostLikeCount',
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // if(auth()->user()->role_id != 1 && $user->id != auth()->user()->id) {
        //     abort(401);
        // }

        $this->authorize('update', $user);

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
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

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

        $user->update($data);

        return redirect()->route('profile.show', auth()->user()->id)->with('success', 'Profile Updated Successfully!');
    }
}
