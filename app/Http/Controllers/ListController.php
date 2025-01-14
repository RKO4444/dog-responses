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
            abort(403);
        }
        $dogList->load('items');
        return view('lists.edit', compact('dogList'));
    }

    public function update(Request $request, DogList $dogList) {
        if ($dogList->user_id !== auth()->id()) {
            abort(403);
        }
    
        $dogList->update($request->only('name'));
    
        if ($request->has('delete_items')) {
            $deleteIds = $request->input('delete_items');
    
            $dogList->items()->whereIn('id', $deleteIds)->delete();
        }
    
        return redirect()->route('lists.show', $dogList)->with('success', 'List updated successfully.');
    }
    

    public function destroy(DogList $dogList) {
        if ($dogList->user_id !== auth()->id()) {
            abort(403);
        }
        $dogList->delete();
        return redirect()->route('lists.index')->with('success', 'List deleted.');
    }
}

