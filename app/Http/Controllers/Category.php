<?php

namespace App\Http\Controllers;

use App\Models\Category_mdl;
use Illuminate\Http\Request;
// use App\Http\Requests\Category_req;

use Str;
use Session;

class Category extends Controller
{
    protected $mdlCategory;

    public function __construct()
    {
        $this->data['title'] = 'My Laravel Apps';
        // $this->data['currentMenu'] = 'catalog';
        // $this->data['currentSubMenu'] = 'category';
        // $this->data['statuses'] = Product_mdl::status();
        $this->mdlCategory = new Category_mdl;
    }

    public function index()
    {
        //--Models:
        // $dtCategories = Category_mdl::get();
        $dtCategories = Category_mdl::orderBy('id','DESC')->paginate(10);
        // dd($this->data);

        $this->data['pageTitle'] = 'Categories'; 
        $this->data['dtCategories'] = $dtCategories; 
        return view('categories.manage', $this->data);
        // return view('categories.v_index', $this->data);
    }

    public function create()
    {
        $dtCategories = null;
        $this->data['dtCategories'] = $dtCategories;
        $this->data['pageTitle'] = !empty($dtCategories) ? 'Update Category' : 'Add Category';

        return view('categories.form', $this->data);
    }

    // public function store(Category_req $request)
    public function store(Request $request)
    {
        // echo "string";die();
        $this->validate($request,[
            'categ_name'    => 'required',
            'parent_id'     => 'required',
        ]);

        $mdlCategory = new Category_mdl;

        $mdlCategory->name          = $request->categ_name;
        $mdlCategory->slug          = Str::slug($request->categ_name);
        $mdlCategory->parent_id     = (int) $request->parent_id;

        // dd($mdlCategory);
        $mdlCategory->save();

        return redirect('categories')->with('success', 'Well done, New data created!');
        // return redirect()->back()->with('success', 'Well done, New data created!');
        // $newID = $request::get('operator_id');
        // $mdlCategory = Category_mdl::where('operator_id', $newID);
        // return view('categories.v_index', compact('operators'));
        // return view('categories.v_index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dtCategories = $this->mdlCategory::findOrFail($id);
        // dd($dtCategories->name);
        $this->data['dtCategories'] = $dtCategories;
        $this->data['updateID'] = $id;
        $this->data['pageTitle'] = !empty($dtCategories) ? 'Update Category' : 'Add Category';
        return view('categories.form', $this->data);
    }

    // public function update(Category_req $request, $id)
    public function update(Request $request, $id)
    {
        // return $request->all();
        // dd($request);

        $this->validate($request,[
            'categ_name'    => 'required',
            'parent_id'     => 'required',
        ]);

        $params = $request->except('_token');
        $dtUpdate['name'] = $params['categ_name'];
        $dtUpdate['slug'] = Str::slug($params['categ_name']);
        $dtUpdate['parent_id'] = (int)$params['parent_id'];
        $dtUpdate['update_at'] = date('Y-m-d H:i:s');

        $category = $this->mdlCategory::findOrFail($id);
        if ($category->update($dtUpdate)) {
            Session::flash('success', 'Data has been updated.');
        }

        return redirect('categories');
        // return redirect('categories')->with('success', 'Well done, Data has been updated.!');
    }

    public function destroy($id)
    {
        $category = $this->mdlCategory::findOrFail($id);
        // dd($category);
        if ($category->delete()) {
            Session::flash('success', 'Category has been deleted');
        }

        return redirect('categories');
    }

}
