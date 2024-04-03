<?php

namespace App\Http\Controllers\Admin\RolePermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{

//this function make actual array of the string that it
// recieves from value of checkbox
    private function makePermissionArrayFromJson($validDetails){
//       making individual array from given data
        foreach ($validDetails as $detail){
            $permissionArray[] = json_decode($detail);
        }
//        returning the array
        return $permissionArray;
    }
    private function getAllPermissionsList(){
//        Fetching all permissions with grouping by slug and tablename
        $permissionLists = Permission::get()->groupBy(['table_name', 'slug']);

//        fist loop for looping with all table name
        foreach ($permissionLists as $tableName => $permissionNames){

            foreach ($permissionNames as $keyVal => $permissionName){
//                Making two dimensional array so that it can be presented
//                well in front end
                $permissionsData['permissionNames'][$tableName][$keyVal] = $permissionName->pluck('id')->toArray();

            }
        }
        return $permissionsData;
    }

    public function index(){

//        Fetching all roles from database
        $data['rolesLists'] = Role::with('permissions')->get();

//       Returning frontend page
        return view('admin.role_permission.index', $data);
    }


    public function create(){
        $data = $this->getAllPermissionsList();
//        this return view for create page
        return view('admin.role_permission.create', $data);
    }

    public function store(Request $requestInput){
        $validDetails = $requestInput->validate([
            'name' => 'required|unique:roles,name,',
            'permissions' => 'required',
        ]);

        try {

            $newRoleCreated = Role::create([
                'guard_name' => 'web',
                'name' => $validDetails['name'],
            ]);

//            using manual decode function to decode the given string and
//            making them in array

            $permissionsNames = $this->makePermissionArrayFromJson($validDetails['permissions']);
            $newRoleCreated ->syncPermissions($permissionsNames);

        }catch (\Exception $exception){
            return redirect()->route('role-permissions.index')->withErrors( $exception->getMessage());
        }

        return redirect()->route('role-permissions.index')->with('message', 'Added New Role !! ');

    }

//    this function to return frontend
//page for edit page
    public function edit(string $roleID){
//        getting array of all permissions name
        $data = $this->getAllPermissionsList();

        $data['roleDetail'] = Role::with('permissions')->findOrFail($roleID);

        return view('admin.role_permission.edit', $data);
    }

//    this function to update role and permissions
    public function update(Request $requestInput, string $roleID){
        $roleObj = Role::findOrFail($roleID);

        $validDetails = $requestInput->validate([
            'name' => 'required|unique:roles,name,'.$roleObj->id,
            'permissions' => 'required',

        ]);

        try {
//            storing role name in roles table
            $roleObj-> update([
                'name' => $validDetails['name'],
            ]);

            $permissionsNames = $this->makePermissionArrayFromJson($validDetails['permissions']);
            $roleObj ->syncPermissions($permissionsNames);

        }catch (\Exception $exception){
            return redirect()->route('role-permissions.index')->withErrors( $exception->getMessage());
        }

        return redirect()->route('role-permissions.index')->with('message', 'Updated Role !! ');

    }

    public function destroy(string $roleID){
//        getting the role object
        $roleObj = Role::findOrFail($roleID);
//        deleting the object
        $roleObj->delete();

        return redirect()->route('role-permissions.index')->with('message', 'Successfully deleted role!! ');

    }

}
