<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\ModuleController;
use App\Models\Module;
use App\Models\User;
// use Spatie\Permission\Contracts\Role;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends ModuleController //role controller will use module controller methods.
{

    public function roleSetup(Request $request)
    {
        $roles = Role::all()->pluck('name');
        $modules = $this->getMainModules();

        return view("adminpanel.modules.role_setup",['roles'=>$roles,"modules"=>$modules]);
    }
    public function roleBind(Request $request){
        $roles = new Role;
        $draw = $request->draw;

		$start = $request->start;
		$rowperpage = $request->length;

		$columnIndex_arr = $request->order;

		$columnName_arr = $request->columns;
		$order_arr = $request->order;
		$search_arr = $request->search;
		$columnIndex = $columnIndex_arr[0]['column'];
		$columnName = $columnName_arr[$columnIndex]['data'];
		$columnSortOrder = @$order_arr[0]['dir'];
		$searchValue = @$search_arr['value'];
		$recordsQuery = $roles;
		$sort = 0;
		if ($searchValue != "") {
			$sort = 1;
			$_SESSION['key'] = $searchValue;
			$recordsQuery = $recordsQuery->where('roles.name', 'LIKE', '%' . $_SESSION['key'] . '%')
				->orWhere('roles.id', 'LIKE', '%' . $_SESSION['key'] . '%');
		}
		if (isset($request->status) && !empty($request->status)) {
			$recordsQuery = $recordsQuery->where('status', $request->status);
		}
		if (isset($request->is_header) && !empty($request->is_header)) {
			$recordsQuery = $recordsQuery->where('is_header', $request->is_header);
		}
		//   if (isset($request->is_header) && !empty($request->is_header)) {
		// 	$recordsQuery = $recordsQuery->where('is_header',$request->is_header);
		// }
		if (isset($request->fromDate) && !empty($request->fromDate)) {
			$recordsQuery = $recordsQuery->whereDate('roles.created_at', '>=', $request->fromDate);
		}
		if (isset($request->toDate) && !empty($request->toDate)) {
			$recordsQuery = $recordsQuery->whereDate('roles.created_at', '<=', $request->toDate);
		}
		$totalRecords = $recordsQuery->count();
		$totalRecordswithFilter = $recordsQuery->count();

		$records =  $recordsQuery->skip($start)
			->take($rowperpage)
			->get();

		$data_arr = array();
		$i = 1;
		foreach ($records as $record) {
			
			$actions = "";
			if (!empty($record->actions_json)) {
				$actions = array_map(function ($action) {
					return "<span class='badge badge-danger'>" . $action . "</span>";
				}, json_decode($record->actions_json));
				$actions = implode(" ", $actions);
			}
			$sp = "'";

			// $entry="<span class='small'>".date("d M, Y",strtotime($record->created_at))."</span>";
			$action = '<a href="#" class="btn btn-sm btn-outline-dark m-1 edit_role" data-id="' . $record->id . '" data-name="'.$record->name.'"><i class="fa fa-edit"></i> Edit</a><a href="#" class="btn btn-sm btn-outline-dark m-1"><i class="fa fa-trash"></i> Delete</a><a class="btn btn-sm btn-outline-dark m-1"><i class="fa fa-user"></i> Assign Users</a><a class="btn btn-sm btn-outline-dark m-1" href="/management/module-permission/role/'.$record->id.'"><i class="fa fa-lock"></i> Edit Permissions</a>';
			$data_arr[] = array(
			    "Id"       => $record->id,
				"Role Name"     => $record->name,
				"Users"    => User::role($record)->count(),
                "Permissions"    => array_map(function($elem){
                    return "<span class='badge badge-danger'>" . $elem["name"] . "</span>";;
                },json_decode(json_encode($record->permissions),true)),
				"Actions"  => $action,
			);
			$i++;
		}

		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordswithFilter,
			"aaData" => $data_arr
		);

		echo json_encode($response);
    }
	public function createNewrole(Request $request)
	{
		$validator_module = Validator::make($request->all(), [
			"name" => "required|unique:roles"
		]);
		if ($validator_module->fails()) {
			return response(["success"=>false, "errors" => $validator_module->errors(), "message" => "Validation error, please check the form"], 400);
		}
		if (empty($request->id)) {
		$role =  Role::create(["name" => $request->name]);
		$message = "Role created successfully!";
		}
		else{
		$role = Role::find($request->id);
		$role->update(["name" => $request->name]);
		$message = "Role updated successfully!";

		}
		return response(["success"=>true,"message"=>$message,"data"=>$role],200);
	}
	public function assignUsers(Request $request){
		$validator_module = Validator::make($request->all(), [
			"user_list" => "required",
			"role_id_list" => "required"
		]);
		
		if ($validator_module->fails()) {
			return response(["success"=>false, "errors" => $validator_module->errors(), "message" => "Validation error, please check the form"], 400);
		}
		else{
			$roles = Role::whereIn("id",explode(",",$request->role_id_list))->pluck("name");
			$users = User::whereIn("id",explode(",",$request->user_list))->get();
			// dd($users);

			foreach ($users as $key => $user) {
				$user->syncRoles($roles);
				
			}
			return back()->with("message","Roles assigned successfully");
		}

	}
    
}
