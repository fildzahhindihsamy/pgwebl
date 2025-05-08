<?php

namespace App\Http\Controllers;

use App\Models\PolylinesModel;
use Illuminate\Http\Request;

class PolylinesController extends Controller
{

    public function __construct()
    {
        $this->polylines = new PolylinesModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation
        $request->validate(
            [
                'name' => 'required|unique:polylines,name',
                'description' => 'required',
                'geom_polylines' => 'required',
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,svg|max:3000',
            ],
            [
                'name.required' => 'Name is required',
                'name.unique' => 'Name already exists',
                'description.required' => 'Description is required',
                'geom_polylines.required' => 'Location is required',
            ]
        );

        //Create directory
        if (!is_dir('storage/images')) {
            mkdir('./storage/images', 0777);
         }

        //Get image file
         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_polylines." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);
          } else {
            $name_image = null;
          }


        $data = [
            'geom' => $request->geom_polylines,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $name_image,
        ];

        //Create Data
        if (!$this->polylines->create($data)) {
            return redirect()->route('map')->with('error', 'Polyline Failed to add');
        }

        //Redirect to map
        return redirect()->route('map')->with('success', 'Polyline has been added');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $imagefile = $this->polylines->find($id)->image;

        if (!$this->polylines->destroy($id)){
            return redirect()->route('map')->with('error', 'Polylines Failed to delete');
        }

        //Delete image file
        if ($imagefile != null) {
            if (file_exists('./storage/images/' .$imagefile)) {
                unlink('./storage/images/' .$imagefile);
            }
        }

        return redirect()->route('map')->with('success', 'Polylines has been deleted');
        }
    }
