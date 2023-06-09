<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CatagoryController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Catagorys=Catagory::orderBy('id','DESC')->paginate(5);  
      return view('admin.catagory.catagory',compact('Catagorys'));
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
        $product=new Catagory();
        $product->CatagoryName=$request->CatagoryName;
        $product->slug=$request->slug;
        $product->populer=$request->populer;
        $product->status=$request->status== true ? '1':'0';
        $product->meta_titel=$request->meta_titel;

        $imagename=$request->image;
        $imagename=time().'.'.$request->image->extension();
        $request->image->move('product',$imagename);  
        $product->image=$imagename;
        
        $product->save(); 
        toast(' Added Sucessfully!!','success');
        return redirect()->route('Catagory.index');
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
        $data=Catagory::find($id);

        $data->delete();
        Alert::warning(' Deleted Successfuly', 'Pleace try anther product');
        return redirect()->route('Catagory.index');
    }
}
