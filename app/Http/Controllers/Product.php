<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_mdl;
use App\Models\Category_mdl;

use Str;
use Session;

class Product extends Controller
{
    public function __construct()
    {
        $this->data['title'] = 'My Laravel Apps';
        $this->data['statuses'] = Product_mdl::status();
    }

    public function index()
    {
        //--Models:
        $dtProducts = Product_mdl::get();
        // dd($dtProducts);

        $data['title'] = 'My Laravel Apps'; 
        $data['pageTitle'] = 'Products'; 
        $data['dtProducts'] = $dtProducts; 
        return view('products.v_index', $data);
    }

    public function create()
    {
        $dtProducts = null;
        $this->data['dtProducts'] = $dtProducts;
        $this->data['pageTitle'] = !empty($dtProducts) ? 'Update Product' : 'New Product';

        return view('products.v_form', $this->data);
    }

    public function store(Request $request)
    {
        // return $request->all();

        $request->validate([
            'sku'               => 'required',
            'name'              => 'required',
            'short_description' => 'required',
            // 'description'       => 'required',
            'type'              => 'required',
            'status'            => 'required',
            'price'             => 'required|numeric|gt:0',
        ]);

        //--Simpen cara-1, Untuk nyimpen semua yg dari request:
        // Product_mdl::create($request->all());

        //--Simpen cara-2, Untuk nyimpen PARSIAL yg dari request:
        Product_mdl::create([
            'parent_id'         => 1,
            'user_id'           => 1,
            'sku'               => $request->sku,
            'name'              => $request->name,
            'slug'              => Str::slug($request->name),
            'type'              => $request->type,
            'short_description' => $request->short_description,
            'description'       => 'Description of '.$request->name,
            'price'             => $request->price,
            'weight'            => 1,
            'width'             => 1,
            'height'            => 1,
            'length'            => 1,
            'status'            => (int) $request->status,
        ]);

        //--Simpen cara-3, Pake Model:
        // $mdlProduct = new Product_mdl;
        // $mdlProduct->parent_id         = 1;
        // $mdlProduct->user_id           = 1;
        // $mdlProduct->sku               = $request->sku;
        // $mdlProduct->name              = $request->name;
        // $mdlProduct->slug              = Str::slug($request->name);
        // $mdlProduct->type              = $request->type;
        // $mdlProduct->short_description = $request->short_description;
        // $mdlProduct->description       = 'Description of '.$request->name;
        // $mdlProduct->price             = $request->price;
        // $mdlProduct->weight            = 1;
        // $mdlProduct->width             = 1;
        // $mdlProduct->height            = 1;
        // $mdlProduct->length            = 1;
        // $mdlProduct->status            = (int) $request->status;

        // $mdlProduct->save();

        return redirect('products')->with('success', 'Well done, New data created!');
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
    public function destroy($id)
    {
        //
    }
}
