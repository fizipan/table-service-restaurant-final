<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) 
        {
            $query = User::with('role');

            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle mr-1 mb-1" data-toggle="dropdown">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="'. route('users.edit', $item->id) .'">
                                    Edit
                                </a>
                                <form action="'. route('users.destroy', $item->id) .'" method="post">
                                    '. csrf_field() .'
                                    '. method_field('DELETE') .'
                                    <button type="submit" class="text-danger dropdown-item">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            })
            ->editColumn('photo', function($item){
                return $item->photo ?  '<img style="max-height:45px;" src="'. Storage::url($item->photo) .'">' : '';
            })
            ->rawColumns(['action', 'photo'])
            ->make()
            ;    
        }

        return view('pages.admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('pages.admin.users.create', [
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('assets/user', 'public');
        $data['password'] = Hash::make($request->password);

        User::create($data);
        return redirect()->route('users.index');
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
        $roles = Role::all();
        $user = User::with('role')->where('id', $id)->firstOrFail();
        return view('pages.admin.users.edit', [
            'roles' => $roles,
            'user' => $user,
        ]);
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
            'name' => 'required|string|max:255',
            'roles_id' => 'required|exists:roles,id',
            'photo' => 'image',
        ]);

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('assets/user', 'public');
        } else {
            unset($data['photo']);
        }

        $user = User::findOrFail($id);

        $user->update($data);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('users.index');
    }
}
