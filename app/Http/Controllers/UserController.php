<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404);
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
        $validated = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $slug = $validated['firstname'] . ' ' . $validated['lastname'] . ' ' . str()->random(10);
        $validated['slug'] = str()->of($slug)->slug('-')->lower();
        
        User::create($validated);

        return redirect('login')->with('success-login', 'Registrasi berhasil! Silakan login untuk melanjutkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profile.index', [
            'user' => User::where('slug', $user->slug)->firstOrFail(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('profile.edit', [
            'user' => User::where('slug', $user->slug)->firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {

        $data = [
            'firstname' =>'required',
            'lastname' =>'required',
        ];

        if($request->email != auth()->user()->email){
            $data['email'] = 'required|unique:users';
        }
        
        $validated = $request->validate($data);
        $validated['bio'] = htmlspecialchars($request->bio);
    
        $success = User::where('slug', $user)
                ->update($validated);

        if($success) {
            return redirect('user/'. auth()->user()->slug)->with('success-edit-profile', 'Berhasil update profile');
        } else {
            echo abort(400);
        }
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

    public function changePassword(Request $request, User $user)
    {
        
        if(Hash::check($request->password, auth()->user()->password)){
            $validated = $request->validate([
                'new-password' => 'required|min:8|confirmed',
                'new-password_confirmation' => 'required|min:8',
            ]);
            
            $validated['new-password'] = Hash::make($validated['new-password']);
    
            $result = User::where('slug', $user->slug)->update(['password' => $validated['new-password'] ]);
    
            if($result){
                return redirect()->back()->with('success-change-password', 'Your password has been changed.');
            } else {
                dd($user->slug);
            }
        } else {
            return redirect()->back()->with('failed-password', 'Failed to verify your old password');
        }
    }

    public function changePhoto(Request $request, User $user)
    {
        $validated = $request->validate([
            'profile_photo' => 'required|image|file|mimes:jpg,png|max:1024',
        ]);

        if(auth()->user()->photo != 'profile-photo/user.jpg'){
            Storage::delete(auth()->user()->photo);
        }
        
        $validated['profile_photo'] = $request->file('profile_photo')->store('profile-photo');

        User::where('slug', $user->slug)->update(['photo' => $validated['profile_photo']]);

        return redirect()->back()->with('success-change-photo', 'Your profile photo has been changed.');
    }
}
