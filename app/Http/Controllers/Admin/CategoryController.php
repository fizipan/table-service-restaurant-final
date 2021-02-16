<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) 
        {
            $query = Category::query();

            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle mr-1 mb-1" data-toggle="dropdown">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="'. route('categories.edit', $item->slug) .'">
                                    Edit
                                </a>
                                <form action="'. route('categories.destroy', $item->slug) .'" method="post">
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
                return $item->photo ?  '<img class="w-25" src="'. Storage::url($item->photo) .'">' : '';
            })
            ->rawColumns(['action', 'photo'])
            ->make()
            ;    
        }

        return view('pages.admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['photo'] = $request->file('photo')->store('assets/category', 'public');

        Category::create($data);
        return redirect()->route('categories.index');
        
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
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('pages.admin.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'photo' => 'image',
        ]);

        $data['slug'] = Str::slug($request->name);
        
        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('assets/category', 'public');
        } else {
            unset($data['photo']);
        }

        $category = Category::where('slug',$slug)->firstOrFail();
        $category->update($data);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $category->delete();
        return redirect()->route('categories.index');
    }
}
