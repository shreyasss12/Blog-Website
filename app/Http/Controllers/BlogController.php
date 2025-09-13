<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    public function index()
    {
        $userId = auth('web')->id();
        $blogs = Blog::where('created_by', $userId)
            ->where('is_active', 1)
            ->get();

        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'cover_image' => 'required|file:jpg,jepg,png',
                'is_active' => 'required|boolean',
            ]);

            $blogs = new Blog();
            $blogs->title = $request->title;
            $blogs->content = $request->content;
            if ($request->hasFile('cover_image')) {
                $path = $request->file('cover_image')->store('blogs', 'public');
                $blogs->cover_image = $path;
            }
            $blogs->is_active = 1;
            $blogs->created_by = auth('web')->id();
            $blogs->save();

            return redirect()->route('blogs.index')->with('success', 'Blog created succesfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e]);
        }
    }

    public function edit($id)
    {
        $blogs = Blog::findorFail($id);
        return view('admin.blog.edit', compact('blogs'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'is_active' => 'required|boolean',
            ]);
            $blogs = Blog::findorFail($id);
            $blogs->title = $request->title;
            $blogs->content = $request->content;
            if ($request->hasFile('cover_image')) {
                $path = $request->file('cover_image')->store('blogs', 'public');
                $blogs->cover_image = $path;
            }
            $blogs->is_active = $request->is_active;
            $blogs->updated_by = auth('web')->id();
            $blogs->save();

            return redirect()->route('blogs.index')->with('success', 'Blog updated succesfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e]);
        }
    }

    public function delete($id)
    {
        $blogs = Blog::findorFail($id);
        $blogs->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted succesfully');
    }

    public function frontIndex()
    {
        $blogs = Blog::where('is_active', 1)->with('creator')->get();
        return view('front-page.index', compact('blogs'));
    }
}
