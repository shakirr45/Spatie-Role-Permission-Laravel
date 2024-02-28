<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view product', ['only'=> ['index']]);
        $this->middleware('permission:create product', ['only'=> ['create','store']]);
        $this->middleware('permission:update product', ['only'=> ['update','edit']]);
        $this->middleware('permission:delete product', ['only'=> ['destroy']]);


    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $products = Product::all();

        return view('product.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('product.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [

            'product_no' => 'required|integer|unique:products,product_no',
			
            'product_name' => 'required|max:100',
			
        ]);

        $input = $request->all();

		$input['product_name'] = $input['product_name'];
        $input['product_no'] = $input['product_no'];
        
		Product::create($input);

        return redirect('products')->with('status', 'Product Created Successfully');

    }
    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //

        $this->validate($request, [

            'product_no' => 'required|integer|unique:products,product_no,'.$product->id,
			
            'product_name' => 'required|max:100',
			
        ]);

        $input = $request->all();

		$input['product_name'] = $input['product_name'];
        $input['product_no'] = $input['product_no'];
		
		$updateData = Product::find($product->id);

		$updateData->update($input);

        return redirect('products')->with('status', 'Product Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($productId)
    {
        $product = Product::find($productId);
        $product->delete();

        return redirect('products')->with('status', 'Product Deleted Successfully');

    }

    // public function delete($roleId){
    //     $role = Role::find($roleId);
    //     $role->delete();

    //     return redirect('roles')->with('status', 'Role Deleted Successfully');

    // }
}
