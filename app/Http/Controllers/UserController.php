<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = Status::all();

        if ($request->has('search')) {
            $data = User::with('status')->where('name', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = User::with('status')->where('status_id', '!=', 1)
                ->latest()
                ->paginate(5);
        }

        return view('management_users.user.v_user', compact('data', 'status'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',

        ]);


        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'status_id' => $request['status'],
            'password' => Hash::make($request['password']),
        ]);


        return redirect()->route('user.index')->with('succes', 'Add data success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        $data->password = Hash::make(
            'Aeroasia1'
        );
        $data->update();

        return redirect()->route('user.index')->with('succes', 'Update success');
    }

    public function change_password()
    {
        return view('user_setting.change_password');
    }

    public function update_password()
    {
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'confirmed'],
        ]);

        $currentPassword = Auth::user()->password;
        $old_password = request('old_password');
        $id = Auth::user()->id;

        if (Hash::check($old_password, $currentPassword)) {
            // Auth::user()->update([
            //     'password' => Hash::make(request('password'))
            // ]);

            $data = User::find($id);
            $data->password = Hash::make(
                request('password')
            );
            $data->update();

            return back()->with('success', 'You change your password');
        } else {

            return back()->withErrors(['old_password' => 'You have to fill you old password']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('modal.edit_user', compact($id));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',

        ]);

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->status_id = $request->status;
        $data->update();

        return redirect()->route('user.index')->with('succes', 'Updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('succes', 'Delete success');
    }

    public function user_setting()
    {
        return view('user_setting.user_setting');
    }
}
