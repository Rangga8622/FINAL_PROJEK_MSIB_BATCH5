<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //panggil model
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_user = User::orderBy('id', 'desc')->get();
        return view('backend.user.index', compact('ar_user'));
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
        //
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
        $user = User::findOrFail($id);
        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // Add more validation rules for other fields if needed
        ]);

        try {
            // Find the user by ID
            $user = User::findOrFail($id);

            // Update the user information
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                // Add more fields as needed
            ]);

            // Redirect with a success message
            return redirect()->route('user.index')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            // Redirect with an error message if something goes wrong
            return redirect()->back()->with('error', 'Error updating user: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
