<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'birthday' => 'nullable|date',
            'degree' => 'nullable|string|max:100',
            'experience' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'about' => 'nullable|string',
        ]);

        $user = Auth::user();
        $user->update($request->only(['name', 'email']));

        // Here you would typically update a profile model
        // that contains the additional fields like phone, birthday, etc.

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function storeSkill(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'percentage' => 'required|integer|min:0|max:100',
        ]);

        // Create skill logic here

        return redirect()->back()->with('success', 'Skill added successfully!');
    }

    public function updateSkill(Request $request, $skill)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'percentage' => 'required|integer|min:0|max:100',
        ]);

        // Update skill logic here

        return redirect()->back()->with('success', 'Skill updated successfully!');
    }

    public function destroySkill($skill)
    {
        // Delete skill logic here

        return redirect()->back()->with('success', 'Skill deleted successfully!');
    }
}

