<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\singlesession;
use App\Models\bundle1;
use App\Models\bundle2;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function index()
    {
        $single = singlesession::all()->map(function ($item) {
            $item = $item->toArray();
            $item['source'] = 'single';
            return $item;
        })->toArray();
        $bundle1 = bundle1::all()->map(function ($item) {
            $item = $item->toArray();
            $item['source'] = 'bundle1';
            return $item;
        })->toArray();
        $bundle2 = bundle2::all()->map(function ($item) {
            $item = $item->toArray();
            $item['source'] = 'bundle2';
            return $item;
        })->toArray();
        $sessions = array_merge($single, $bundle1, $bundle2);
        return view('admin.sessions.index', compact('sessions'));
    }
    public function create($name)
    {
        return view('admin.sessions.add', compact('name'));
    }
    public function store(Request $request, $name)
    {
        $request->validate([
            'price' => 'required|integer',
            'minutes' => 'required|integer',
            'session' => 'required|integer',
            'ist' => 'required',
            'second' => 'required',
            'third' => 'required',
            'fourth' => 'required',
            'five' => 'required',
        ]);
        if ($name == 'singlesession') {
            singlesession::create($request->all());
        } elseif ($name == 'bundle1') {
            bundle1::create($request->all());
        } else {
            bundle2::create($request->all());
        }
        return redirect()->back()->with('message', 'Record created successfully.');
    }
    public function edit($itemId, $itemSource)
    {
        switch ($itemSource) {
            case 'single':
                $session = singlesession::find($itemId);
                break;
            case 'bundle1':
                $session =  bundle1::find($itemId);
                break;
            case 'bundle2':
                $session =  bundle2::find($itemId);
                break;
            default:
                return redirect()->back()->with('message', 'data not found.');
                break;
        }
        return view('admin.sessions.edit', compact('session', 'itemSource'));
    }
    public function update(Request $request, $id, $modelName)
    {
        $request->validate([
            'price' => 'required|integer',
            'minutes' => 'required|integer',
            'session' => 'required|integer',
            'ist' => 'required',
            'second' => 'required',
            'third' => 'required',
            'fourth' => 'required',
            'five' => 'required',
        ]);
        $validModels = ['singlesession', 'bundle1', 'bundle2'];
        if (!in_array($modelName, $validModels)) {
            abort(404, "Invalid model name.");
        }

        // Resolve the full model class name. Adjust the namespace based on your application structure
        $modelClass = "App\\Models\\" . $modelName;

        // Fetch the model instance
        $modelInstance = $modelClass::findOrFail($id);

        // Update the model instance
        $modelInstance->update($request->all()); // Make sure to validate your data as needed

        // Redirect or return a response
        return redirect()->back()->with('message', 'Record updated successfully!');
    }
    public function delete($itemId, $itemSource)
    {
        switch ($itemSource) {
            case 'single':
                singlesession::find($itemId)->delete();
                break;
            case 'bundle1':
                bundle1::find($itemId)->delete();
                break;
            case 'bundle2':
                bundle2::find($itemId)->delete();
                break;
            default:
                return redirect()->back()->with('message', 'data not found.');
                break;
        }
        return redirect()->back()->with('message', 'Record deleted successfully.');
    }
}
