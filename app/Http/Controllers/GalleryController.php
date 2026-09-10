<?php

namespace App\Http\Controllers;

use App\Models\GalleryPhoto;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $photos = GalleryPhoto::orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('pages.gallery', compact('photos'));
    }
}
