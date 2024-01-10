<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
{
    public function create()
    {
        return view('resources.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'router' => [
                'required',
                'string',
                Rule::unique('resources', 'router'),
            ],
            'html' => 'required|string',
            'css' => 'required|string',
            'script' => 'required|string',
        ], [
            'router.unique' => 'The provided route is already in use.',
        ]);
        $user = Auth::user();

        $validatedData['createBy'] = $user->id;

        Resource::create($validatedData);
        $modifiedRouter = env('APP_URL') . "publish/" . $validatedData['router'];
        session()->flash('created_router', $modifiedRouter);


        return redirect()->route('resources.create')->with('success', 'Resource created successfully! Router: ');
    }
    public function show($router)
    {
        $resource = Resource::where('router', $router)->firstOrFail();

        // dd($resource);

        return view('resources.show', compact('resource'));
    }
    public function getUserResources()
    {
        $userId = Auth::user()->id;
        $userResources = Resource::where('createBy', $userId)->get();

        return view('resources.user-resources', ['userResources' => $userResources]);
    }
    public function update(Request $request, $id)
    {
        // Validate the request data as needed
        $request->validate([
            'router' => [
                'required',
                'string',
                Rule::unique('resources', 'router')->ignore($id),
            ],
            'html' => 'required|string',
            'css' => 'required|string',
            'script' => 'required|string',
        ]);
    

        // Retrieve the resource by ID
        $resource = Resource::findOrFail($id);

        // Check if the authenticated user is the creator of the resource
        if (intval(Auth::user()->id) !== intval($resource->createBy)) {
            abort(403, 'Unauthorized action.');
        }

        // Update the resource with the new data
        $resource->update([
            'router' => $request->input('router'),
            'html' => $request->input('html'),
            'css' => $request->input('css'),
            'script' => $request->input('script'),
        ]);

        return redirect()->route('user-resources')->with('success', 'Resource updated successfully!');
    }
    public function edit($id)
    {
        // Retrieve the resource by ID
        $resource = Resource::findOrFail($id);
        // dd($resource->createBy, Auth::user()->id);

        // Check if the authenticated user is the creator of the resource
        if (intval(Auth::user()->id) !== intval($resource->createBy)) {
            abort(403, 'Unauthorized action.');
        }

        return view('resources.update-resource', ['resource' => $resource]);
    }
    public function destroy($id)
    {
        // Retrieve the resource by ID
        $resource = Resource::findOrFail($id);

        // Check if the authenticated user is the creator of the resource
        if (intval(Auth::user()->id) !== intval($resource->createBy)) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the resource
        $resource->delete();

        return redirect()->route('user-resources')->with('success', 'Resource deleted successfully!');
    }
}
