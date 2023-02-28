<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\StaticAsset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    //


    public function viewDailyExpense(){
        return view("adminpanel.expenses.addDailyExpense");
    }
	public function viewProductList(){
		return view("adminpanel.expenses.products");
	}
	public function viewItemList(){
		return view("adminpanel.expenses.items");
	}
	public function quickExpense(){
		return view("adminpanel.expenses.quickExpense");
	}
	public function editResource($id){
		$item = Item::find($id);
		if($item->type == "product"){
			$data["child"] = "product";
			$data["parent"] = "Sales";
		}
		else{
			$data["child"] = "item";
			$data["parent"] = "Expense";
		}

		$data["item"] = $item;
		return view("adminpanel.expenses.updateResource",$data);
	}
    public function viewSalesReport(){
        $data = [];
        $orders = Order::where("status","completed");
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d');

        $previous_week = date("Y-m-d",strtotime("last saturday"));
        $previous_week_start = date("Y-m-d",strtotime("-6 days",strtotime($previous_week)));


        $monthStartDate = $now->startOfMonth()->format('Y-m-d');
        $monthEndDate = $now->endOfMonth()->format('Y-m-d');

		$lastMonth =date("m",strtotime("last month"));
        $thisMonth = date("m");
        
        $lastYear = $now->subYear()->year;
        $thisYear = $now->subYear(-1)->year;
        
        // dd($weekStartDate,
        // $weekEndDate,
        // $monthStartDate,
        // $monthEndDate,
        // $previous_week,
        // $previous_week_start,
        // $lastMonth,
        // $thisMonth,
        // $thisYear,
        // $lastYear);

        $data["todayTotal"] = Order::where("status","completed")->whereDate("created_at",">=",date("Y-m-d"))->sum("total");
        $data["yesterdayTotal"] = Order::where("status","completed")->whereDate("created_at","<",date("Y-m-d"))->whereDate("created_at",">=",date("Y-m-d",strtotime("yesterday")))->sum("total");

        $data["thisWeekTotal"] = Order::where("status","completed")->whereDate("created_at","<",$weekEndDate)->whereDate("created_at",">=",$weekStartDate)->sum("total");
        $data["lastWeekTotal"] = Order::where("status","completed")->whereDate("created_at","<",$previous_week)->whereDate("created_at",">=",$previous_week_start)->sum("total");

        $data["thisMonthTotal"] =  Order::where("status","completed")->whereMonth("created_at","=",$thisMonth)->sum("total");
        $data["lastMonthTotal"] = Order::where("status","completed")->whereMonth("created_at","=",$lastMonth)->sum("total");


        $data["thisYearTotal"] =  Order::where("status","completed")->whereYear("created_at","=",$thisYear)->sum("total");
        $data["lastYearTotal"] = Order::where("status","completed")->whereYear("created_at","=",$lastYear)->sum("total");

        // dd($data);



        return view("adminpanel.expenses.salesReport",$data);
    }
	public function dashboardView(){
		$data = [];
        $orders = new Expense();
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d');

        $previous_week = date("Y-m-d",strtotime("last saturday"));
        $previous_week_start = date("Y-m-d",strtotime("-6 days",strtotime($previous_week)));


        $monthStartDate = $now->startOfMonth()->format('Y-m-d');
        $monthEndDate = $now->endOfMonth()->format('Y-m-d');

        $lastMonth =date("m",strtotime("last month"));
        $thisMonth = date("m");
        
        $lastYear = $now->subYear()->year;
        $thisYear = $now->subYear(-1)->year;
        
        

        $data["todayTotal_expense"] = Expense::whereDate("created_at",">=",date("Y-m-d"))->sum("amount");
        $data["yesterdayTotal_expense"] = Expense::whereDate("created_at","<",date("Y-m-d"))->whereDate("created_at",">=",date("Y-m-d",strtotime("yesterday")))->sum("amount");

        $data["thisWeekTotal_expense"] = Expense::whereDate("created_at","<",$weekEndDate)->whereDate("created_at",">=",$weekStartDate)->sum("amount");
        $data["lastWeekTotal_expense"] = Expense::whereDate("created_at","<",$previous_week)->whereDate("created_at",">=",$previous_week_start)->sum("amount");

        $data["thisMonthTotal_expense"] =  Expense::whereMonth("created_at","=",$thisMonth)->sum("amount");
        $data["lastMonthTotal_expense"] = Expense::whereMonth("created_at","=",$lastMonth)->sum("amount");


        $data["thisYearTotal_expense"] =  Expense::whereYear("created_at","=",$thisYear)->sum("amount");
        $data["lastYearTotal_expense"] = Expense::whereYear("created_at","=",$lastYear)->sum("amount");

		$data["todayTotal"] = Order::where("status","completed")->whereDate("created_at",">=",date("Y-m-d"))->sum("total");
        $data["yesterdayTotal"] = Order::where("status","completed")->whereDate("created_at","<",date("Y-m-d"))->whereDate("created_at",">=",date("Y-m-d",strtotime("yesterday")))->sum("total");

        $data["thisWeekTotal"] = Order::where("status","completed")->whereDate("created_at","<",$weekEndDate)->whereDate("created_at",">=",$weekStartDate)->sum("total");
        $data["lastWeekTotal"] = Order::where("status","completed")->whereDate("created_at","<",$previous_week)->whereDate("created_at",">=",$previous_week_start)->sum("total");

        $data["thisMonthTotal"] =  Order::where("status","completed")->whereMonth("created_at","=",$thisMonth)->sum("total");
        $data["lastMonthTotal"] = Order::where("status","completed")->whereMonth("created_at","=",$lastMonth)->sum("total");


        $data["thisYearTotal"] =  Order::where("status","completed")->whereYear("created_at","=",$thisYear)->sum("total");
        $data["lastYearTotal"] = Order::where("status","completed")->whereYear("created_at","=",$lastYear)->sum("total");

        // dd($data);



        return view("adminpanel.dashboard",$data);
	}
	public function viewExpenseReport(){
        $data = [];
        $orders = new Expense();
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d');

        $previous_week = date("Y-m-d",strtotime("last saturday"));
        $previous_week_start = date("Y-m-d",strtotime("-6 days",strtotime($previous_week)));


        $monthStartDate = $now->startOfMonth()->format('Y-m-d');
        $monthEndDate = $now->endOfMonth()->format('Y-m-d');

		$lastMonth =date("m",strtotime("last month"));
        $thisMonth = date("m");
        
        $lastYear = $now->subYear()->year;
        $thisYear = $now->subYear(-1)->year;
        
        

        $data["todayTotal"] = Expense::whereDate("created_at",">=",date("Y-m-d"))->sum("amount");
        $data["yesterdayTotal"] = Expense::whereDate("created_at","<",date("Y-m-d"))->whereDate("created_at",">=",date("Y-m-d",strtotime("yesterday")))->sum("amount");

        $data["thisWeekTotal"] = Expense::whereDate("created_at","<",$weekEndDate)->whereDate("created_at",">=",$weekStartDate)->sum("amount");
        $data["lastWeekTotal"] = Expense::whereDate("created_at","<",$previous_week)->whereDate("created_at",">=",$previous_week_start)->sum("amount");

        $data["thisMonthTotal"] =  Expense::whereMonth("created_at","=",$thisMonth)->sum("amount");
        $data["lastMonthTotal"] = Expense::whereMonth("created_at","=",$lastMonth)->sum("amount");


        $data["thisYearTotal"] =  Expense::whereYear("created_at","=",$thisYear)->sum("amount");
        $data["lastYearTotal"] = Expense::whereYear("created_at","=",$lastYear)->sum("amount");

        // dd($data);



        return view("adminpanel.expenses.expenseReport",$data);
    }
    public function bindExpense(Request $request)
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
		$recordsQuery = new Expense();
		$sort = 0;
		if ($searchValue != "") {
			$sort = 1;
			$_SESSION['key'] = $searchValue;
			$recordsQuery = $recordsQuery->where('expenses.description', 'LIKE', '%' . $_SESSION['key'] . '%')->orWhere('expenses.type', 'LIKE', '%' . $_SESSION['key'] . '%')->orWhere('expenses.category', 'LIKE', '%' . $_SESSION['key'] . '%')->orWhere('expenses.id', 'LIKE', '%' . $_SESSION['key'] . '%');
		}
		if (isset($request->type) && !empty($request->type)) {
			$recordsQuery = $recordsQuery->where('type', $request->type);
		}
		if (isset($request->category) && !empty($request->category)) {
			$recordsQuery = $recordsQuery->where('category', $request->category);
		}
		if (isset($request->payment_type) && !empty($request->payment_type)) {
			$recordsQuery = $recordsQuery->where('payment_type', $request->payment_type);
		}
		
		if (isset($request->from_date) && !empty($request->from_date)) {
			$recordsQuery = $recordsQuery->whereDate('expenses.created_at', '>=', $request->from_date);
		}
		if (isset($request->to_date) && !empty($request->to_date)) {
			$recordsQuery = $recordsQuery->whereDate('expenses.created_at', '<=', $request->to_date);
		}
		$totalRecords = $recordsQuery->count();
		$totalRecordswithFilter = $recordsQuery->count();

		$records =  $recordsQuery->skip($start)
			->take($rowperpage)
			->get();

		$data_arr = array();
		$i = 1;
		foreach ($records as $record) {

			$sl = "'";
          	$data_arr[] = array(
				// "Image"=>$image,
				"Id"     => $record->id,
				"Description"     => $record->description,
				"Type"        =>"<span class='badge badge-primary text-white'> $record->type</span>",
				"Category"     => "<span class='badge badge-warning text-dark'>$record->category</span>",
				"Items"        => $record->expenseDetails->count()," Items",
				"Amount"      => '<i class="fa fa-inr"></i> '.$record->amount ,
				"Date"        => date("d M, Y",strtotime($record->created_at)),
                "Action"      =>'<button class="btn btn-sm btn-outline-success text-dark ml-1 viewDetails" onclick="viewDetails(this)" data-expense_details = '.$sl.$record->expenseDetails.$sl.' ><i class="fa fa-eye"></i> </button>',


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
    public function bindSales(Request $request)
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
		$recordsQuery = Order::where("status","completed");
		$sort = 0;
		if ($searchValue != "") {
			$sort = 1;
			$_SESSION['key'] = $searchValue;
			$recordsQuery = $recordsQuery->where('orders.note', 'LIKE', '%' . $_SESSION['key'] . '%')
				->orWhere('orders.user_contact', 'LIKE', '%' . $_SESSION['key'] . '%')->orWhere('orders.order_type', 'LIKE', '%' . $_SESSION['key'] . '%')->orWhere('orders.payment_type', 'LIKE', '%' . $_SESSION['key'] . '%')->orWhere('orders.id', 'LIKE', '%' . $_SESSION['key'] . '%');
		}
		if (isset($request->order_type) && !empty($request->order_type)) {
			$recordsQuery = $recordsQuery->where('order_type', $request->order_type);
		}
		if (isset($request->payment_type) && !empty($request->payment_type)) {
			$recordsQuery = $recordsQuery->where('payment_type', $request->payment_type);
		}
		//   if (isset($request->is_header) && !empty($request->is_header)) {
		// 	$recordsQuery = $recordsQuery->where('is_header',$request->is_header);
		// }
		if (isset($request->from_date) && !empty($request->from_date)) {
			$recordsQuery = $recordsQuery->whereDate('orders.created_at', '>=', $request->from_date);
		}
		if (isset($request->to_date) && !empty($request->to_date)) {
			$recordsQuery = $recordsQuery->whereDate('orders.created_at', '<=', $request->to_date);
		}
		$totalRecords = $recordsQuery->count();
		$totalRecordswithFilter = $recordsQuery->count();

		$records =  $recordsQuery->skip($start)
			->take($rowperpage)
			->get();

		$data_arr = array();
		$i = 1;
		$sl = "'";
		foreach ($records as $record) {
			$details = $record->orderDetails;
          	$data_arr[] = array(
				// "Image"=>$image,
				"Order Id"     => $record->order_id,
				"Items Count"     => $record->orderDetails->count()." Items",
				"Order Type"        =>"<span class='badge badge-primary text-white'> $record->order_type</span>",
				"Payment"        => "<span class='badge badge-warning text-dark'>$record->payment_type</span>",
				"User Details"  => $record->user_contact,
				"Charges"      => '<i class="fa fa-inr"></i> '.$record->chargeDetails->sum("amount") ,
				"Amount"      => '<i class="fa fa-inr"></i> '. $record->total,
                "Date"        =>date("d M, Y",strtotime($record->created_at)),
                "Action"      =>'<button class="btn btn-sm btn-outline-success text-dark ml-1 viewDetails" data-order_details = "'.json_encode($record->orderDetails).'" ><i class="fa fa-eye"></i> </button><button class="btn btn-sm btn-outline-primary text-dark ml-1 viewCharges" data-order_details = "'.json_encode($record->chargeDetails).'" ><i class="fa fa-inr"></i> </button><button class="btn btn-sm btn-outline-primary viewDetails ml-1 text-dark" data-order_details = '.$sl.$details.$sl.' ><i class="fa fa-file-text"></i> </button>',


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
	public function bindProducts(Request $request)
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
		$recordsQuery = new Item();
		$sort = 0;
		if ($searchValue != "") {
			$sort = 1;
			$_SESSION['key'] = $searchValue;
			$recordsQuery = $recordsQuery->where('items.sub_category', 'LIKE', '%' . $_SESSION['key'] . '%')
				->orWhere('items.name', 'LIKE', '%' . $_SESSION['key'] . '%')
				->orWhere('items.price', 'LIKE', '%' . $_SESSION['key'] . '%')
				->orWhere('items.unit', 'LIKE', '%' . $_SESSION['key'] . '%')
				->orWhere('items.id', 'LIKE', '%' . $_SESSION['key'] . '%');
		}
		if (isset($request->type) && !empty($request->type)) {
			$recordsQuery = $recordsQuery->where('type', $request->type);
		}
		if (isset($request->sub_category) && !empty($request->sub_category)) {
			$recordsQuery = $recordsQuery->where('sub_category', $request->sub_category);
		}
		//   if (isset($request->is_header) && !empty($request->is_header)) {
		// 	$recordsQuery = $recordsQuery->where('is_header',$request->is_header);
		// }
		if (isset($request->from_date) && !empty($request->from_date)) {
			$recordsQuery = $recordsQuery->whereDate('items.created_at', '>=', $request->from_date);
		}
		if (isset($request->to_date) && !empty($request->to_date)) {
			$recordsQuery = $recordsQuery->whereDate('items.created_at', '<=', $request->to_date);
		}
		$totalRecords = $recordsQuery->count();
		$totalRecordswithFilter = $recordsQuery->count();

		$records =  $recordsQuery->skip($start)
			->take($rowperpage)
			->get();

		$data_arr = array();
		$i = 1;
		$sl = "'";
		$ice_cream = "Ice Cream <i class='fa fa-snowflake-o'></i>";

		$fast_food = "Food <i class='fa fa-cutlery'></i>";
		foreach ($records as $record) {
			$sub = $record->sub_category == "ice_cream" ? $ice_cream : $fast_food;
			$color = $record->sub_category != "ice_cream" ? "success" : "primary";
			$details = $record->orderDetails;
          	$data_arr[] = array(
				// "Image"=>$image,
				"Product Id"     => "PRO".$record->id,
				"Title"     =>"<h6 class='text-$color'> $record->name </h6>",
				"Product Type"        =>"<span class='badge badge-$color text-white'>$sub  </span>",
				"Unit"        => "<span class='badge badge-warning text-dark'>$record->unit</span>",
				"Price"      => '<i class="fa fa-inr"></i> '. $record->price,
                "Action"      =>'<a  href = "'.route("resource-edit",["id"=>$record->id]).'" class="btn btn-sm btn-outline-success text-dark ml-1 updateProduct" ><i class="fa fa-pencil"></i> </a><button class="btn btn-sm btn-outline-danger text-dark ml-1 deleteProduct" ><i class="fa fa-trash"></i> </button>',


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

	public function bindItems(Request $request)
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
		$recordsQuery = new Item();
		$sort = 0;
		if ($searchValue != "") {
			$sort = 1;
			$_SESSION['key'] = $searchValue;
			$recordsQuery = $recordsQuery->where('items.sub_category', 'LIKE', '%' . $_SESSION['key'] . '%')
				->orWhere('items.name', 'LIKE', '%' . $_SESSION['key'] . '%')
				->orWhere('items.price', 'LIKE', '%' . $_SESSION['key'] . '%')
				->orWhere('items.unit', 'LIKE', '%' . $_SESSION['key'] . '%')
				->orWhere('items.id', 'LIKE', '%' . $_SESSION['key'] . '%');
		}
		if (isset($request->type) && !empty($request->type)) {
			$recordsQuery = $recordsQuery->where('type',"!=", $request->type);
		}
		if (isset($request->sub_category) && !empty($request->sub_category)) {
			$recordsQuery = $recordsQuery->where('sub_category', $request->sub_category);
		}
		//   if (isset($request->is_header) && !empty($request->is_header)) {
		// 	$recordsQuery = $recordsQuery->where('is_header',$request->is_header);
		// }
		if (isset($request->from_date) && !empty($request->from_date)) {
			$recordsQuery = $recordsQuery->whereDate('items.created_at', '>=', $request->from_date);
		}
		if (isset($request->to_date) && !empty($request->to_date)) {
			$recordsQuery = $recordsQuery->whereDate('items.created_at', '<=', $request->to_date);
		}
		$totalRecords = $recordsQuery->count();
		$totalRecordswithFilter = $recordsQuery->count();

		$records =  $recordsQuery->skip($start)
			->take($rowperpage)
			->get();

		$data_arr = array();
		$i = 1;
		$sl = "'";
		$ice_cream = "Vegetable <i class='fa fa-fa-leaf'></i>";

		$fast_food = "Raw Material <i class='fa fa-fa-houzz'></i>";
		foreach ($records as $record) {
			$sub = $record->type == "vegetable" ? $ice_cream : $fast_food;
			$color = $record->type != "raw_material" ? "success" : "primary";
			$details = $record->orderDetails;
          	$data_arr[] = array(
				// "Image"=>$image,
				"Item Id"     => "IT".$record->id,
				"Title"     =>"<h6 class='text-$color'> $record->name </h6>",
				"Item Type"        =>"<span class='badge badge-$color text-white'>$sub  </span>",
				"Unit"        => "<span class='badge badge-warning text-dark'>$record->unit</span>",
				"Price"      => '<i class="fa fa-inr"></i> '. $record->price,
                "Action"      =>'<a href="'.route("resource-edit",["id"=>$record->id]).'" class="btn btn-sm btn-outline-success text-dark ml-1 updateProduct" ><i class="fa fa-pencil"></i> </a><button class="btn btn-sm btn-outline-danger text-dark ml-1 deleteProduct" ><i class="fa fa-trash"></i> </button>',


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

    public function viewQuickOrder($id = null){
        $data["isNew"] = "false";
		
        if(empty($id)){
            $data["order_id"] = Order::create([
                "status" => "draft",
                "order_type" =>"dine_in",
                "item_count" => 0
            ])->id;
            $order = Order::find($data["order_id"]);
            $order->order_id = date("Ymd").$data["order_id"];
            $order->save();
            $data["isNew"] = "true";
            $data["order"] = $order;

        }
        else{
            $order = Order::where("order_id",$id)->first();
            if($order)
            $order->orderDetails = $order->orderDetails;
            // dd($order->chargeDetails->charge);
            $data["order"] = $order;
           
        }
		$data["order_type"] = StaticAsset::getAssetsByTitle("order_type");
		$data["payment_type"] = StaticAsset::getAssetsByTitle("payment_type");
		$data["items"] = Item::where("type","product")->get();
        
        $data["order_id"] = $order->order_id;
        return view("adminpanel.expenses.addQuickOrder",$data);
    }

	

	public function updateResource($id,Request $request){
     $item = Item::find($id);
	
	$data = $request->all();
	unset($data["_token"]);

	if($item->update($request->all())){
		Session::flash("message","Item updated successfully!");
		return back();
	}
	else{
		Session::flash("message","Item could not be updated!");
		return back();
	}
	 
	}

	public function addQuickExpense(Request $request){
		$validator = Validator::make($request->all(), [
			"description" => "required|string|min:5",
			"amount" => "required|string",
			"created_by" => "required|exists:users,id",
			"type" => "required|string",
			"category" => "required",
			]);


			if(!$validator->fails()){
				$expense = Expense::create($request->all());

				if($expense){
					return back()->with("message","Expense added of amount $request->amount Rs, on $request->created_at ");
				}
			}
			else{
				return back()->with("message",json_encode($validator->errors()));
			}
	}
   

}
