<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }


    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        return view('admin.users.show',[
            'user'=>$user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }


    public function userProfile(){
        $id=Auth::user()->id;

        $adminData=User::find($id);
        return view('users.admin_profile',compact('adminData'));
    }
    public function userDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function userProfileStore(Request $request)
    {
        $id = Auth()->user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('upload/user_images'), $photoName);
            $data->photo = $photoName;
        }

        $data->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    // public function userDestroyProfileStore(Request $request)
    // {
    //     $id = Auth()->user()->id;
    //     $data = User::find($id);
    //     $data->firstname = $request->firstname;
    //     $data->lastname = $request->lastname;
    //     $data->email = $request->email;

    //     // Handle photo upload
    //     if ($request->hasFile('photo')) {
    //         $photo = $request->file('photo');
    //         $photoName = time() . '.' . $photo->getClientOriginalExtension();
    //         $photo->move(public_path('upload/user_images'), $photoName);
    //         $data->photo = $photoName;
    //     }

    //     $data->save();

    //     return redirect()->back()->with('success', 'Profile updated successfully!');
    // }
    public function userChangePassword(){
        return view('users.admin_change_password');
    }
    public function userUpdatePassword(Request $request){
        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required|confirmed'
        ]);
        if(!Hash::check($request->old_password,auth::user()->password)){
            return back()->with("error","old password doesn't match!");
        }
        User::whereId(auth()->user()->id)->update([
            'password'=>hash::make($request->new_password)
        ]);
        return back()->with("status","password changes successfully");
    }
}
