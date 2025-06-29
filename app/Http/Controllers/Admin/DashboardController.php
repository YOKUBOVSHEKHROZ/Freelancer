<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function profile()
    {
        return view('admin/dashboard');
    }

    public function skills()
    {
        return view('admin/dashboard');
    }

    public function services()
    {
        return view('admin/dashboard');
    }

    public function portfolio()
    {
        return view('admin/dashboard');
    }

    public function blog()
    {
        return view('admin/dashboard');
    }

    public function testimonials()
    {
        return view('admin/dashboard');
    }

    public function messages()
    {
        return view('admin/dashboard');
    }

    public function settings()
    {
        return view('admin/dashboard');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
            'phone' => 'nullable|string|max:20',
            'birthday' => 'nullable|date',
            'job_title' => 'nullable|string|max:100',
            'degree' => 'nullable|string|max:100',
            'experience' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'twitter' => 'nullable|url',
            'dribbble' => 'nullable|url',
        ]);

        $user = Auth::user();
        $user->update($request->only(['name', 'email']));

        // Here you would typically update a profile model
        // that contains the additional fields

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function storeSkill(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'percentage' => 'required|integer|min:0|max:100',
            'category' => 'required|string|max:100',
        ]);

        // Create skill logic here
        // Skill::create($request->all());

        return redirect()->back()->with('success', 'Skill added successfully!');
    }

    public function updateSkill(Request $request, $skill)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'percentage' => 'required|integer|min:0|max:100',
            'category' => 'required|string|max:100',
        ]);

        // Update skill logic here
        // $skill->update($request->all());

        return redirect()->back()->with('success', 'Skill updated successfully!');
    }

    public function destroySkill($skill)
    {
        // Delete skill logic here
        // $skill->delete();

        return redirect()->back()->with('success', 'Skill deleted successfully!');
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'price_range' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
            'category' => 'required|string|max:100',
        ]);

        // Create service logic here
        // Service::create($request->all());

        return redirect()->back()->with('success', 'Service added successfully!');
    }

    public function updateService(Request $request, $service)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'price_range' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
            'category' => 'required|string|max:100',
        ]);

        // Update service logic here
        // $service->update($request->all());

        return redirect()->back()->with('success', 'Service updated successfully!');
    }

    public function destroyService($service)
    {
        // Delete service logic here
        // $service->delete();

        return redirect()->back()->with('success', 'Service deleted successfully!');
    }

    public function storePortfolio(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'nullable|url',
        ]);

        // Create portfolio logic here
        // Portfolio::create($request->all());

        return redirect()->back()->with('success', 'Portfolio item added successfully!');
    }

    public function updatePortfolio(Request $request, $portfolio)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'nullable|url',
        ]);

        // Update portfolio logic here
        // $portfolio->update($request->all());

        return redirect()->back()->with('success', 'Portfolio item updated successfully!');
    }

    public function destroyPortfolio($portfolio)
    {
        // Delete portfolio logic here
        // $portfolio->delete();

        return redirect()->back()->with('success', 'Portfolio item deleted successfully!');
    }

    public function storeBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        // Create blog post logic here
        // BlogPost::create($request->all());

        return redirect()->back()->with('success', 'Blog post created successfully!');
    }

    public function updateBlog(Request $request, $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        // Update blog post logic here
        // $blog->update($request->all());

        return redirect()->back()->with('success', 'Blog post updated successfully!');
    }

    public function destroyBlog($blog)
    {
        // Delete blog post logic here
        // $blog->delete();

        return redirect()->back()->with('success', 'Blog post deleted successfully!');
    }

    public function storeTestimonial(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'client_company' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create testimonial logic here
        // Testimonial::create($request->all());

        return redirect()->back()->with('success', 'Testimonial added successfully!');
    }

    public function updateTestimonial(Request $request, $testimonial)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'client_company' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update testimonial logic here
        // $testimonial->update($request->all());

        return redirect()->back()->with('success', 'Testimonial updated successfully!');
    }

    public function destroyTestimonial($testimonial)
    {
        // Delete testimonial logic here
        // $testimonial->delete();

        return redirect()->back()->with('success', 'Testimonial deleted successfully!');
    }

    public function replyMessage(Request $request, $message)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        // Reply to message logic here
        // $message->reply($request->reply);

        return redirect()->back()->with('success', 'Reply sent successfully!');
    }

    public function destroyMessage($message)
    {
        // Delete message logic here
        // $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully!');
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string',
            'contact_email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'social_links' => 'nullable|array',
        ]);

        // Update settings logic here
        // Settings::updateOrCreate(['key' => 'site_settings'], ['value' => $request->all()]);

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}
