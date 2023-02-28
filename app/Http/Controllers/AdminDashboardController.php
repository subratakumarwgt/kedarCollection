<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Centre;
use App\Models\Collection;
use App\Models\Contact;
use App\Models\Diagnosis;
use App\Models\Doctor;
use App\Models\emailTemplate;
use App\Models\Item as ModelsItem;
use App\Models\Product;
use App\Models\Slots;
use App\Models\StaticAsset;
use App\Models\User;
use App\Models\Module;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Page;
use App\Models\Section;
use App\Models\Variant;
use App\View\Components\item;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class AdminDashboardController extends Controller
{
    //

    private $table;
    private $model;
    private $errorMessage;
    private $api_key;
    private $secret_key;
    public function __construct(Request $request)
  {
    $this->table = @$request->table_name;
    $this->model = @$request->table_model;
    $this->errorMessage = "Sorry! Something went wrong";
    $this->api_key = 'rzp_test_zyjdsYczp0XCJh';
    $this->secret_key = 'tWkIxUcqup9ohJc7GnweJxHo';
  }
    public function verifyBroadcast(Request $request){
        $user = Auth::User();
        
        return response(['auth'=>md5("hello"), "user_data" => $user],200);
    }
    public function slotDelete($id){
        $p = Slots::find($id);
        if ($p->delete()) {
           return redirect()->back()->with('message','Slot deleted successfully');
        }
       
    }
    public function slotUpdate(Request $request,$id){
      // dd($request->all());
        $validator_member = Validator::make($request->all(), [
            'free_slots'  => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
        ]);
        if ($validator_member->fails()) {
            
            return redirect()->back()->with('message','Invalid input. Slot update failed');
           
        }     
        else{
        $s = Slots::find($id);
        $data = $request->all();
        unset($data['_token']);
        if ($s->update($request->all())) {
            return redirect()->back()->with('message','Slot updated successfully');
        }
        }  
    }
    public function slotList(Request $request){
        $slots = Slots::groupBy('doctor_id')->select('*')->selectRaw('sum(free_slots) as slots'); 
        $centres = Centre::whereIn('type',['chamber','clinic'])->get();
        if (isset($request->from_date) && !empty($request->from_date)) {
            $slots = $slots->whereDate('date','>=',$request->from_date);
        }
        if (isset($request->to_date) && !empty($request->to_date)) {
            $slots = $slots->whereDate('date','>=',$request->to_date);
        }
        if (isset($request->doctor_id) && !empty($request->doctor_id)) {
            $slots = $slots->where('doctor_id',$request->doctor_id);
        }
        if (isset($request->centre_id) && !empty($request->centre_id)) {
            $slots = $slots->where('centre_id',$request->centre_id);
        }
        $slots = $slots->paginate(5);        
        return view('adminpanel.slots.slotlist',['slots'=>$slots,'centres'=>$centres]);
    }
    public function dashboard(){
        return view('adminpanel.dashboard');
    }
    public function orderHistory(){
      $data["order_types"] = StaticAsset::getAssetsByTitle("order_type");
      return view('adminpanel.expenses.onlineOrders',$data);
  }
    public function contactList(){
      
      $regions = StaticAsset::getAssetsByTitle("customer_regions");
        
        return view('adminpanel.contacts.contactlist',["regions" => $regions]);
    }
    public function onlineUsers(){
      return view('adminpanel.users.onlineusers');
  }
   public function chats()
   {
    return view('adminpanel.chats.chat');
   }
   public function categoryView(){
    return view("adminpanel.category.category");
   }

    public function contactDelete($id){
        Contact::find($id)->delete();
        return redirect()->back()->with('message',"Contact deleted successfully");
    }
    public function contactImport(){
        return view('adminpanel.contacts.contactimport');
    }
    public function contactImportData(Request $request){
        
        $data = json_decode($request->data);
        $newdata = [];
        foreach ($data as $key => $value) {
            foreach ($value as $k => $val) {
                $dd = trim($k);
                $newdata[$key][$dd] = trim($val);
            }
        }
        $newdata = json_decode(json_encode($newdata));      
        $success = 0;
        $failed = 0;
        foreach ($newdata as $key => $value) {       
            $member_array = array(
                'name' => @$value->name,
                'number' => @$value->number,
                'address' => @$value->address,
                'region' => @$value->region,
                
            );
            $validator_member = Validator::make($member_array, [
                'number'  => 'required|unique:contacts|min:10|max:12',
                'name' => 'max:255',
                'region' => 'required|string|min:1|max:255',
                'address' => "max:255",
            ]);
            if ($validator_member->fails()) {
                $failed++;
                $result['failed'][] = array_merge($member_array, array('error' => $validator_member->errors(), 'id' => 'tr_' . $key));
                continue;
            }            
            try {
                $row = \App\Models\Contact::create($member_array);
                $success++;
                $result['success'][] = array_merge($member_array, array('id' => 'tr_' . $key, 'new_id' => $row->id,'contact'=>$row->number,'name'=>$row->number,'address'=>$row->address,'region'=>$row->region));
            } catch (\Throwable $th) {
                $failed++;
                $result['failed'][] = array_merge($member_array, array('error' => $th->getMessage(), 'id' => 'tr_' . $key));
            }
        }
        $create_log = array(
            'success' => $success,
            'failed' => $failed,
            'total' => count($data),
            'content_json' => json_encode($result)
        );
        $this->logger("import_result_".date('d_M_Y'),$create_log);
        return response(array('status' => true, 'data' => array('success' => $success, 'failed' => $failed, 'result' => $result)), 200);
    }
    
    public function contactBind(Request $request)
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
      $recordsQuery = new Contact;
      $sort=0;
      if($searchValue!=""){
        $sort=1;
        $_SESSION['key'] = $searchValue;
        $recordsQuery=$recordsQuery->where('name', 'LIKE', '%' .$_SESSION['key']. '%')
        ->orWhere('number', 'LIKE', '%' . $_SESSION['key']. '%')->orWhere('region', 'LIKE', '%' . $_SESSION['key']. '%')->orWhere('address', 'LIKE', '%' . $_SESSION['key']. '%');
    }
    if (isset($request->status) && !empty($request->status)) {
        $recordsQuery = $recordsQuery->where('status',$request->status);
    }
    if (isset($request->region) && !empty($request->region)) {
        $recordsQuery = $recordsQuery->where('region',$request->region);
    }
    if (isset($request->fromDate) && !empty($request->fromDate)) {
        $recordsQuery = $recordsQuery->whereDate('created_at','>=',$request->fromDate);
    }
    if (isset($request->toDate) && !empty($request->toDate)) {
        $recordsQuery = $recordsQuery->whereDate('created_at','<=',$request->toDate);
    }
      $totalRecords = $recordsQuery->count();
      $totalRecordswithFilter = $recordsQuery->count();
  
      $records =  $recordsQuery->skip($start)
                    ->take($rowperpage)
                    ->get();
  
    $data_arr = array();
      $i=1;
      foreach($records as $record){
          $sl_no=$i;
          $id  = $record->id;
          $Company_name=$record->name;
          $address=$record->address;
          $region=$record->region;
          $contact=$record->number;
          if ($record->status == "unchecked") {
            $notes="<span class='badge badge-danger'>".$record->status."</span>";
          }
          else{
            $notes="<span class='badge badge-success'>".$record->status."</span>";
          }
         
          $entry="<span class='small'>".date("d M, Y",strtotime($record->created_at))."</span>";
          $action = '<a href='.'/admin/edit-contact/'.$id.' class="btn btn-sm btn-primary m-1"><i class="fa fa-edit"></i></a><a href='.'/management/contact/delete/'.$id.' class="btn btn-sm btn-danger m-1"><i class="fa fa-minus-circle"></i></a>';
          $data_arr[] = array(
            "Name"     =>$Company_name,
            "Contact"     =>$contact,
            "Address"     =>$address,
            "Region"        =>$region,           
            "Action"      =>$action,
            "Entry Date"      =>$entry,
            'Notes'  =>$notes
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

    public function centreList(){
        return view('adminpanel.centres.centrelist');
    }
    public function centreEdit($id){
        $centre = Centre::find($id);
        if (!empty($centre->doctors_list_json)) {
            $doctor = json_decode($centre->doctors_list_json,true);
            $doctors = Doctor::whereIn('id',$doctor)->get();
            $x_doctors = Doctor::whereNotIn('id',$doctor)->get();
     
        }
        else{
            $doctors = Doctor::all();
            $x_doctors=[];
        }
        if (!empty($centre->tests_list_json)) {
       $test = json_decode($centre->tests_list_json,true);
       $tests = Diagnosis::whereIn('id',$test)->get();
       $x_tests = Diagnosis::whereNotIn('id',$test)->get();
        }
        else{
            $tests = Diagnosis::all(); 
            $x_tests=[];
        }
        return view('adminpanel.centres.centreedit',['centre'=>$centre,'doctors'=>@$doctors,'x_doctors'=>@$x_doctors,'tests'=>@$tests,'x_tests'=>@$x_tests]);
    }
    public function centreDelete($id){
      
        Centre::find($id)->delete();
        return redirect()->back()->with('message',"Centre deleted successfully");
    }
    public function centreImport(){
        return view('adminpanel.centres.centreimport');
    }    
    public function centreBind(Request $request)
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
      $recordsQuery = new Centre;
      $sort=0;
      if($searchValue!=""){
        $sort=1;
        $_SESSION['key'] = $searchValue;
        $recordsQuery=$recordsQuery->where('name', 'LIKE', '%' .$_SESSION['key']. '%')
        ->orWhere('type', 'LIKE', '%' . $_SESSION['key']. '%')->orWhere('details', 'LIKE', '%' . $_SESSION['key']. '%')->orWhere('address', 'LIKE', '%' . $_SESSION['key']. '%');
    }
    if (isset($request->type) && !empty($request->type)) {
        $recordsQuery = $recordsQuery->where('type',$request->type);
    }
    if (isset($request->address) && !empty($request->address)) {
        $recordsQuery = $recordsQuery->where('address',$request->address);
    }
  
      $totalRecords = $recordsQuery->count();
      $totalRecordswithFilter = $recordsQuery->count();
  
      $records =  $recordsQuery->skip($start)
                    ->take($rowperpage)
                    ->get();
  
    $data_arr = array();
      $i=1;
      foreach($records as $record){
          $sl_no=$i;
          $id  = $record->id;
          $Company_name="<span class='badge badge-outline-success text-dark'>".$record->name."</span>";
          $address="<span class='small text-dark'>".$record->address."</span>";
          $details=$record->details;
          $type=$record->type;
          $image = "<img src='/".$record->image."' class='img-fluid' width='80px'>";
          if ($record->type == "clinic") {
            $notes="<span class='badge badge-success'><i class='fas fa-stethoscope'></i> ".strtoupper($record->type)."</span>";
          }
          else{
            $notes="<span class='badge badge-primary'><i class='fas fa-diagnoses'></i></i> ".strtoupper($record->type)."</span>";
          }
         
       
          $action = '<a href='.'/management/centre/edit/'.$id.' class="btn btn-sm btn-primary m-1"><i class="fa fa-edit"></i></a><a href='.'/management/centre/delete/'.$id.' class="btn btn-sm btn-danger m-1"><i class="fa fa-minus-circle"></i></a>';
          $data_arr[] = array(
            "Image"      =>$image,
            "Name"     =>$Company_name,
            "Address"     =>$address,
            "Type"     =>$notes,
            "Contact"        =>$details,               
            "Action"      =>$action,
            
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
    
    public function doctorImport(){
        $centres = Centre::all();
        return view("adminpanel.doctors.doctorimport",['centres'=>$centres]);
    }
    public function doctorList(){
        $centres = Centre::all();
        return view("adminpanel.doctors.doctorlist",['centres'=>$centres]);
    }
    public function doctorBind(Request $request)
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
      $recordsQuery = new Doctor;
      $sort=0;
      if($searchValue!=""){
        $sort=1;
        $_SESSION['key'] = $searchValue;
        $recordsQuery=$recordsQuery->where('name', 'LIKE', '%' .$_SESSION['key']. '%')
        ->orWhere('degree_json', 'LIKE', '%' . $_SESSION['key']. '%')->orWhere('specialist', 'LIKE', '%' . $_SESSION['key']. '%')->orWhere('medical_history', 'LIKE', '%' . $_SESSION['key']. '%');
    }
    if (isset($request->gender) && !empty($request->gender)) {
        $recordsQuery = $recordsQuery->where('gender',$request->gender);
    }
    if (isset($request->chamber) && !empty($request->chamber)) {
        $recordsQuery = $recordsQuery->where('centre_id_json', 'LIKE', '%' . $request->chamber. '%');
    }
  
      $totalRecords = $recordsQuery->count();
      $totalRecordswithFilter = $recordsQuery->count();
  
      $records =  $recordsQuery->skip($start)
                    ->take($rowperpage)
                    ->get();
  
    $data_arr = array();
      $i=1;
      foreach($records as $record){
          $sl_no=$i;
          $id  = $record->id;
          $Company_name="<span class='badge badge-outline-success text-dark'>Dr. ".$record->name."</span>";
          $specialist="<span class='small text-dark'>".$record->specialist."</span>";
         
            $degrees = json_decode($record->degree_json,true);
            $degree_mat = "";
            if (!empty($degrees)) {
            foreach ($degrees as $key => $value) {
               $degree_mat= $degree_mat. "<span class='badge badge-info m-1'> ".$value."</span>";
            }
            }   
           $degree =  $degree_mat;
          // echo $degree;die;
        
         
            $chambers = json_decode($record->centre_id_json);
        
            $chambers = Centre::whereIn('id',$chambers)->get();
            $degree_format = "";
            if (!empty($chambers)) {               
                foreach ($chambers as $key => $value) {
                   $degree_format = $degree_format. "<span class='badge badge-primary m-1'> ".@$value->name."</span><br>";
                }
            }
            
           
           $chamber =  $degree_format;
        
          $experience=$record->experience." <small>years</small>";
          $image = "<img src='/".$record->image."' class='img-fluid' width='80px'>";
          $fees = "<ul>"
          ."<li class='badge badge-primary'>Fees: <i class='fa fa-inr'></i> ".$record->full_charge."</li>"
          ."<li class='badge badge-secondary'>Adv: <i class='fa fa-inr'></i> ".$record->booking_charge."</li>"
          ."</ul>";
        
            $frequency="<span class='badge badge-success'><i class='fas fa-calender'></i> ".strtoupper($record->visit_frequency)."</span>";
          
         
       
          $action = '<a href='.'/management/doctor/edit/'.$id.' class="btn btn-sm btn-primary m-1"><i class="fa fa-edit"></i></a><a href='.'/management/doctor/delete/'.$id.' class="btn btn-sm btn-danger m-1"><i class="fa fa-minus-circle"></i></a>';
          $data_arr[] = array(
            "Image"      =>$image,
            "Name"     =>$Company_name,
            "Specialist"     =>$specialist,
            "Degrees"     =>$degree,
            "Visit Frequency" => $frequency,
            "Chambers"        =>$chamber,
            "Experience"=>$experience ,
            "Fees Structure"=>$fees,               
            "Action"      =>$action,
            
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
    public function doctorEdit($id){
        $doctor = Doctor::find($id);
        $centres =Centre::all();
        $weekdays = array(
            ['no'=>1,'day'=>"Sunday"],
            ['no'=>2,'day'=>"Monday"],
            ['no'=>3,'day'=>"Tuesday"],
            ['no'=>4,'day'=>"Wednesday"],
            ['no'=>5,'day'=>"Thursday"],
            ['no'=>6,'day'=>"Friday"],
            ['no'=>7,'day'=>"Saturday"],
        );
       
        return view('adminpanel.doctors.doctoredit',['centres'=>$centres,'doctor'=>$doctor,'weekdays'=>$weekdays]);
    }
    public function assetList(){
        return view("adminpanel.assets.assetlist");
    }
    public function assetEdit($id){
        $asset = StaticAsset::find($id);
        return view("adminpanel.assets.assetedit",['asset'=>$asset]);
    }
    public function assetBind(Request $request)
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
      $recordsQuery = new StaticAsset;
      $sort=0;
      if($searchValue!=""){
        $sort=1;
        $_SESSION['key'] = $searchValue;
        $recordsQuery=$recordsQuery->where('title', 'LIKE', '%' .$_SESSION['key']. '%')
        ->orWhere('list_json', 'LIKE', '%' . $_SESSION['key']. '%');
    }
   
      $totalRecords = $recordsQuery->count();
      $totalRecordswithFilter = $recordsQuery->count();
  
      $records =  $recordsQuery->skip($start)
                    ->take($rowperpage)
                    ->get();
  
    $data_arr = array();
      $i=1;
      foreach($records as $record){
          $sl_no=$i;
          $id  = $record->id;
          $title="<span class='h5'>".$record->title."</span>";
         $asset_type = $record->asset_key;
         
            $degrees = json_decode($record->list_json);
            $degree_format = "";
            if (!empty($degrees)) {
            foreach ($degrees as $key => $value) {
               $degree_format.= "<span class='badge badge-info m-1'> ".@strtoupper($value)."</span> ";
            }
        }   
           $degree =  $degree_format;  
         
           
        
       
          $action = '<a href='.'/management/asset/edit/'.$id.' class="btn btn-sm btn-primary m-1"><i class="fa fa-edit"></i></a><a href='.'/management/asset/delete/'.$id.' class="btn btn-sm btn-danger m-1"><i class="fa fa-minus-circle"></i></a>';
          $data_arr[] = array(
            "Asset Title"      =>$title,
            "Asset List"     =>$degree,
            "Action"=>$action
          
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
    public function assetDelete($id){
        StaticAsset::find($id)->delete();
        return redirect()->back()->with("message","Asset Deleted successfully");
    }
    public function doctorDelete($id){
        $doctor = Doctor::find($id);
        $doctor->visits->delete();
        $doctor->delete();
        return redirect()->back()->with("message","Doctor Deleted successfully");
    }
    public function productList(){
      $sub_categories = json_decode(StaticAsset::where('title','product_sub_categories')->first()->list_json);
      $categories = json_decode(StaticAsset::where('title','product_categories')->first()->list_json);
      return view("adminpanel.products.productlist",['sub_categories'=>$sub_categories,'categories'=>$categories]);

    }
    public function productExcelImport(){
        $sub_categories = json_decode(StaticAsset::where('title','product_sub_categories')->first()->list_json);
        $categories = json_decode(StaticAsset::where('title','product_categories')->first()->list_json);
        return view("adminpanel.products.productexcelimport",['sub_categories'=>$sub_categories,'categories'=>$categories]);
  
      }
      public function productDelete($id){
       Product::find($id)->delete();
       return redirect()->back()->with('message',"Deleted successfully");
  
      }
    public function productSelectBind(Request $request){
      try {
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
       $recordsQuery = new Product;
       $sort=0;
       if($searchValue!=""){
         $sort=1;
         $_SESSION['key'] = $searchValue;
         $recordsQuery=$recordsQuery->where('name', 'LIKE', '%' .$_SESSION['key']. '%')
         ->orWhere('category', 'LIKE', '%' . $_SESSION['key']. '%')
         ->orWhere('sub_category', 'LIKE', '%' . $_SESSION['key']. '%')
         ->orWhere('description', 'LIKE', '%' . $_SESSION['key']. '%')
         ->orWhere('tags_json', 'LIKE', '%' . $_SESSION['key']. '%')
         ->orWhere('brand', 'LIKE', '%' . $_SESSION['key']. '%')
          ->orWhere('short_name', 'LIKE', '%' . $_SESSION['key']. '%');
     }
     if (isset($request->status) && !empty($request->status)) {
         $recordsQuery = $recordsQuery->where('status',  $request->status);
     }
     if (isset($request->category) && !empty($request->category)) {
         $recordsQuery = $recordsQuery->where('category', 'LIKE', '%' . $request->category. '%');
     }
     if (isset($request->sub_category) && !empty($request->sub_category)) {
         $recordsQuery = $recordsQuery->where('sub_category', 'LIKE', '%' . $request->sub_category. '%');
     }
     if (isset($request->fromDate) && !empty($request->fromDate)) {
      $recordsQuery = $recordsQuery->whereDate('created_at','>=',$request->fromDate);
      }
      if (isset($request->toDate) && !empty($request->toDate)) {
          $recordsQuery = $recordsQuery->whereDate('created_at','<=',$request->toDate);
      }
    
    
       $totalRecords = $recordsQuery->count();
       $totalRecordswithFilter = $recordsQuery->count();
   
       $records =  $recordsQuery->skip($start)
                     ->take($rowperpage)
                     ->get();
   
     $data_arr = array();
       $i=1;
       foreach($records as $record){
           $sl_no=$i;
           $id  = $record->id;
          
           $name=$record->name;
         
          if (!empty($record->image)) {
            $image = "<img src='/".$record->image."' class='img-fluid' width='40px'>";
          }
          else{
            $image = "<span class='badge badge-warning text-dark'>No Image</span>";
          }  
            
            $switch = '<div class="text-center text-end icon-state switch-sm switch-outline p-1 ">
           <label class="switch ">
          <input type="checkbox" data-bs-original-title="" title="" data-id = "'.$record->id.'" class="item_row"><span class="switch-state  bg-success shadow-sm"></span>
          </label></div>';        
           $data_arr[] = array(
             "Select"    => $switch,
             "Image"      =>$image,
             "Title"     =>$name,  
             "Description" => $record->description           
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
      } catch (\Throwable $e) {
       $this->log_slug = "datatable_error_product_bind";
       $this->logger($this->log_slug . "product", array("data" => $request->all(), "error" => $e->getMessage()));
       die();
      }
 
    }
    public function productBind(Request $request)
    {
     try {
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
      $recordsQuery = new Product;
      $sort=0;
      if($searchValue!=""){
        $sort=1;
        $_SESSION['key'] = $searchValue;
        $recordsQuery=$recordsQuery->where('name', 'LIKE', '%' .$_SESSION['key']. '%')
        ->orWhere('category', 'LIKE', '%' . $_SESSION['key']. '%')
        ->orWhere('sub_category', 'LIKE', '%' . $_SESSION['key']. '%')
        ->orWhere('description', 'LIKE', '%' . $_SESSION['key']. '%')
        ->orWhere('tags_json', 'LIKE', '%' . $_SESSION['key']. '%')
        ->orWhere('brand', 'LIKE', '%' . $_SESSION['key']. '%')
         ->orWhere('short_name', 'LIKE', '%' . $_SESSION['key']. '%');
      }
      if (isset($request->status) && !empty($request->status)) {
          $recordsQuery = $recordsQuery->where('status',  $request->status);
      }
      if (isset($request->category) && !empty($request->category)) {
          $recordsQuery = $recordsQuery->where('category', 'LIKE', '%' . $request->category. '%');
      }
      if (isset($request->sub_category) && !empty($request->sub_category)) {
          $recordsQuery = $recordsQuery->where('sub_category', 'LIKE', '%' . $request->sub_category. '%');
      }
   
   
      $totalRecords = $recordsQuery->count();
      $totalRecordswithFilter = $recordsQuery->count();
  
      $records =  $recordsQuery->skip($start)
                    ->take($rowperpage)
                    ->get();
  
      $data_arr = array();
        $i=1;
        foreach($records as $record){
            $sl_no=$i;
            $id  = $record->id;
            $stock  = $record->stock;
            $name=$record->name;
            $price =$record->pre_price;
          if (!empty($record->image)) {
            $image = "<img src='/".$record->image."' class='img-fluid' width='60px'>";
          }
          else{
            $image = "<span class='badge badge-warning text-dark'>No Image</span>";
          }
          
          $centre = $record->brand;
              $degrees = json_decode($record->tags_json);
            // dd(json_decode($record->tags_json));
              $degree_format = "";
              if (!empty($degrees)) {
              foreach ($degrees as $key => $value) {
                $degree_format= $degree_format."<span class='badge badge-info m-1'> ".strtoupper($value)."</span> ";
              }
          }   
          
            $degree =  $degree_format;  
            $category = "<span class='badge badge-info m-1'> ".@strtoupper($record->category)."</span> ";
            $sub_category = "<span class='badge badge-warning m-1'> ".@strtoupper($record->sub_category)."</span> ";
          
            
            $switch = '<div class="text-center text-end icon-state switch-sm switch-outline p-1 ">
            <label class="switch ">
          <input type="checkbox" data-bs-original-title="" title="" data-id = "'.$record->id.'" class="item_row"><span class="switch-state  bg-success shadow-sm"></span>
          </label></div>';
        
            $action = '<a href='.'/management/product/edit/'.$id.' class="btn btn-sm btn-primary m-1"><i class="fa fa-edit"></i></a><a href='.'/management/product/delete/'.$id.' class="btn btn-sm btn-danger m-1"><i class="fa fa-minus-circle"></i></a>';
            $data_arr[] = array(
              "Select"    => $switch,
              "Image"      =>$image,
              "Title"     =>$name,
              "MRP"     =>$price,
              "Brand"     =>$centre,
              "Stocks" => $stock,
              "Categories"        =>$category,
              "Sub Categories"=>$sub_category ,
              "Search Tags"=>$degree,               
              "Action"      =>$action,
              
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
      } catch (\Throwable $e) {
        $this->log_slug = "datatable_error_product_bind";
        $this->logger($this->log_slug . "product", array("data" => $request->all(), "error" => $e->getMessage()));
        die();
      }

    
    }
     public function productImport(){
         $data= [
             'categories'=> Category::all(),
             'sub_categories' => StaticAsset::getAssetsByTitle("product_sub_categories"),
             'sources' => Centre::where('type','source')->get(),
             "variants" => Variant::all()

             
         ];
        return view("adminpanel.products.productedit",$data);
    }
    public function categoryBind(Request $request)
    {
     try {
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
      $recordsQuery = new Category;
      $sort=0;
      if($searchValue!=""){
        $sort=1;
        $_SESSION['key'] = $searchValue;
        $recordsQuery=$recordsQuery->where('name', 'LIKE', '%' .$_SESSION['key']. '%');
       
    }
    if (isset($request->status) && !empty($request->status)) {
        $recordsQuery = $recordsQuery->where('status',  $request->status);
    }
    
   
      $totalRecords = $recordsQuery->count();
      $totalRecordswithFilter = $recordsQuery->count();
  
      $records =  $recordsQuery->skip($start)
                    ->take($rowperpage)
                    ->orderBy("id","DESC")
                    ->get();
  
    $data_arr = array();
      $i=1;
      foreach($records as $record){
          $sl_no=$i;
          $id  = $record->id;
          $stock  = $record->stock;
          $title=$record->name;
          $status = $record->status == "1" ? "checked='true'" : "";
         
         if (!empty($record->image)) {
           $image = "<img src='/".$record->image."' class='img-fluid' width='100px'>";
         }
         else{
           $image = "<span class='badge badge-warning text-dark'>No Image</span>";
         }
          $action = ' <label class="switch mr-2">
          <input type="checkbox" '.$status.' data-bs-original-title="" title="" id="" data-id="'.$id.'" class="status"><span class="switch-state"></span>
          </label><br><a href='.'/management/category/'.$id.' class="btn btn-sm btn-primary m-1"><i class="fa fa-edit"></i></a><a href='.'/management/category/delete/'.$id.' class="btn btn-sm btn-danger m-1"><i class="fa fa-minus-circle"></i></a>';
          $data_arr[] = array(
            "Image"      =>$image,
            "Name"     =>$title,           
            "Action"      =>$action,            
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
     } catch (\Throwable $e) {
      $this->log_slug = "datatable_error_product_bind";
      $this->logger($this->log_slug . "product", array("data" => $request->all(), "error" => $e->getMessage()));
      die();
     }

    
    }

    public function productEdit($id){
        $product = Product::find($id);
        $data= [
            'categories'=>Category::all(),
            'sub_categories' => StaticAsset::getAssetsByTitle("product_sub_categories"),
            'sources' => Centre::where('type','source')->get(),
            'product'=>$product,
            'sizes' =>StaticAsset::getAssetsByTitle("product_sizes"),
            'varient_types'=>StaticAsset::getAssetsByTitle("varient_types"),
            "variants" => Variant::all()
            
        ];
        // dd($data);
        return view("adminpanel.products.productedit",$data);

    }
    public function listVariant(){
      $data["title"] = "Variant List";
      return view("adminpanel.variants.variantList");
    }
    public function bindVariant(Request $request){
       try {
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
        $recordsQuery = new Variant();
        $sort=0;
        if($searchValue!=""){
          $sort=1;
          $_SESSION['key'] = $searchValue;
          $recordsQuery=$recordsQuery->where('name', 'LIKE', '%' .$_SESSION['key']. '%');
         
        }
       
        $totalRecords = $recordsQuery->count();
        $totalRecordswithFilter = $recordsQuery->count();
    
        $records =  $recordsQuery->skip($start)
                      ->take($rowperpage)
                      ->get();
    
        $data_arr = array();
          $i=1;
          foreach($records as $record){
              $sl_no=$i;
              $id  = $record->id;
              $stock  = $record->stock;
              $title=$record->title;
              $price =$record->pre_price;
              $images = [];
              $images = array_map(function($elem){
                return "<img src='/".$elem."' class='img-fluid inline' width='40px'>";
              },$record->variantValues->pluck("image")->toArray());
              $images = implode(" ",$images);
              $values = array_map(function($elem){
                return "<span class='badge badge-warning text-dark'>".$elem."</span>";
              },$record->variantValues->pluck("value")->toArray());
              $values = implode(" ",$values);          
              $switch = '<div class="text-center text-end icon-state switch-sm switch-outline p-1 ">
              <label class="switch ">
            <input type="checkbox" data-bs-original-title="" title="" data-id = "'.$record->id.'" class="item_row"><span class="switch-state  bg-success shadow-sm"></span>
            </label></div>';
          
              $action = '<a href='.'/management/varient/edit/'.$id.' class="btn btn-sm btn-primary m-1"><i class="fa fa-edit"></i></a><a href='.'/management/variant/delete/'.$id.' class="btn btn-sm btn-danger m-1 deleteButton"><i class="fa fa-minus-circle"></i></a>';
              $data_arr[] = array(
                "Select"    => $switch,
                "Name"      =>$record->name,
                "Images"     =>$images,
                "Values"     =>$values,
                "Action"      =>$action,                
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
        } catch (\Throwable $e) {
          $this->log_slug = "datatable_error_product_bind";
          $this->logger($this->log_slug . "product", array("data" => $request->all(), "error" => $e->getMessage()));
          return response(["error"=>$e->getMessage()]);
          die();
        }
  
      
      
    }
    public function variantEdit($id){
      $variant = Variant::find($id);
      $data= [
         
          "variant" => $variant
          
      ];
      return view("adminpanel.variants.variantEdit",$data);

  }
    public function categoryEdit($id){
      $category = Category::find($id);
      $data= [
         
          "category" => $category
          
      ];
      return view("adminpanel.category.category",$data);

  }
    public function userList(){
        $roles = Role::all();
        return view("adminpanel.users.userlist",["roles"=>$roles]);
    } 

    public function userImport(){
        
        return view("adminpanel.users.userimport");
    }
    public function userBind(Request $request){
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
      $recordsQuery =User::join('profiles', 'users.id', '=', 'profiles.user_id')->join('addresses', 'users.id', '=', 'addresses.user_id')
      ->select('*');
     
    
;
      $sort=0;
      if($searchValue!=""){
        $sort=1;
        $_SESSION['key'] = $searchValue;
        $recordsQuery=$recordsQuery->where('users.name', 'LIKE', '%' .$_SESSION['key']. '%')
        ->orWhere('users.contact', 'LIKE', '%' . $_SESSION['key']. '%')->orWhere('addresses.district', 'LIKE', '%' . $_SESSION['key']. '%')->orWhere('addresses.state', 'LIKE', '%' . $_SESSION['key']. '%')->orWhere('addresses.zip_code', 'LIKE', '%' . $_SESSION['key']. '%');
    }
    if (isset($request->status) && !empty($request->status)) {
        $recordsQuery = $recordsQuery->where('status',$request->status);
    }
    if (isset($request->region) && !empty($request->region)) {
        $recordsQuery = $recordsQuery->where('region',$request->region);
    }
    if (isset($request->fromDate) && !empty($request->fromDate)) {
        $recordsQuery = $recordsQuery->whereDate('users.created_at','>=',$request->fromDate);
    }
    if (isset($request->toDate) && !empty($request->toDate)) {
        $recordsQuery = $recordsQuery->whereDate('users.created_at','<=',$request->toDate);
    }
      $totalRecords = $recordsQuery->count();
      $totalRecordswithFilter = $recordsQuery->count();
  
      $records =  $recordsQuery->skip($start)
                    ->take($rowperpage)
                    ->get();
  
    $data_arr = array();
      $i=1;
      foreach($records as $record){
          $sl_no=$i;
          $id  = $record->user_id;
          $user = User::find($id);
          // dd($user->roles->pluck("name"));
          $Company_name=$record->name;
          $address=$record->address_line_1.",".@$record->district.",".@$record->zip_code;
          $profile="<strong class='small'>AGE</strong>: ".$record->age." <small>years</small>, <br> <span class='badge badge-danger'>".@($user->getRoleNames())."</span>";
          $contact=$record->contact;
          if (!empty($record->image)) {
            $image = "<img src='/storage/".$record->image."' class='img-fluid' width='100px'>";
          }
          else{
            $image = "<img src='/storage/profileimage/default.png' class='img-fluid' width='100px'>";
          }
          if ($record->status == "unchecked") {
            $notes="<span class='badge badge-danger'>".$record->status."</span>";
          }
          else{
            $notes="<span class='badge badge-success'>".$record->status."</span>";
          }
          $switch = '<div class="text-center text-end icon-state switch-sm switch-outline p-1 ">
          <label class="switch ">
<input type="checkbox" data-bs-original-title="" title="" data-user_id = "'.$record->user_id.'" class="user_row"><span class="switch-state  bg-success shadow-sm"></span>
      </label>    </div>';
         
          $entry="<span class='small'>".date("d M, Y",strtotime($record->created_at))."</span>";
          $action = '<a href='.'/management/user/edit/'.$id.' class="btn btn-sm btn-primary m-1"><i class="fa fa-edit"></i></a><a href='.'/management/user/delete/'.$id.' class="btn btn-sm btn-danger m-1"><i class="fa fa-minus-circle"></i></a>';
          $data_arr[] = array(
            "Select" =>$switch,
              "Image"=>$image,
            "Name"     =>$Company_name,
            "Contact"     =>$contact,
            "Profile"        =>$profile,     
            "Address"     =>$address,      
            "Joined"      =>$entry,
            "Action"      =>$action,
           
        
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
    public function userEdit($id){
        $user = User::find($id);
        $profile_checked = "";
        $address_checked = "";
        if (!empty($user->profile())) {
            $profile_checked = "checked";
        }
        if (!empty($user->address())) {
            $address_checked = "checked";
        }
        return view("adminpanel.users.useredit",['user'=>$user,'profile_checked'=>$profile_checked,'address_checked'=>$address_checked]);
    }
    public function productImportData(Request $request)
    {
      $data  = json_decode($request->data,true);
      $success = 0;
      $failed = 0;
      foreach ($data as $key => $value) {
        if ($this->checkProductByName($value['product_name'])) {
          try {
             $insert_array = [
          'short_name'=>$value['product_name'],
          'pre_price'=>$value['mrp'],
          'brand'=>$value['brand'],
          'status'=>0,
         ];
         $success++;
         $product[] = Product::create($insert_array);
            
          } catch (Exception $e) {
         $failed++;   
            continue;
          }
        
        }
        
      }

      return response(array('data'=>[
        'success'=>$success,
        'failed' =>$failed
      ]));
    }
    private function checkProductByName($short_name)
    {
      if (!empty(Product::where('short_name',"LIKE","%".$short_name."%")->count())) {
        return false;
      }
      else
        return true;
    }




    public function contentImport()
    {
        $data= [
            'resources'=> StaticAsset::getAssetsByTitle("resource_types"),
            'content_types'=>StaticAsset::getAssetsByTitle("content_types"),
           
            
        ];
        return view("adminpanel.offers.offerimport",$data);
    }
    public function addpage(){
      $data["elements"] = StaticAsset::getAssetsByTitle("elements");
      return view("adminpanel.pages.addPage", $data);
    }
    public function editPage($id){
      $data["page"] = Page::find($id);
      $data["elements"] = StaticAsset::getAssetsByTitle("elements");
      return view("adminpanel.pages.editPage", $data);
    }
    public function listPage(){
      $data["elements"] = StaticAsset::getAssetsByTitle("elements");
      return view("adminpanel.pages.listPage", $data);
    }
    public function bindPage(Request $request){
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
      $recordsQuery =new Page();
     
    
;
      $sort=0;
      if($searchValue!=""){
        $sort=1;
        $_SESSION['key'] = $searchValue;
        $recordsQuery=$recordsQuery->where('pages.name', 'LIKE', '%' .$_SESSION['key']. '%');
    }
    if (isset($request->status) && !empty($request->status)) {
        $recordsQuery = $recordsQuery->where('status',$request->status);
    }  
    if (isset($request->fromDate) && !empty($request->fromDate)) {
        $recordsQuery = $recordsQuery->whereDate('pages.created_at','>=',$request->fromDate);
    }
    if (isset($request->toDate) && !empty($request->toDate)) {
        $recordsQuery = $recordsQuery->whereDate('pages.created_at','<=',$request->toDate);
    }
      $totalRecords = $recordsQuery->count();
      $totalRecordswithFilter = $recordsQuery->count();
  
      $records =  $recordsQuery->skip($start)
                    ->take($rowperpage)
                    ->get();
  
    $data_arr = array();
      $i=1;
      foreach($records as $record){
          $sl_no=$i;
          $id  = $record->id;
          $created_by = $notes="<span class='badge badge-success'>". User::find($record->created_by)->name."</span>";
          // dd($user->roles->pluck("name"));
         
          $description=$record->description;
        
         
          if ($record->status == "unchecked") {
            $notes="<span class='badge badge-danger'>".$record->status."</span>";
          }
          else{
            $notes="<span class='badge badge-success'>".$record->status."</span>";
          }
          $switch = '<div class="text-center text-end icon-state switch-sm switch-outline p-1 ">
          <label class="switch ">
<input type="checkbox" data-bs-original-title="" title="" data-page_id = "'.$record->id.'" class="user_row"><span class="switch-state  bg-success shadow-sm"></span>
      </label>    </div>';
         
          $entry="<span class='code badge  text-dark h6 border rounded shadow-sm' data-code='".route("custom-page",["slug" => $record->slug ])."'>".route("custom-page",["slug" => $record->slug ])."</span>";
          $action = '<a href='.'/management/page/edit/'.$id.' class="btn btn-sm btn-primary m-1"><i class="fa fa-edit"></i></a><a href='.'/management/page/delete/'.$id.' class="btn btn-sm btn-danger m-1 deleteButton"><i class="fa fa-minus-circle"></i></a>';
          $data_arr[] = array(
            "Select" =>$switch,
           
            "Name"     =>$record->name,
            "Title"     =>$record->title,
            "Slug"     =>$record->slug,
            "URL"     =>$entry,
            "Description"     =>$record->description,
            "Created By"      =>$created_by,
            "Action"      =>$action,
           
        
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
    public function addSection(){
      $data["elements"] = StaticAsset::getAssetsByTitle("elements");
      return view("adminpanel.sections.addSection", $data);
    }
    public function editSection($id){
      $data["section"] = Section::find($id);
      $data["elements"] = StaticAsset::getAssetsByTitle("elements");
      return view("adminpanel.sections.editSection", $data);
    }
    public function addEmailTemplate(){
      $data["short_codes"] = StaticAsset::getAssetsByTitle("short_codes");
      return view("adminpanel.templates.addEmailTemplate", $data);
    }
    public function editSectionBanner(){
      $data["section"] = Section::where("slug","openingbanner")->first();
      $data["elements"] = StaticAsset::getAssetsByTitle("elements");
      return view("adminpanel.sections.editSection", $data);
    }
    public function editSectionCollection(){
      $data["section"] = Section::where("slug","collections")->first();
      $data["elements"] = StaticAsset::getAssetsByTitle("elements");
      return view("adminpanel.sections.editSection", $data);
    }
    public function editSectionCategory(){
      $data["section"] = Section::where("slug","categories")->first();
      $data["elements"] = StaticAsset::getAssetsByTitle("elements");
      return view("adminpanel.sections.editSection", $data);
    }
    public function editSectionOffers(){
      $data["section"] = Section::where("slug","offers")->first();
      $data["elements"] = StaticAsset::getAssetsByTitle("elements");
      return view("adminpanel.sections.editSection", $data);
    }
    public function editSectionSeller(){
      $data["section"] = Section::where("slug","top_sellers")->first();
      $data["elements"] = StaticAsset::getAssetsByTitle("elements");
      return view("adminpanel.sections.editSection", $data);
    }
    public function editEmailTemplate($id = null)
    {
     
      $emailTemplate = emailTemplate::find($id);
      $data["short_codes"] = StaticAsset::getAssetsByTitle("short_codes");
      $data["emailTemplate"] = $emailTemplate;
      return view("adminpanel.templates.editEmailTemplate",$data);
    }
    public function listEmailTemplate(){
      $data = [
        "templates" => emailTemplate::all()
      ];
      return view("adminpanel.templates.listEmailTemplate",$data);

    }
    public function offerImport()
    {
        $data= [
            'resources'=> StaticAsset::getAssetsByTitle("resource_types"),
            'content_types'=>StaticAsset::getAssetsByTitle("content_types"),
            'products' => Product::all(),
            "offer_type" => StaticAsset::getAssetsByTitle("offer_type")
           
            
        ];
        return view("adminpanel.offers.addoffer",$data);
    }
    public function offerList(){
      $data= [
        'resources'=> StaticAsset::getAssetsByTitle("resource_types"),
        'content_types'=>StaticAsset::getAssetsByTitle("content_types"),
        'products' => Product::all(),
        "offer_type" => StaticAsset::getAssetsByTitle("offer_type")
       
        
    ];
    return view("adminpanel.offers.offerlist",$data);
    }
    public function offerEdit($id){
      $data= [
        'resources'=> StaticAsset::getAssetsByTitle("resource_types"),
        'content_types'=>StaticAsset::getAssetsByTitle("content_types"),
        'products' => Product::all(),
        "offer_type" => StaticAsset::getAssetsByTitle("offer_type"),
        "offer" => Offer::find($id)
       
        
    ];
    return view("adminpanel.offers.offerEdit",$data);
    }
    public function offerBind(Request $request)
    {
     try {
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
      $recordsQuery = new Offer();
      $sort=0;
      if($searchValue!=""){
        $sort=1;
        $_SESSION['key'] = $searchValue;
        $recordsQuery=$recordsQuery->where('name', 'LIKE', '%' .$_SESSION['key']. '%')
        ->orWhere('title', 'LIKE', '%' . $_SESSION['key']. '%')
        ->orWhere('sub_title', 'LIKE', '%' . $_SESSION['key']. '%')
        ->orWhere('start_date', 'LIKE', '%' . $_SESSION['key']. '%')
        ->orWhere('end_date', 'LIKE', '%' . $_SESSION['key']. '%')
        ->orWhere('id', 'LIKE', '%' . $_SESSION['key']. '%');
      
    }
    if (isset($request->status) && !empty($request->status)) {
        $recordsQuery = $recordsQuery->where('status',  $request->status);
    }
    if (isset($request->date) && !empty($request->date)) {
        $recordsQuery = $recordsQuery->whereDate('start_date', '<=', $request->date)->whereDate('end_date', '>=', $request->date);
    }
  
      $totalRecords = $recordsQuery->count();
      $totalRecordswithFilter = $recordsQuery->count();
  
      $records =  $recordsQuery->skip($start)
                    ->take($rowperpage)
                    ->orderBy("id","DESC")
                    ->get();
  
    $data_arr = array();
      $i=1;
      foreach($records as $record){
          $sl_no=$i;
          $id  = $record->id;
          $stock  = $record->stock;
          $title=$record->title;
          $price =$record->pre_price;
          $revenue = "<i class='fa fa-inr'> ".$record->getRevenue()."</i>";
         if (!empty($record->images)) {
          $images = array_map(function($elem){
            return "<img src='/".$elem["image"]."' class='img-fluid' width='30px'>";
          },$record->images->toArray());
          $images = implode(" ",$images);
         
         }
         else{
           $images = "<span class='badge badge-warning text-dark'>No Image</span>";
         }

        //  if (!empty($record->products)) {
        //   $products = array_map(function($elem){
        //     return $elem->product->title;
        //   },$record->products->toArray());
        //   $products = implode(" ",$products);
         
        //  }
        $products = [];
         foreach ($record->products as $key => $product) {
          $products[] =  "<span class='badge badge-info m-1'>".$product->product->title."</span>";
         }
         $products = implode("<br> ",$products);
       
         
           $text =  "<h6>".$record->title."</h6><small>".$record->sub_title."</small>";  
           $period = "From: <span class='badge badge-info m-1'>".date("d M",strtotime($record->start_date))."</span><br> To: <span class='badge badge-info m-1'>".date("d M",strtotime($record->end_date))."</span>";
           $details = "<span class='badge badge-".@$record->detail->view_class." m-1'> ".@$record->detail->value." ".@$record->detail->type == 0 ? "flat" : "%" ." Off</span> ";
         
           
           $switch = '<div class="text-center text-end icon-state switch-sm switch-outline p-1 ">
          <label class="switch ">
         <input type="checkbox" data-bs-original-title="" title="" data-id = "'.$record->id.'" class="item_row"><span class="switch-state  bg-success shadow-sm"></span>
         </label></div>';
       
          $action = '<a href='.'/management/offer/edit/'.$id.' class="btn btn-sm btn-primary m-1"><i class="fa fa-edit"></i></a><a href='.'/management/offer/delete/'.$id.' class="btn btn-sm btn-danger m-1"><i class="fa fa-minus-circle"></i></a>';
          $data_arr[] = array(
            "Select"    => $switch,
            "Name"      =>$record->name,
            "Text"     =>$text,
            "Details"     =>$details,
            "Period"     =>$period,
            "Images"     =>$images,
            "Products" => $products,
            "Revenue"        =>$revenue,             
            "Action"      =>$action,
            
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
     } catch (\Throwable $e) {
      $this->log_slug = "datatable_error_offer_bind";
      $this->logger($this->log_slug . "offer", array("data" => $request->all(), "error" => $e->getMessage()));
      return response([
        "status" => false,
        "message" =>$e->getMessage()
      ],400);
      die();
     }

    
    }
    public function collectionImport()
    {
        $data= [
            'products' => Product::all()
        ];
        return view("adminpanel.collections.collectionImport",$data);
    }
    public function collectionList(){
        $data= [
          'products' => Product::all()
        ];
        return view("adminpanel.collections.collectionList",$data);
    }
    public function collectionEdit($id)
    { 
      $data= [
       'products' => Product::all(),
       "collection" => Collection::find($id)
      ];
    return view("adminpanel.collections.collectionEdit",$data);
    }
    public function collectionBind(Request $request){
      try {
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
       $recordsQuery = new Collection();
       $sort=0;
       if($searchValue!=""){
         $sort=1;
         $_SESSION['key'] = $searchValue;
         $recordsQuery=$recordsQuery->where('name', 'LIKE', '%' .$_SESSION['key']. '%')
         ->orWhere('title', 'LIKE', '%' . $_SESSION['key']. '%')
         ->orWhere('sub_title', 'LIKE', '%' . $_SESSION['key']. '%')
         ->orWhere('id', 'LIKE', '%' . $_SESSION['key']. '%');
       
     }
     if (isset($request->status) && !empty($request->status)) {
         $recordsQuery = $recordsQuery->where('status',  $request->status);
     }
    //  if (isset($request->date) && !empty($request->date)) {
    //      $recordsQuery = $recordsQuery->whereDate('start_date', '<=', $request->date)->whereDate('end_date', '>=', $request->date);
    //  }
   
       $totalRecords = $recordsQuery->count();
       $totalRecordswithFilter = $recordsQuery->count();
   
       $records =  $recordsQuery->skip($start)
                     ->take($rowperpage)
                     ->orderBy("id","DESC")
                     ->get();
   
     $data_arr = array();
       $i=1;
       foreach($records as $record){
           $sl_no=$i;
           $id  = $record->id;         
          if (!empty($record->images)) {
           $images = array_map(function($elem){
             return "<img src='/".$elem["image"]."' class='img-fluid' width='30px'>";
           },$record->images->toArray());
           $images = implode(" ",$images);
          
          }
          else{
            $images = "<span class='badge badge-warning text-dark'>No Image</span>";
          }
         $products = [];
          foreach ($record->products as $key => $product) {
           $products[] =  "<span class='badge badge-info m-1'>".$product->product->title."</span>";
          }
          $products = implode("<br> ",$products);
        
          
            $text =  "<h6>".$record->title."</h6><small>".$record->sub_title."</small>";  
          
            
            $switch = '<div class="text-center text-end icon-state switch-sm switch-outline p-1 ">
           <label class="switch ">
          <input type="checkbox" data-bs-original-title="" title="" data-id = "'.$record->id.'" class="item_row"><span class="switch-state  bg-success shadow-sm"></span>
          </label></div>';
        
           $action = '<a href='.'/management/collection/edit/'.$id.' class="btn btn-sm btn-primary m-1"><i class="fa fa-edit"></i></a><a href='.'/management/collection/delete/'.$id.' class="btn btn-sm btn-danger m-1"><i class="fa fa-minus-circle"></i></a>';
           $data_arr[] = array(
             "Select"    => $switch,
             "Name"      =>$record->name,
             "Text"     =>$text,
             "Images"     =>$images,
             "Products" => $products,
             "Action"      =>$action,
             
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
      } catch (\Throwable $e) {
       $this->log_slug = "datatable_error_collection_bind";
       $this->logger($this->log_slug . "collection", array("data" => $request->all(), "error" => $e->getMessage()));
       return response([
         "status" => false,
         "message" =>$e->getMessage()
       ],400);
       die();
      }
 
    }

    public function moduleList(){
       $modules = Module::where("has_child","1")->get();
       return view('adminpanel.modules.modules_list',['modules'=>$modules]);
    }
    public function orderCouponBind(Request $request){
      $recordsQuery = new Order();
      // $recordsQuery = $recordsQuery->where("order_type","website");
      $sort=0;
      $searchValue = $request->search ?? "";
      if($searchValue!=""){
        $sort=1;
        $_SESSION['key'] = $searchValue;
        $recordsQuery=$recordsQuery->where('orders.id', 'LIKE', '%' .$_SESSION['key']. '%');
       
    }
    if (isset($request->status) && !empty($request->status)) {
        $recordsQuery = $recordsQuery->where('status',$request->status);
    }
    if (isset($request->order_type) && !empty($request->order_type)) {
        $recordsQuery = $recordsQuery->where('order_type',$request->order_type);
    }
    // if (isset($request->region) && !empty($request->region)) {
    //     $recordsQuery = $recordsQuery->where('region',$request->region);
    // }
    if (isset($request->from_date) && !empty($request->from_date)) {
        $recordsQuery = $recordsQuery->whereDate('created_at','>=',$request->from_date);
    }
    if (isset($request->to_date) && !empty($request->to_date)) {
        $recordsQuery = $recordsQuery->whereDate('created_at','<=',$request->to_date);
    }

  
      $records =  $recordsQuery->orderBy("orders.id","DESC")
                    ->take(20)
                    ->get();
  
      $data_arr = array();
      $order = new OrderController();
      $order_id_array = $records->pluck("order_id");
      return response($order->getOrderCouponsHTML($order_id_array),200);
  
    }
    
   public function itemBoxBind(Request $request)
   {
     $recordsQuery = new ModelsItem();
    //  $recordsQuery = $recordsQuery->where("order_type","website");
     $sort=0;
     $searchValue = $request->search ?? "";
     if($searchValue!=""){
       $sort=1;
       $_SESSION['key'] = $searchValue;
       $recordsQuery=$recordsQuery->where('items.id', 'LIKE', '%' .$_SESSION['key']. '%')->orWhere('items.name', 'LIKE', '%' .$_SESSION['key']. '%');
      
   }

    if (isset($request->type) && !empty($request->type)) {
        $recordsQuery = $recordsQuery->where('type',$request->type);
    }
    
    if (isset($request->sub_category) && !empty($request->sub_category)) {
        $recordsQuery = $recordsQuery->where('sub_category',$request->sub_category);
    }
    $orderItems = [];
    if (isset($request->order_id) && !empty($request->order_id)) {
    $orderItems = Order::where("order_id",$request->order_id)->first()->orderDetails->pluck("item_id")->toArray();
    }
 
     $records =  $recordsQuery->orderBy("items.id","DESC")
                   ->take(18)
                   ->get();
      
                   $itemsHtml = [];
    if(empty($records->count()))
    $itemsHtml[0] = "<h4 class='h4 p-3 text-center text-danger small'> No items found. </h4>";
    foreach ($records as  $item) {
      $itemsHtml[] = view("components.item-box",["item" => $item,"selected" => in_array($item->id,$orderItems)])->render();   
    }

      return response($itemsHtml,200);
 
   }
    public function getOrderTimelineHTML(Request $request){
      $order_id = $request->order_id;
      $order_id = Order::where("order_id",$order_id)->first()->id;
      $order = new OrderController($order_id);
      // dd($orders);
      return response($order->getOrderTimelineHTML(),200);
    }
    public function getOrderDetailsHTML(Request $request){
      $order_id = $request->order_id;
      $order_id = Order::where("order_id",$order_id)->first()->id;
      $order = new OrderController($order_id);
      // dd($orders);
      return response($order->getOrderDetailsHTML(),200);
    }
    public function getOrderInfoHTML(Request $request){
      $order_id = $request->order_id;
      $order_id = Order::where("order_id",$order_id)->first()->id;
      $order = new OrderController($order_id);
      // dd($orders);
      return response($order->getOrderInfoHTML(),200);
    }

    public function checkRoute(Request $request)
    {
     
      try{
         $route = route($request->route_name);
         if (!empty($route)) {
          $route = str_replace(url("/"), "", $route);
          return response(array("success"=>true,"data"=>$route),200);
      }
      else{
          return response(array("success"=>false,"message"=>"Wrong route name given/ Route doesn't exist"),200);
      }
      }
      catch(\Throwable $th){
        return response(array("success"=>false,"message"=>"Wrong route name given/ Route doesn't exist"),200);
    
      }
     

      
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect()->intended('dashboard');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
      
                Auth::login($newUser);
      
                return redirect()->intended('dashboard');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    
}
