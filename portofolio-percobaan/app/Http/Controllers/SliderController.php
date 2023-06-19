<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Slider::all();
        return view('slider.slider',["title" => "Slider" , "data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slider.slider-create',["title" => "Slider-Create"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi
        $this->validate($request,[
            'name' => 'required|min:3|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        if( $request->hasFile('image')){
            $name = $request->file('image');
            $fileName = 'Slider_' . time() . '.' . $name->getClientOriginalExtension();
            Storage::putFileAs('public/gambar_slider', $request->file('image'), $fileName);
        }

        Slider::create([
            'name' => $request->name,
            'image' => $fileName
        ]);

        return redirect('slider')->with('succes','Data Berhasil di Tambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Slider::findOrFail($id);
        return view('slider.slider-edit',["title" => "SLider-edit" , "data" => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // validasi
        $this->validate($request,[
            'name' => 'required|min:3|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $data = Slider::where('id', $request->id)->first();

            // Cek apakah upload file
            if ($request->hasFile('image')) {

                // Menghapus file lama dari storage
                $delete = Storage::delete('public/gambar_slider' . $data->image);

                // Upload file baru dengan format nama ditentukan
                $name = $request->file('image');
                $fileName = 'Produk_' . time() . '.' . $name->getClientOriginalExtension();
                $path = Storage::putFileAs('public/gambar_slider', $request->file('image'), $fileName);

                // Update file di database
                $data->update([
                    'image' => $fileName,
                ]);

                // create ke database
                $data->update([
                "name" => $request->name,
                "image" => $fileName
                ]);
             }

                // Rederect
                return redirect('/slider')->with('succes','Data Berhasil di Update!!');
            }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Slider::where('id',$id)->delete();

         // Rederect
         return redirect('/slider')->with('succes','Data Berhasil di Delete!!');
    }
}
