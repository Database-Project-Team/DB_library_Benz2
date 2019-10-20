<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Products;
use DB;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index()
    //{
        //$products = Products::all()->toArray();
        //return view('user.catalog',compact('products'));
    //}

    public function index(Request $request)
    {
        //$products = Products::all()->toArray();

        $productScale = DB::table('products')
          ->select('productScale')
          ->groupBy('productScale')
          ->orderBy('productScale', 'ASC')
          ->get();
        $productVendor = DB::table('products')
          ->select('productVendor')
          ->groupBy('productVendor')
          ->orderBy('productVendor', 'ASC')
          ->get();


        //  if(request()->ajax())
        //  {
          if(!empty($request->filter_scale) or !empty($request->filter_vendor))
          {
            $data = DB::table('products')
              ->select('productName','productScale','productVendor')
              ->where('productScale', $request->filter_scale)
              ->where('productVendor', $request->filter_vendor)
              ->get();
          }
          else
          {
            $data = DB::table('products')
              ->select('productName','productScale','productVendor')
              ->get();
          }
        //  return datatables()->of($data)->make(true);
        //  }
        //  return view('user.catalog', compact('productScale','productVendor') );

          return view('user.catalog', compact('productScale','productVendor','data') );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.catalog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->validate($request,['vendor' => 'required','scale' => 'required']);
        //$user = new User(
        //[
        //    'vendor' => $request->get('vendor'),
        //    'scale' => $request->get('scale')
        //]
        //);
        //$user->save();
        return redirect('catalog'); // -> with('success','บันทึกแล้ว');
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
