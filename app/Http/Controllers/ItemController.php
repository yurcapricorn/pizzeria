<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::orderBy('id', 'desc')->paginate(5);
        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $image_path = null;
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
            $image_path = basename($image_path);
        }

        Item::create(['title' => $request['title'],
            'description' => $request['description'],
            'type' => $request['type'], 'price' => $request['price'], 'image_path' => $image_path]);
        session()->flash('success', 'Image Upload successfully');
        return redirect()->route('item.index')
            ->withSuccess('Item has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);
        return view('item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::find($id);
        return view('item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Item::find($id);
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $image_path = null;
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('images', 'public');
            $image_path = basename($image_path);
        }

        $item->update(['title' => $request['title'],
            'description' => $request['description'],
            'type' => $request['type'], 'price' => $request['price'], 'image_path' => $image_path]);
        return redirect()->route('item.index')
            ->withSuccess('Item has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Item::find($id)->delete();
        return redirect()->route('item.index')
            ->withSuccess('Item has been deleted successfully.');
    }
}
