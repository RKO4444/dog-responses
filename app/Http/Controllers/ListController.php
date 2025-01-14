<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DogList;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    public function index() {
        $lists = Auth::user()->dogLists;
        return view('lists.index', compact('lists'));
    }

    public function show(DogList $dogList) {
        // Ensure the list belongs to the authenticated user
        if ($dogList->user_id !== auth()->id()) {
            abort(403); // Forbidden access if not owner
        }
        $dogList->load('items');
        return view('lists.show', compact('dogList'));
    }

    public function edit(DogList $dogList) {
        if ($dogList->user_id !== auth()->id()) {
            abort(403); // Forbidden access if not owner
        }
        $dogList->load('items');
        return view('lists.edit', compact('dogList'));
    }

    public function update(Request $request, DogList $dogList) {
        if ($dogList->user_id !== auth()->id()) {
            abort(403); // Forbidden access if not owner
        }
    
        // Update the list name
        $dogList->update($request->only('name'));
    
        // Check if there are any items to delete
        if ($request->has('delete_items')) {
            $deleteIds = $request->input('delete_items'); // Array of item IDs to delete
    
            // Ensure that items being deleted belong to the current list
            $dogList->items()->whereIn('id', $deleteIds)->delete();
        }
    
        return redirect()->route('lists.show', $dogList)->with('success', 'List updated successfully.');
    }
    

    public function destroy(DogList $dogList) {
        if ($dogList->user_id !== auth()->id()) {
            abort(403); // Forbidden access if not owner
        }
        $dogList->delete();
        return redirect()->route('lists.index')->with('success', 'List deleted.');
    }
}

