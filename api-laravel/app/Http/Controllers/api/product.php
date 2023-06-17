<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\productResource;
use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class product extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = ModelsProduct::all();
        return new productResource(true , 'semua Data di tampilkan', $product);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = ModelsProduct::find($id);

        if ($product) {
            return new productResource(true , 'Data di Tampilkan', $product);
        } else {
            return response()->json([
                'message' => 'Data Not Found'
            ],422);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'category' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(),422);
        }else {
            $product = ModelsProduct::create([
                'name' => $request->name,
                'category' => $request->category,
                'qty' => $request->qty,
                'price' => $request->price,
                'description' => $request->description
            ]);
            return new productResource(true , 'Data di ditambahkan', $product);
        }

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
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'category' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(),422);
        }else {
            $product = ModelsProduct::find($id);
            if ($product) {
                $product->update([
                'name' => $request->name,
                'category' => $request->category,
                'qty' => $request->qty,
                'price' => $request->price,
                'description' => $request->description
                ]);
                return new productResource(true , 'Data di update', $product);
            }else {
                return response()->json([
                    'message' => 'Data Not Found'
                ],422);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ModelsProduct::find($id);
            if ($product) {
            
                $product->delete();

                return new productResource(true , 'Data di delete', $product);
            }else {
                return response()->json([
                    'message' => 'Data Not Found'
                ],422);
            }
    }
}
