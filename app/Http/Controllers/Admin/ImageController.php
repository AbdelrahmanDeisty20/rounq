<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = SiteImage::all();
        $stats = [
            'total' => $images->count(),
            'hero' => $images->where('section', 'hero')->count(),
            'services' => $images->filter(fn($img) => str_starts_with($img->section, 'service-'))->count(),
            'gallery' => $images->where('section', 'gallery')->count(),
        ];
        
        return view('admin.images', compact('images', 'stats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'section' => 'required|string',
            'image' => 'nullable',
            'url' => 'nullable|string',
            'title' => 'nullable|string',
        ]);

        $section = $request->section;

        // Find existing or create new (except for gallery where we might want many)
        if ($section !== 'gallery') {
            $image = SiteImage::where('section', $section)->first();
            if (!$image) {
                $image = new SiteImage(['section' => $section]);
            }
        } else {
            $image = new SiteImage(['section' => 'gallery']);
        }

        if ($request->title) {
            $image->title = $request->title;
        }

        if ($request->hasFile('image')) {
            // Delete old file if exists
            if ($image->path) {
                Storage::disk('public')->delete($image->path);
            }
            // Laravel automatically creates the 'images' folder if it doesn't exist
            $path = $request->file('image')->store('images', 'public');
            $image->path = $path;
            // No need to set $image->url because the accessor handles it now
        } elseif ($request->url) {
            // Use external URL, clear old path
            if ($image->path) {
                Storage::disk('public')->delete($image->path);
                $image->path = null;
            }
            $image->url = $request->url;
        }

        $image->save();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'تم تحديث الصورة بنجاح']);
        }

        return back()->with('success', 'تم تحديث الصورة بنجاح');
    }

    public function update(Request $request, SiteImage $image)
    {
        // Reuse store logic for specific image ID update
        $request->merge(['section' => $image->section]);
        return $this->store($request);
    }

    public function destroy(SiteImage $image)
    {
        if ($image->path) {
            Storage::disk('public')->delete($image->path);
        }
        $image->delete();

        if (request()->ajax()) {
            return response()->json(['success' => true, 'message' => 'تم حذف الصورة بنجاح']);
        }

        return back()->with('success', 'تم حذف الصورة بنجاح');
    }
}
