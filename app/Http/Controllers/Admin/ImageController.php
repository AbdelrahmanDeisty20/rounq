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
            'gallery' => $images->filter(fn($img) => str_starts_with($img->section, 'gallery'))->count(),
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

        // Unique sections like hero, service-*, step-*, and specific gallery categories
        if ($section !== 'gallery') {
            // Case-insensitive search to match GALLERY-TRUCKS or gallery-trucks
            $image = SiteImage::whereRaw('LOWER(section) = ?', [strtolower($section)])->first();

            // SMART FIX: If specific slot doesn't exist, try to 'adopt' an old generic gallery image
            if (!$image && str_starts_with($section, 'gallery-')) {
                $image = SiteImage::where('section', 'gallery')->first();
                if ($image) {
                    $image->section = strtolower($section);
                }
            }

            if (!$image) {
                $image = new SiteImage(['section' => strtolower($section)]);
            }
        } else {
            // General gallery section allows multiple images
            $image = new SiteImage(['section' => 'gallery']);
        }

        if ($request->title) {
            $image->title = $request->title;
        } else {
            // Auto-set title based on section if missing
            $labels = [
                'hero' => 'الخلفية الرئيسية',
                'service-1' => 'خدمة 1 — فك وتركيب',
                'service-2' => 'خدمة 2 — شاحنة نقل',
                'service-3' => 'خدمة 3 — نقل بضمان',
                'service-4' => 'خدمة 4 — نقل آمن',
                'service-5' => 'خدمة 5 — أسعار',
                'service-6' => 'خدمة 6 — تغليف',
                'service-7' => 'خدمة 7 — فك غرف',
                'service-8' => 'خدمة 8 — بين المدن',
                'step-1' => 'الخطوة ١ — تواصل',
                'step-2' => 'الخطوة ٢ — الحجم',
                'step-3' => 'الخطوة ٣ — معاينة',
                'step-4' => 'الخطوة ٤ — تغليف',
                'step-5' => 'الخطوة ٥ — نقل',
                'step-6' => 'الخطوة ٦ — تركيب',
                'gallery-packing' => 'معرض — التغليف بالكراتين',
                'gallery-trucks' => 'معرض — شاحنات النقل',
            ];
            $image->title = $labels[strtolower($section)] ?? 'صورة موقع';
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
        if ($request->hasFile('image')) {
            if ($image->path) {
                Storage::disk('public')->delete($image->path);
            }
            $path = $request->file('image')->store('images', 'public');
            $image->path = $path;
        } elseif ($request->url) {
            if ($image->path) {
                Storage::disk('public')->delete($image->path);
                $image->path = null;
            }
            $image->url = $request->url;
        }

        if ($request->section) {
            // If moving to a unique section, delete any existing image there first
            if ($request->section !== 'gallery') {
                SiteImage::whereRaw('LOWER(section) = ?', [strtolower($request->section)])
                    ->where('id', '!=', $image->id)
                    ->delete();
            }
            $image->section = strtolower($request->section);
        }

        $image->save();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'تم تحديث الصورة بنجاح']);
        }

        return back()->with('success', 'تم تحديث الصورة بنجاح');
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
