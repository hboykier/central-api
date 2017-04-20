<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    public function show($id)
    {
        try {
            $role = Role::findOrFail($id);
            return response()->json($role);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Role not found'
                ]
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules(null));
        $role = Role::create($request->all());
        return response()->json($role);
    }

    public function rules($id)
    {
        $update = $id ? ',' . $id : '';
        return [
            'code' => 'required|unique:roles,code' . $update . '|max:15',
            'name' => 'required|unique:roles,name' . $update . '|max:30',
        ];
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, $this->rules($id));
            $role = Role::findOrFail($id);
            $role->fill($request->all());
            $role->save();
            return response()->json($role);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Role not found'
                ]
            ], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();
            return response()->json(['status' => 'success']);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Role not found'
                ]
            ], 404);
        }
    }
}