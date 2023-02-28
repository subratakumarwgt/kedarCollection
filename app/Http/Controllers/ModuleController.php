<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centre;
use App\Models\Contact;
use App\Models\Diagnosis;
use App\Models\Doctor;
use App\Models\Item;
use App\Models\Product;
use App\Models\Slots;
use App\Models\StaticAsset;
use App\Models\ModuleHasPermssion as ModPer;
use App\Models\User;
use App\Models\Module;
use App\Notifications\PushNotify;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Minishlink\WebPush\Notification as WebPushNotification;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class ModuleController extends Controller
{
	//
	public $module;


	public function __construct(Module $module)
	{
		$this->module = $module;
	}
	public function getMainModules(){
		$modules = Module::where("has_child","1")->get();
		return $modules;
	}

	public function createPermissions($module_id = null)
	{

		if (!empty($module_id)) {
			$this->module = Module::find($module_id);
		}

		$actions = json_decode($this->module->actions_json);
		$permissions=[];
		foreach ($actions as $key => $value) {

			$permission_name = $value . "_" . $this->module->slug;
			if (Permission::where("name", $permission_name)->count() == 0) {
				$permissions[] = $perm = Permission::create(["name" => $permission_name]);

				ModPer::create(["permission_id" => $perm->id, "module_id" => $this->module->id]);
			}
		}
		return $permissions;
	}
	public function getModulePermissions($module_id = null)
	{

		if (empty($module_id)) {
			$module_id = $this->module->id;
		}

		$perms_ids = ModPer::where("module_id", $module_id)->get()->pluck("permission_id");
		$permissions = Permission::whereIn("id", $perms_ids)->get();
		return $permissions;
	}

	public function createNewModule(Request $request)
	{
		if (!empty($request->id)) {
			$validator_module = Validator::make($request->all(), [
				"name" => "required",
				"slug" => "required",
				"has_child" => "required",
				"has_parent" => "required",
				"is_header" => "required",

			]);
			if ($validator_module->fails()) {
				return response(['status' => false, "errors" => $validator_module->errors(), "message" => "Validation error, please check the form"], 400);
			} else {
				$module = Module::find($request->id);
				//	unset($request->all()["id"]);
				$module->update($request->all());
				$this->module =  Module::find($module->id);
				$permissions = $this->createPermissions();
				return response(['status' => true, "data" => array("module" => $module, "permissions" => $permissions), "message" => "Module and Permissions updated successfully"], 200);
			}
		} else {
			$validator_module = Validator::make($request->all(), [
				"name" => "required|unique:modules",
				"slug" => "required|unique:modules",
				"has_child" => "required",
				"has_parent" => "required",
				"is_header" => "required",

			]);
			if ($validator_module->fails()) {
				return response(['status' => false, "errors" => $validator_module->errors(), "message" => "Validation error, please check the form"], 400);
			} else {
				$insert_array = $request->all();
				unset($insert_array["id"]);
				$module = Module::create($insert_array);
				$this->module = $module;
				$permissions = $this->createPermissions();
				return response(['status' => true, "data" => array("module" => $module, "permissions" => $permissions), "message" => "Module and Permissions created successfully"], 200);
			}
		}
	}
	public function moduleBind(Request $request)
	{
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
		$recordsQuery = new Module;
		$sort = 0;
		if ($searchValue != "") {
			$sort = 1;
			$_SESSION['key'] = $searchValue;
			$recordsQuery = $recordsQuery->where('modules.name', 'LIKE', '%' . $_SESSION['key'] . '%')
				->orWhere('modules.slug', 'LIKE', '%' . $_SESSION['key'] . '%')->orWhere('modules.route_name', 'LIKE', '%' . $_SESSION['key'] . '%')->orWhere('modules.url', 'LIKE', '%' . $_SESSION['key'] . '%')->orWhere('modules.id', 'LIKE', '%' . $_SESSION['key'] . '%');
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
			$recordsQuery = $recordsQuery->whereDate('modules.created_at', '>=', $request->fromDate);
		}
		if (isset($request->toDate) && !empty($request->toDate)) {
			$recordsQuery = $recordsQuery->whereDate('modules.created_at', '<=', $request->toDate);
		}
		$totalRecords = $recordsQuery->count();
		$totalRecordswithFilter = $recordsQuery->count();

		$records =  $recordsQuery->skip($start)
			->take($rowperpage)
			->get();

		$data_arr = array();
		$i = 1;
		foreach ($records as $record) {
			// $sl_no=$i;
			// $id  = $record->user_id;
			// $Company_name=$record->name;
			// $address=$record->address_line_1.",".@$record->district.",".@$record->zip_code;
			// $profile="<strong class='small'>AGE</strong>: ".$record->age." <small>years</small>, <br><strong class='small'>DOB</strong>: ".@$record->dob;
			// $contact=$record->contact;
			// if (!empty($record->image)) {
			//   $image = "<img src='/storage/".$record->image."' class='img-fluid' width='100px'>";
			// }
			// else{
			//   $image = "<img src='/storage/profileimage/default.png' class='img-fluid' width='100px'>";
			// }
			// if ($record->status == "unchecked") {
			//   $notes="<span class='badge badge-danger'>".$record->status."</span>";
			// }
			// else{
			$notes = "<span class='badge badge-success'>" . $record->status . "</span>";
			// }
			$actions = "";
			if (!empty($record->actions_json)) {
				$actions = array_map(function ($action) {
					return "<span class='badge badge-danger'>" . $action . "</span>";
				}, json_decode($record->actions_json));
				$actions = implode(" ", $actions);
			}
			$sp = "'";

			// $entry="<span class='small'>".date("d M, Y",strtotime($record->created_at))."</span>";
			$action = '<a href="#" class="btn btn-sm btn-outline-dark m-1 " data-id="' . $record->id . '" data-has_parent="' . $record->has_parent . '" data-has_child="' . $record->has_child . '"  data-is_header="' . $record->is_header . '" data-name="' . $record->name . '" data-slug="' . $record->slug . '" data-icon="' . $record->icon . '" data-route_name="' . $record->route_name . '" data-parent_id="' . $record->parent_id . '" data-actions_json=' . $sp . $record->actions_json . $sp . ' onclick="edit_module(this)"><i class="fa fa-edit"></i></a><a href="#" class="btn btn-sm btn-outline-dark m-1"><i class="fa fa-minus-circle"></i></a>';
			$data_arr[] = array(
				// "Image"=>$image,
				"Name"     => $record->name,
				"Slug"     => $record->slug,
				"Route"        => $record->route_name,
				"Icon"        => "<i class='" . $record->icon . "'></i>",
				"Actions"     => $actions,
				"Sub Modules"      => $record->sub_modules->count() > 0 ? "<span class='badge badge-warning text-dark'>" . $record->sub_modules->count() . "</span>" : "",
				"Action"      => $action,


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


	public function modulePermission($view_type = null, $view_type_id = null)
	{
		$module_ids = Module::where("is_header", "1")->get()->pluck("id");
		$modules = Module::whereIn("parent_id", $module_ids)->get();
		$permissions = [];
		if (!empty($view_type)) {
			switch ($view_type) {
				case 'user':
					if (!empty($view_type_id)) {
						$resource = User::find($view_type_id);
					}
					break;

				default:
					# code...
					break;
			}
		}
		$short_perms = [] ; 

		foreach ($modules as $key => $module) {
			$module->permissions = $this->getModulePermissions($module->id);
			// if (empty(count($module->permissions))) {
			// 	$this->createPermissions($module->id);
			// 	$module->permissions = $this->getModulePermissions($module->id);
			// }
		
			foreach ($module->permissions as $key => $permission) {
				//$permission_str[$permission->name] = str_replace("_".$module->slug,"",$permission->name);
				$module->{str_replace("_" . $module->slug, "", $permission->name)} = $permission;
				$short_perms[] =  str_replace("_" . $module->slug, "", $permission->name);
			}
		}

		$unique_permissions = array_unique($short_perms);
		// dd($modules);



		return view("adminpanel.modules.modules_permission", ["modules" => $modules, "unique_permissions" => $unique_permissions, "view_type" => $view_type, "view_type_id" => $view_type_id, "resource" => @$resource]);
	}
	public function getViewTypeSelect2(Request $request)
	{
		if ($request->searchValue == "user") {
			$users = User::get(["id", "name"]);
			$users = json_decode(json_encode($users), true);
			$users = array_map(function ($elem) {
				return ["id" => $elem["id"], "text" => $elem["name"]];
			}, $users);
		}
		if ($request->searchValue == "role") {
			$users = Role::get(["id", "name"]);
			$users = json_decode(json_encode($users), true);
			$users = array_map(function ($elem) {
				return ["id" => $elem["id"], "text" => $elem["name"]];
			}, $users);
		}

		echo json_encode($users);
	}
	public function getViewResources(Request $request)
	{
		switch ($request->view_type) {
			case 'user':
				$resource = User::find($request->view_type_id);
				break;
			case 'role':
				$resource = Role::find($request->view_type_id);
				break;
			default:
				# code...
				break;
		}
		return response(array("success" => true, "data" => $resource->permissions->pluck("name"), "resource" => @$resource));
	}
	public function modulePermissionUpdate(Request $request)
	{
		switch ($request->view_type) {
			case 'user':
				$resource = User::find($request->view_type_id);
				// $has_permissions = Permission::whereIn("name",json_decode($request->has_access,true))->get();
				// $has_no_permissions =  Permission::whereIn("name",json_decode($request->has_no_access,true))->get();
				$res = false;
				if ($resource->givePermissionTo(explode(",", $request->has_access))) {
					if ($resource->revokePermissionTo(explode(",", $request->has_no_access))) {
						$res = true;
					}
				}


				return response(array("success" => $res, "message" => "Permissions Updated successfully", "permissions_given" => explode(",", $request->has_access)), 200);

				break;
			case 'role':
				$resource = Role::find($request->view_type_id);
				$res = false;
				if ($resource->givePermissionTo(explode(",", $request->has_access))) {
					if ($resource->revokePermissionTo(explode(",", $request->has_no_access))) {
						$res = true;
					}
				}


				return response(array("success" => $res, "message" => "Permissions Updated successfully", "permissions_given" => explode(",", $request->has_access)), 200);

				break;
			default:
				# code...
				break;
		}
	}
	public function renderSideBar(Request $request)
	{
		return view("adminpanel.dynamic_sidebar");
		die();
		$html = view("adminpanel.dynamic_sidebar")->render();
		return response(array("success" => true, "data" => $html), 200);
	}
	public function saveSubscription(Request $request)
	{
		
		$validator_member = Validator::make($request->all(), [
			'endpoint'    => 'required|unique:push_subscriptions',
            'keys.auth'   => 'required',
            'keys.p256dh' => 'required'
		]);
		if ($validator_member->fails()) {
			return response()->json(['success' => true],200);
			
		}  
        $endpoint = $request->endpoint;
        $token = $request->keys['auth'];
        $key = $request->keys['p256dh'];
        $user = Auth::user();
         
        
        return response()->json(['success' =>$user->updatePushSubscription($endpoint, $key, $token)],200);
	}
	public function sendPush(Request $request)
	{

		$notification = new PushNotify("Hey folks!","Greetings from rollswallah","See now","url");
	    
		try {			
			Notification::send(User::all(),$notification);
		} catch (\Throwable $th) {
			echo("error: ".$th->getMessage());
		}

		// $pusher->trigger('booking', 'push', 'hello world');
		
	}
	public function orderEasy(Request $request)
	{   
		$category = StaticAsset::getAssetsByTitle("product_categories");
		$items = Item::where("type","product")->get();
		return view("adminpanel.expenses.components.order_easy",["items" => $items]);

	}
}
