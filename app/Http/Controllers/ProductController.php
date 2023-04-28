<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $product=Product::all();
        return view('admin.product',compact('product'));
       
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
        $product=new Product();
        $product->Name=$request->pname;
        $product->Catagory=$request->Pcatagory;
        $product->quantity=$request->PQuntty;
        $product->Price=$request->Pprice;
        $product->Descrtiptton=$request->Pdescripton;

        $imagename=$request->image;
        $imagename=time().'.'.$request->image->extension();
        $request->image->move('product',$imagename);  
        $product->image=$imagename;
    
  
  
        $product->save();
        return redirect()->back()->with ('message',' Added Sucessfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $product=product::find($id);
        return view('admin.editeProduct',compact('product'));
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
        $product=product::find($id);
        $product->Name=$request->pname;
        $product->Catagory=$request->Pcatagory;
        $product->quantity=$request->PQuntty;
        $product->Price=$request->Pprice;
        $product->Descrtiptton=$request->Pdescripton;
      
        $image=$request->image;
      
        if($image)
        {
        $image=time().'.'.$request->image->extension();
        $request->image->move('product',$image);  
        $product->image=$image;
       
        }
        $product->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Product::find($id);

        $data->delete();
       return redirect()->back()->with ('message',' Added Sucessfully!!');
    }
}
