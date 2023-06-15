<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $data = Slider::all();
        return view('slider.slider',["title" => "Slider" , "data" => $data]);
    }

    public function create()
    {
        return view('slider.slider-create',["title" => "Slider-create" ]);
    }

    public function store(Request $request)
    {
        // validate
        $this->validate($request,[
            'name' => 'required|max:255',
            'image' =>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        // Cek apakah upload file
        if ($request->hasFile('image')) {
            $name = $request->file('image');
            $fileName = 'Slider' . time() . '.' . $name->getClientOriginalExtension();
            $path = Storage::putFileAs('public/gambar_slider', $request->file('image'), $fileName);
        }

        // create ke database
        Slider::create([
            "name" => $request->name,
            "image" => $fileName
        ]);

        // Rederect
        return redirect('/slider')->with('succes','Data Berhasil di Tambahkan!!');
    }

    public function edit($id)
    {
       $data = Slider::where('id' , $id)->first();
        return view('slider.slider-edit',["title" => "Slider-Edit" , "data" => $data]);
    }

    
    public function update(Request $request)
    {
        
        // validate
        $this->validate($request,[
            'name' => 'required|max:255',
            'image' =>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $data = Slider::where('id', $request->id)->first();

            // Cek apakah upload file
        if ($request->hasFile('image')) {

                // Menghapus file lama dari storage
                $delete = Storage::delete('public/gambar_slider/' . $data->image);

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

    public function delete($id)
    {
        $data = Slider::where('id', $id)->first()->delete();

        return Redirect('/slider');
    }
}
