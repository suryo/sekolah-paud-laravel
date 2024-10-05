<?php
namespace App\Http\Controllers;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('backend.website.photos.index', compact('photos'));
    }

    public function create()
    {
        return view('backend.website.photos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Photo::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('photos.index');
    }

    public function edit($id)
    {
        $photo = Photo::find($id);
        return view('backend.website.photos.edit', compact('photo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $photo = Photo::find($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $photo->image = $imageName;
        }

        $photo->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('photos.index');
    }

    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->delete();
        return redirect()->route('photos.index');
    }
}
