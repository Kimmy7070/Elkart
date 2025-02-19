<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\product;

use App\Models\categories;

use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DB::table('categories')->select('cat_name')->get();
        return view('admin.add_product', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //for add_categories
        $fetch_data = product::create($request->all());

        return view('admin.product', compact('fetch_data'))->with('success', "product added successfully.");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $requestData = $request->all();
        $img1 = time() .  $request->file('img1')->getClientOriginalName();
        $img2 = time() .  $request->file('img2')->getClientOriginalName();
        $img3 = time() .  $request->file('img3')->getClientOriginalName();
        // $img1 = time() . $request->file('img1')->getClientOriginalName(). '.' . $request->getClientOriginalExtension();
        // $img2 = time() . $request->file('img2')->getClientOriginalName(). '.' . $request->getClientOriginalExtension();
        // $img3 = time() . $request->file('img3')->getClientOriginalName(). '.' . $request->getClientOriginalExtension();
        $path1 = $request->file('img1')->storeAs('img', $img1, 'public');
        $path2 = $request->file('img2')->storeAs('img', $img2, 'public');
        $path3 = $request->file('img3')->storeAs('img', $img3, 'public');
        $upload_path = 'img/';
        $requestData["img1"] = $upload_path . $img1;
        $requestData["img2"] = $upload_path . $img2;
        $requestData["img3"] = $upload_path . $img3;

        $data = product::create($requestData);
        //return redirect('/home')->with('success', "Product registration details sent successfully.");

        //updating registration type to the Customer_registration_type table
        // $emailData = new product;
        // $emailData->email = $request->email;
        // $emailData->type = 1;
        // $emailData->save();

        return redirect('/admin/product')->with('success', "Product registration details sent successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $Product_data = DB::table('products')->where('name', 'LIKE', '%' . $search .'%')->orwhere('category' , 'LIKE', '%' . $search .'%')->orwhere('mrp' ,'LIKE', '%' . $search .'%')->orwhere('quantity' , 'LIKE', '%' . $search .'%')->get();
        } else {
            $Product_data = DB::table('products')->select('id', 'name', 'category', 'mrp', 'price', 'quantity', 'img1', 'img2', 'img3', 'desc', 'short_desc', 'meta_title', 'meta_desc', 'meta_keyword', 'status', 'created_at', 'updated_at')->get();
        }
        $Product_data = compact('Product_data', 'search');
        // return view ('admin.categories', compact('data'));
        return view('admin.product')->with($Product_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = DB::table('products')->where('id', $id)->get();
        return view('admin.edit_product', compact('data'));
    }

    public function edit_all(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $data = DB::table('products')->where('name', 'LIKE', '%' . $search .'%')->orwhere('category' , 'LIKE', '%' . $search .'%')->orwhere('mrp' ,'LIKE', '%' . $search .'%')->orwhere('quantity' , 'LIKE', '%' . $search .'%')->get();
        } else {
            $data = DB::table('products')->select('id', 'name', 'category', 'mrp', 'price', 'quantity', 'img1', 'img2', 'img3', 'desc', 'short_desc', 'meta_title', 'meta_desc', 'meta_keyword', 'status', 'created_at', 'updated_at')->get();
        }
        $data = compact('data', 'search');
        return view('admin.edit_product')->with($data);
    }


    /**
     * Update the specified resource in storage.
     */


    public function update_quantity(Request $request , $id)
    {

        $name = $request['name'];
        $mrp = $request['mrp'];
        $price = $request['price'];
        $qty = $request['quantity'];

        DB::table('products')->where('id', $id)->update(['name' => $name]);
        DB::table('products')->where('id', $id)->update(['mrp' => $mrp]);
        DB::table('products')->where('id', $id)->update(['price' => $price]);
        DB::table('products')->where('id', $id)->update(['quantity' => $qty]);

        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function status($id)
    {
        $data = DB::table('products')->where('id', $id)->first();
        if ($data->status == 1) {
            DB::table('products')->where('id', $id)->update(['status' => 0]);
        } else {
            DB::table('products')->where('id', $id)->update(['status' => 1]);
        }
        return redirect('/admin/product')->with('success', "Status updated successfully.");
    }

    public function delete($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect('/admin/product');
    }
}
