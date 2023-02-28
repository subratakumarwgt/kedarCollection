<?php

namespace App\Http\Controllers;

use App\Events\NewBooking;
use App\Events\NewOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\AppointmentController;
use App\Models\Address;
use App\Models\Booking;
use App\Models\Cart;
use App\Models\cartHasVariant;
use App\Models\Centre;
use App\Models\Charge;
use App\Models\Collection;
use App\Models\collectionHasProduct;
use App\Models\collectionImage;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Slots;
use App\Models\Item;
use App\Models\StaticAsset;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\DailyExpense;
use App\Models\Offer;
use App\Models\offerDetail;
use App\Models\offerHasProduct;
use App\Models\offerImage;
use App\Models\OrderCharge;
use App\Models\Page;
use App\Models\pageHasModel;
use App\Models\productHasImage;
use App\Models\productHasQuantity;
use App\Models\productHasVariant;
use App\Models\productHasVariantValue;
use App\Models\Section;
use App\Models\sectionHasModel;
use App\Services\handleOrder;
use App\View\Components\Product as ComponentsProduct;
use App\View\Components\userpanel\cartRows;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Razorpay\Api\Api;
use stdClass;

class CrudController extends Controller
{
	private $table;

	private $model;

	private $fields;

	private $errorMessage;

	private $log_slug;

	private $api_key;

	private $secret_key;

	public function __construct(Request $request)
	{
		$this->table = $request->table_name;
		$this->model = $request->table_model;
		$this->errorMessage = "Sorry! Something went wrong";
		$this->api_key = 'rzp_test_zyjdsYczp0XCJh';
		$this->secret_key = 'tWkIxUcqup9ohJc7GnweJxHo';
	}


	public function upload_image(Request $request)
	{
		$this->log_slug = "upload_error_";
		$this->errorMessage = "Please provide a valid image file";
		$validator = Validator::make($request->all(), [
			'image' => 'required',

		]);

		if ($validator->fails()) {

			return response(array('status' => false, "message" => $this->errorMessage, "error" => $validator->errors()), 400);
		}
		try {
			if (isset($request->image)) {

				$imagepath =  request('image')->store($request->folder_name, 'public');

				return response(array('status' => true, "data" =>  "storage/" . @$imagepath, "message" => "Image uploaded successfully"), 200);
			} else {

				return response(array('status' => false, "message" => $this->errorMessage, "error" => "No image found"), 400);
			}
		} catch (\Throwable $th) {
			$this->logger($this->log_slug . $this->table_name, array("data" => $request->insert_data, "error" => $th->getMessage()));
			return response(array('status' => false, "message" => $this->errorMessage, "error" => $th->getMessage()), 400);
		}
	}
	public function isDistinct(Request $request)
	{

		$model = "\\App\\Models\\" . $request->table_model;
		$model = new $model();
		if (empty($model->where($request->field, $request->field_value)->count())) {
			return response(array('status' => true), 200);
		} else {
			return response(array('status' => false), 400);
		}
	}
	public function create(Request $request)
	{
		$this->log_slug = "create_error_";
		$insert_data = $request->all();
		unset($insert_data['table_name']);
		unset($insert_data['table_model']);

		try {
			$model = "\\App\\Models\\" . $request->table_model;
			$model = new $model();
			$inserted_data = $model->create($insert_data);
			return response(array('status' => true, "data" => $inserted_data, "message" => $request->table_model . " inserted successfully"), 200);
		} catch (\throwable $th) {
			$this->logger($this->log_slug . $request->table_name, array("data" => $insert_data, "error" => $th->getMessage()));
			return response(array('status' => false, "message" => $this->errorMessage, "error" => $th->getMessage()), 400);
		}
	}
	public function edit(Request $request)
	{
		$this->log_slug = "update_error_";


		try {
			$update_data = $request->all();
			unset($update_data['table_name']);
			unset($update_data['table_model']);
			unset($update_data['id']);
			if (isset($request->image) && empty($request->image)) {
				unset($request->image);
			}
			$model = "\\App\\Models\\" . $request->table_model;
			$model = new $model();
			$data = $model->find($request->id);
			$request->updated_at = date("Y-m-d H:i:s");
			$inserted_data = $data->update($update_data);
			$finalData = $model->find($request->id);
			return response(array('status' => true, "data" => $finalData, "message" => $request->table_model . " updated successfully"), 200);
		} catch (\throwable $th) {
			$this->logger($this->log_slug . $request->table_name, array("data" => $update_data, "error" => $th->getMessage()));
			return response(array('status' => false, "message" => $this->errorMessage, "error" => $th->getMessage()), 400);
		}
	}

	public function delete(Request $request)
	{
		$this->log_slug = "delete_error_";
		try {
			$model = "\\App\\Models\\" . $request->table_model;
			$model = new $model();
			$data = $model->find($request->id);
			return response(array('status' => $data->delete(), "message" => "Data deleted successfully"), 200);
		} catch (\throwable $th) {
			$this->logger($this->log_slug . $request->table_name, array("error" => $th->getMessage()));
			return response(array('status' => false, "message" => $this->errorMessage, "error" => $th->getMessage()), 400);
		}
	}
	public function read(Request $request, $model_name, $table_name)
	{
		$this->log_slug = "read_error_";
		try {
			$count = 1;
			$model = "\\App\\Models\\" . $model_name;
			$model = new $model();

			if (isset($request->id)) {
				$data = $model->find($request->id);
				return response(array('status' => true, "message" => $model_name . " fetched successfully", "count" => $count, "data" => $data), 200);
			} else {
				$data = $model->paginate();
				if (isset($request->filter)) {
					$data = $data->where($request->filter, $request->filter_value);
				}
				if (isset($request->limit)) {
					$data = $data->paginate($request->limit);
				}
				return response(array('status' => true, "message" => $model_name . " fetched successfully", "count" => $data->count(), "data" => $data), 200);
			}
		} catch (\throwable $th) {
			$this->logger($this->log_slug . $table_name, array("error" => $th->getMessage()));
			return response(array('status' => false, "message" => $this->errorMessage, "error" => $th->getMessage()), 400);
		}
	}
	public function createProduct(Request $request){
		try {
			$updateData = $request->all();
			unset($updateData['product_has_images']);
			unset($updateData['product_has_variants']);
			unset($updateData['product_has_quantities']);
			// dd($request->product_has_images);
			$product = Product::create($updateData);
			$_SESSION["product"] = $product;
			$images = json_decode($request->product_has_images,true);
			$images = array_map(function($arr){
				return $arr + ['product_id' => $_SESSION["product"]->id];
			}, $images);
			productHasImage::insert($images);
			$variants = json_decode($request->product_has_variants,true);
			$variantsInsert = [];
			if(!empty($variants))
			foreach ($variants as $key => $value) {
				$variantsInsert[] = [
					"product_id" => $product->id,
					"variant_id" => $value["varient_id"],
					"status" => "1"
				];
			}

			if(count($variantsInsert) > 0){
				productHasVariant::insert($variantsInsert);
				$variantsInsert = [];
				foreach ($variants as $key => $value) {
					foreach ($value["variant_value_list"] as  $val) {
						$variantsInsert[] = [
							"product_id" => $product->id,
							"variant_id" => $value["varient_id"],
							"variant_value_id" => $val,
							"status" => "1"
						];
					}
				}
				productHasVariantValue::insert($variantsInsert);
			}
			$quantities = json_decode($request->product_has_quantities,true);
	        if(!empty($quantities)){
				
				$quantities = array_map(function($arr){
					return $arr + ['product_id' => $_SESSION["product"]->id];
				}, $quantities);
				productHasQuantity::insert($quantities);
			}
			
			
			return response([
				"status"=>true,
				"data" => $product,
				"message" => "Product created successfully"
			],200);
			
		} catch (\Throwable $th) {
			dd($th->getMessage());
		}
	}
	public function saveOffer(Request $request){
		try {
			if(empty($request->products))
			return response(["status" => false,"message" => "No products selected"],400);
			if(Offer::where("name","LIKE","%".$request->name."%")->count() > 0)
			return response(["status" => false,"message" => "Offer already exist"],400);
			foreach($request->products as $product){
				// $prod_mod = Product::find($product["product_id"]);
				// $prod_comp = new ComponentsProduct($prod_mod);
				// if($prod_comp->onOffer){
				// 	$prod_comp->offer->products->where("id",$prod_mod->id)->each->delete();
				// }
				$product_id_list[] =  $product["product_id"];
			}
			offerHasProduct::whereIn("product_id",$product_id_list)->delete();
			$imagesInsert = [];
			$offer = [];
			$offer["start_date"] = $request->from_date;
			$offer["end_date"] = $request->to_date;
			$offer["name"] = $request->name;
			$offer["title"] = $request->title;
			$offer["sub_title"] = $request->sub_title;
			$offer["created_by"] = $request->user_id;
			$offer["status"] = $request->status;
			$detail = [];
			

			$offer = Offer::create($offer);
			foreach ($request->images as $key => $value) {				
				$imagesInsert[] = [
					"offer_id" => $offer->id,
					"image" => $value["image"],
					"status" => $value["status"],
				];				
			}
			$detail["type"] = $request->type;
			$detail["value"] = $request->value;
			$detail["offer_id"] = $offer->id;
			$detail["view_class"] = "success";
            offerDetail::create($detail);

			offerImage::insert($imagesInsert);
			foreach ($request->products as  $product) {				
				$iproductsInsert[] = [
					"offer_id" => $offer->id,
					"product_id" => $product["product_id"],
					"status" => $product["status"],
				];				
			}
			offerHasProduct::insert($iproductsInsert);
			$offer->images = $offer->images;
			$offer->products = $offer->products;
			return response(["status"=>true,"data"=>$offer],200);


			
		} catch (\Throwable $th) {
			$this->logger("save_offer", array("error" => $th->getMessage()));
			return response(array('status' => false, "message" => $this->errorMessage, "error" => $th->getMessage()), 400);
		}
	}
	public function editOffer($id,Request $request){
		try {
			if(empty($request->products))
			return response(["status" => false,"message" => "No products selected"],400);
			$imagesInsert = [];
			$offer = [];
			$offer["start_date"] = $request->from_date;
			$offer["end_date"] = $request->to_date;
			$offer["name"] = $request->name;
			$offer["title"] = $request->title;
			$offer["sub_title"] = $request->sub_title;
			$offer["created_by"] = $request->user_id;
			$offer["status"] = $request->status;
			$detail = [];
			Offer::find($id)->update($offer);
			$offer =Offer::find($id);
			foreach ($request->images as $key => $value) {				
				$imagesInsert[] = [
					"offer_id" => $offer->id,
					"image" => $value["image"],
					"status" => $value["status"],
				];				
			}
			$offer->images->each->delete();
			offerImage::insert($imagesInsert);
			$detail["type"] = $request->type;
			$detail["value"] = $request->value;
			$detail["offer_id"] = $offer->id;
			$detail["view_class"] = "success";
			if(!empty($offer->detail))
			$offer->detail->update($detail);
			else
             offerDetail::create($detail);
			foreach ($request->products as  $product) {				
				$iproductsInsert[] = [
					"offer_id" => $offer->id,
					"product_id" => $product["product_id"],
					"status" => $product["status"],
				];				
			}
			$offer->products->each->delete();
			offerHasProduct::insert($iproductsInsert);
			$offer->images = $offer->images;
			$offer->products = $offer->products;
			return response(["status"=>true,"data"=>$offer],200);

		} catch (\Throwable $th) {
			$this->logger("save_offer", array("error" => $th->getMessage()));
			return response(array('status' => false, "message" => $this->errorMessage, "error" => $th->getMessage()), 400);
		}
	}
	public function savePage(Request $request){
		try {
			if (Page::where("slug",$request->slug)->count() > 0) {
				return response(array('status' => false, "message" => "Section already exists"), 400);
			}
			$section = [];
			$section["name"] = $request->name;
			$section["title"] = $request->title;
			$section["slug"] = $request->slug;
			$section["full_url"] = "pages/".$request->slug;
			$section["description"] = $request->description;
			$section["status"] = $request->status;
			$section["content"] = $request->content;
			$items = [];
			$section = Page::create($section);
			if(!empty($$request->items)){
				foreach($request->items as $item){
					foreach ($item["model_id_list"] as $key =>$sItem) {
						$items[] = [
							"model" => $item["model"],
							"model_id" => $sItem["item_id"],
							"status" => $sItem["status"],
							"page_id" => $section->id
						];
					}
				}
				pageHasModel::insert($items);
			}
		
			return response(array('status' => true, "message" => "Page created successfully", "data" => $section), 200);

		} catch (\Throwable $th) {
			$this->logger("save_section", array("error" => $th->getMessage()));
			return response(array('status' => false, "message" => $this->errorMessage, "error" => $th->getMessage()), 400);
		}
	}
	public function saveSection(Request $request)
	{
		try {
			if (Page::where("slug",$request->slug)->count() > 0) {
				return response(array('status' => false, "message" => "Section already exists"), 400);
			}
			$section = [];
			$section["name"] = $request->name;
			$section["title"] = $request->title;
			$section["slug"] = $request->slug;
			$section["redirect_url"] = $request->redirect_url;
			$section["redirect_text"] = $request->redirect_text;
			$section["sub_title"] = $request->sub_title;	
			$section["status"] = $request->status;
			$items = [];
			$section = Section::create($section);
			foreach($request->items as $item){
				foreach ($item["model_id_list"] as $key =>$sItem) {
					$items[] = [
						"model" => $item["model"],
						"model_id" => $sItem["item_id"],
						"status" => $sItem["status"],
						"section_id" => $section->id
					];
				}
			}
			sectionHasModel::insert($items);
			return response(array('status' => true, "message" => "Section created successfully", "data" => $section), 200);

		} catch (\Throwable $th) {
			$this->logger("save_section", array("error" => $th->getMessage()));
			return response(array('status' => false, "message" => $this->errorMessage, "error" => $th->getMessage()), 400);
		}
	}
	public function editPage($id,Request $request)
	{
		try {
			if (Page::where("slug",$request->slug)->where("id","!=",$id)->count() > 0) {
				return response(array('status' => false, "message" => "Page already exists"), 400);
			}
			$update = [];
			$update["name"] = $request->name;
			$update["title"] = $request->title;
			$update["slug"] = $request->slug;
			$update["full_url"] = "pages/".$request->slug;
			$update["description"] = $request->description;
			$update["created_by"] = $request->user_id;
			$update["status"] = $request->status;
			$update["content"] = $request->content;
			$items = [];
			$update = Page::where("id",$id)->update($update);
			if(!empty($request->items)){
				$section  = Page::find($id);
				$section->items->each->delete();
				foreach($request->items as $item){
					foreach ($item["model_id_list"] as $key =>$sItem) {
						$items[] = [
							"model" => $item["model"],
							"model_id" => $sItem["item_id"],
							"status" => $sItem["status"],
							"page_id" => $section->id
						];
					}
				}
				pageHasModel::insert($items);
			}

			return response(array('status' => true, "message" => "Page updated successfully", "data" => $section), 200);
		} catch (\Throwable $th) {
			$this->logger("save_section", array("error" => $th->getMessage()));
			return response(array('status' => false, "message" => $this->errorMessage, "error" => $th->getMessage()), 400);
		}
	}
	public function editSection($id,Request $request)
	{
		try {
			if (Section::where("slug",$request->slug)->where("id","!=",$id)->count() > 0) {
				return response(array('status' => false, "message" => "Section already exists"), 400);
			}
			$update = [];
			
			$update["title"] = $request->title;
			$update["slug"] = $request->slug;
			$update["redirect_url"] = $request->redirect_url;
			$update["redirect_text"] = $request->redirect_text;
			$update["sub_title"] = $request->sub_title;
			$update["background_image"] = $request->background_image;	
			$update["status"] = $request->status;
			$items = [];
			$update = Section::where("id",$id)->update($update);
			$section  = Section::find($id);
			$section->items->each->delete();
			foreach($request->items as $item){
				foreach ($item["model_id_list"] as $key =>$sItem) {
					$items[] = [
						"model" => $item["model"],
						"model_id" => $sItem["item_id"],
						"status" => $sItem["status"],
						"section_id" => $section->id
					];
				}
			}
			sectionHasModel::insert($items);
			return response(array('status' => true, "message" => "Section updated successfully", "data" => $section), 200);

		} catch (\Throwable $th) {
			$this->logger("edit_section", array("error" => $th->getMessage()));
			return response(array('status' => false, "message" => $this->errorMessage, "error" => $th->getMessage()), 400);
		}
	}
	public function saveCollection(Request $request){
		try {
			$imagesInsert = [];
			$collection = [];
			$collection["name"] = $request->name;
			$collection["title"] = $request->title;
			$collection["sub_title"] = $request->sub_title;
			$collection["created_by"] = $request->user_id;
			$collection["status"] = $request->status;
			$detail = [];		

			$collection = Collection::create($collection);
			foreach ($request->images as $key => $value) {				
				$imagesInsert[] = [
					"collection_id" => $collection->id,
					"image" => $value["image"],
					"status" => $value["status"],
				];				
			}
			
			collectionImage::insert($imagesInsert);
			foreach ($request->products as  $product) {				
				$iproductsInsert[] = [
					"collection_id" => $collection->id,
					"product_id" => $product["product_id"],
					"status" => $product["status"],
				];				
			}
			collectionHasProduct::insert($iproductsInsert);
			
			return response(["status"=>true,"data"=>$collection->getOne()],200);


			
		} catch (\Throwable $th) {
			$this->logger("save_collection", array("error" => $th->getMessage()));
			return response(array('status' => false, "message" => $this->errorMessage, "error" => $th->getMessage()), 400);
		}
	}
	public function editCollection($id,Request $request){
		try {
			$imagesInsert = [];
			$collection = [];
			$collection["name"] = $request->name;
			$collection["title"] = $request->title;
			$collection["sub_title"] = $request->sub_title;
			$collection["created_by"] = $request->user_id;
			$collection["status"] = $request->status;
			$detail = [];		
			
			$collection = Collection::find($id)->update($collection);
			$collection = Collection::find($id);
			
			foreach ($request->images as $key => $value) {				
				$imagesInsert[] = [
					"collection_id" => $collection->id,
					"image" => $value["image"],
					"status" => $value["status"],
				];				
			}
			$collection->images->each->delete();
			collectionImage::insert($imagesInsert);
			foreach ($request->products as  $product) {				
				$iproductsInsert[] = [
					"collection_id" => $collection->id,
					"product_id" => $product["product_id"],
					"status" => $product["status"],
				];				
			}
			$collection->products->each->delete();
			collectionHasProduct::insert($iproductsInsert);
			
			return response(["status"=>true,"data"=>$collection->getOne()],200);


			
		} catch (\Throwable $th) {
			$this->logger("save_collection", array("error" => $th->getMessage()));
			return response(array('status' => false, "message" => $this->errorMessage, "error" => $th->getMessage()), 400);
		}
	}
	public function updateProduct($id,Request $request){
		try {
			$updateData = $request->all();
			unset($updateData['product_has_images']);
			unset($updateData['product_has_variants']);
			unset($updateData['product_has_quantities']);			
			$product = Product::find($id);
		    $product->update($updateData);
			$_SESSION["product"] = $product;
			$images = json_decode($request->product_has_images,true);
			$images = array_map(function($arr){
				return $arr + ['product_id' => $_SESSION["product"]->id];
			}, $images);
			
			$product->images->each->delete(); 
			productHasImage::insert($images);
			$variants = json_decode($request->product_has_variants,true);
			$variantsInsert = [];
			foreach ($variants as $key => $value) {				
				$variantsInsert[] = [
					"product_id" => $product->id,
					"variant_id" => $value["varient_id"],
					"status" => "1"
				];				
			}		
			$product->variants->each->delete();	
			productHasVariant::insert($variantsInsert);			
			$variantsInsert = [];
			foreach ($variants as  $value) {
				foreach ($value["variant_value_list"] as  $val) {
					if(!isset($val["product_variant_value_id"]))
					$variantsInsert[] = [
						"product_id" => $product->id,
						"variant_id" => $value["varient_id"],
						"variant_value_id" => $val,
						"status" => "1"
					];
				}
			}
			productHasVariantValue::where("product_id",$product->id)->delete();
			productHasVariantValue::insert($variantsInsert);
			
			$quantities = json_decode($request->product_has_quantities,true);
			$quantities = array_map(function($arr){
				return $arr + ['product_id' => $_SESSION["product"]->id];
			}, $quantities);
			$product->quantities->each->delete();
			productHasQuantity::insert($quantities);			
			return response([
				"status"=>true,
				"data" => $product,
				"message" => "Product updated successfully"
			],200);
			
		} catch (\Throwable $th) {
			dd($th->getMessage());
		}
	}
	public function select2($asset_title)
	{
		$asset = StaticAsset::where('title', $asset_title)->first();
		if ($asset->asset_key == 'int') {
			foreach (json_decode($asset->list_json) as $key => $value) {
				$json[] = [
					'id' => $key + 1,
					'text' => $value
				];
			}
		} else {
			foreach (json_decode($asset->list_json) as $key => $value) {
				$json[] = [
					'id' => $value,
					'text' => $value
				];
			}
		}
		return response($json, 200);
	}
	public function select2Model($model,$field,Request $request)
	{
		$model = "\\App\\Models\\" . $model;
		$model = new $model();
		$json = [];
		if (isset($request->search) && !empty($request->search)) {
			$model = $model->where($field,"LIKE","%".$request->search."%");		}
		if(isset($request->filters) && !empty(count($request->filters))){
			foreach ($request->filters as $key => $value) {
				$model = $model->where($value["field"],$value["value"]);
			}
		}
		$assets = $model->get();
	
			foreach ($assets as $key => $value) {
				$json[] = [
					'id' => $value->id,
					'text' => $value->{$field}
				];
			}
	
		return response($json, 200);
	}
	public function registration(Request $request)
	{
		$this->log_slug = "user_register_error_";
		$this->errorMessage = "Please provide a valid image file";
		$image_path = "profileimage/default.png";


		try {
			$validator = Validator::make($request->all(), [
				"name" => "required|string|min:5",
				"contact" => "required|string|min:10|unique:users",
				"password" => "required|string|min:6|confirmed"
			]);
			if ($validator->fails()) {
				return response(['status' => false, "errors" => $validator->errors(),"message"=>"Validation error, please check the form"], 400);
			}
			if (isset($request->email) && !empty($request->email)) {
				$validator_email = Validator::make($request->all(), [
					"email" => "required|email|unique:users",
				]);
				if ($validator_email->fails()) {
					return response(['status' => false, "errors" => $validator_email->errors(),"message"=>"Validation error, please check the form"], 400);
				}
			}
			$new_user = User::create([
				'name' => $request->name,
				'contact' => $request->contact,
				'password' => Hash::make($request->password),
				'role' => 'user',
				'email' => @$request->email
			]);
			if (isset($request->image) && !empty($request->image)) {
				$validator_image = Validator::make($request->all(), [
					"image" => "image|mimes:jpg,png",
				]);
				if ($validator_image->fails()) {
					return response(['status' => false, "errors" => $validator_image->errors(),"message"=>"Validation error, please check the form"], 400);
				}
				$image_path =  request('image')->store('profileimage', 'public');
			}

			if (isset($request->includeProfile) && $request->includeProfile) {
				$validator_profile = Validator::make($request->all(), [
					// "dob" => "string|min:8",
					// "age" => "string|min:1",
				]);
				if ($validator_profile->fails()) {
					return response(['status' => false, "errors" => $validator_profile->errors(),"message"=>"Validation error, please check the form"], 400);
				}
				$new_profile = Profile::create([
					'user_id' => $new_user->id,
					'dob' => $request->dob,
					'age' => $request->age,
					'image' => $image_path
				]);
			}

			if (isset($request->includeAddress) && $request->includeAddress) {
				$validator_address = Validator::make($request->all(), [
					"address_line_1" => "required|string|min:8",
					"zip_code" => "required|string|min:6",

				]);
				if ($validator_address->fails()) {
					return response(['status' => false, "errors" => $validator_address->errors(),"message"=>"Validation error, please check the form"], 400);
				}
				$new_address = Address::create([
					'user_id' => $new_user->id,
					'address_line_1' => $request->address_line_1,
					'address_line_2' => @$request->address_line_2,
					'district' => @$request->district,
					'state' => @$request->state,
					"landmark"=>@$request->landmark,
					'zip_code' => $request->zip_code,
				]);
			}
			if($request->role)
			$new_user->assignRole($request->role);
			else
			$new_user->assignRole('user');
			//$user->getDirectPermissions(); 

			return response(['status' => true, "message" => "User registered successfully. ", "data" => $new_user], 200);
		} catch (\Throwable $th) {
			$this->logger($this->log_slug , array("error" => $th->getMessage(),"data"=>$request->all()));
			if (isset($new_user) && !empty($new_user)) {
				$new_user->delete();
			}
			if (isset($new_profile) && !empty($new_profile)) {
				$new_profile->delete();
			}
			if (isset($new_address) && !empty($new_address)) {
				$new_address->delete();
			}
			
			
			return response(['status' => false, "message" => "Something went wrong","errors"=>$th->getMessage()], 400);
		}
	}
	public function updateUser(Request $request)
	{

		$this->log_slug = "user_update_error_";
		$this->errorMessage = "Please provide a valid image file";
		$user = User::find($request->id);
		$image_path = @$user->profile->image;
		if (empty($image_path)) {
			$image_path = "profileimage/default.png";
			# code...
		}
		$email = @$user->email;


		try {
			$validator = Validator::make($request->all(), [
				"name" => "required|string|min:5",
				]);
			if ($validator->fails()) {
				return response(['status' => false, "errors" => $validator->errors(),"message"=>"Validation error, please check the form"], 400);
			}
			else{
				$user->name = $request->name;
			}
			if (isset($request->email) && !empty($request->email) && empty($email)) {
				$validator_email = Validator::make($request->all(), [
					"email" => "required|email|unique:users",
				]);
				if ($validator_email->fails()) {
					return response(['status' => false, "errors" => $validator_email->errors(),"message"=>"Validation error, please check the form"], 400);
				}
			}
			else{
				$user->email = $request->email;
			}
			$user->save();
			
			
			if (isset($request->image) && !empty($request->image) && $request->hasFile("image")) {
				$validator_image = Validator::make($request->all(), [
					"image" => "image|mimes:jpg,png",
				]);
				if ($validator_image->fails()) {
					return response(['status' => false, "errors" => $validator_image->errors(),"message"=>"Validation error, please check the form"], 400);
				}
				else{
					$image_path =  request('image')->store('profileimage', 'public');
				}
				
			}

			if (isset($request->includeProfile) && $request->includeProfile) {
				$validator_profile = Validator::make($request->all(), [
					// "dob" => "string|min:8",
					// "age" => "string|min:1",
				]);
				if ($validator_profile->fails()) {
					return response(['status' => false, "errors" => $validator_profile->errors(),"message"=>"Validation error, please check the form"], 400);
				}
				else{

				}

				$new_profile = $user->profile->update([
					'user_id' => $user->id,
					'dob' => @$request->dob,
					'age' => @$request->age,
					'image' => $image_path
				]);
			}
			elseif(empty($user->profile())){
				$new_profile = Profile::create([
					'user_id' => $user->id,
					'dob' => @$request->dob,
					'age' => @$request->age,
					'image' => $image_path
				]);
			}

			if (isset($request->includeAddress) && $request->includeAddress) {
				$validator_address = Validator::make($request->all(), [
					"address_line_1" => "required|string|min:8",
					"zip_code" => "required|string|min:6",

				]);
				if ($validator_address->fails()) {
					return response(['status' => false, "errors" => $validator_address->errors(),"message"=>"Validation error, please check the form"], 400);
				}
				$new_address = $user->address->update([
					'user_id' => $user->id,
					'address_line_1' => $request->address_line_1,
					'address_line_2' => @$request->address_line_2,
					'district' => @$request->district,
					'state' => @$request->state,
					'zip_code' => $request->zip_code,
				]);
			}
			elseif(empty($user->address())){
				$new_address =Address::create([
					'user_id' => $user->id,
					'address_line_1' => $request->address_line_1,
					'address_line_2' => @$request->address_line_2,
					'district' => @$request->district,
					'state' => @$request->state,
					"landmark"=>@$request->landmark,
					'zip_code' => $request->zip_code,
				]);
			}
			$user->profile();
			$user->address();

			return response(['status' => true, "message" => "User Updated successfully. ", "data" => $user], 200);
		} catch (\Throwable $th) {
			$this->logger($this->log_slug , array("error" => $th->getMessage(),"data"=>$request->all()));
			if (isset($new_user) && !empty($new_user)) {
				$new_user->delete();
			}
			if (isset($new_profile) && !empty($new_profile)) {
				$new_profile->delete();
			}
			if (isset($new_address) && !empty($new_address)) {
				$new_address->delete();
			}
			
			
			return response(['status' => false, "message" => "Something went wrong","errors"=>$th->getMessage()], 400);
		}
	}
	public function productVarientData(Request $request)
    {
      $recordsQuery = new Product;
      $sort=0;
      $searchValue = $request->searchValue;
      if($searchValue!=""){
        $sort=1;
        $request->searchValue = $searchValue;
        $recordsQuery=$recordsQuery->where('short_name', 'LIKE', '%' .$request->searchValue. '%')
         ->orWhere('brand', 'LIKE', '%' . $request->searchValue. '%')
         ->orWhere('title', 'LIKE', '%' . $request->searchValue. '%');
    }
    $recordsQuery = $recordsQuery->where('varient_of','0');
    $products = $recordsQuery->get()->take(20);
    $array = [];
    foreach ($products as $key => $value) {
      $array[] = [
        'id'=>$value->id,
        'text'=>$value->short_name
      ];
    }
    return response($array,200);
    }
    public function productGetData($id)
    {
     $product = Product::find($id);
     	# code...
     return response(['status' => true, "data" => $product,"message"=>"Product details fetched successfully"], 200);
    }
	public function changePassword(Request $request){
		$validator_password = Validator::make($request->all(), [
			"id" => "required|exists:users",
			"contact"=>"required|exists:users",
			"password" => "required|string|min:6|confirmed",

		]);
		if ($validator_password->fails()) {
			return response(['status' => false, "errors" => $validator_password->errors(),"message"=>"Validation error, please check the form"], 400);
		}
		else{
			$user = User::find($request->id);
			$user->password = Hash::make($request->password);
			$user->save();
			return response(['status' => true,"message"=>"Password changed successfully"], 200);
		}
	}
	public function getStatesOrDistricts(Request $request,$state_name=null){
        $json = Storage::disk('local')->get('/public/json_files/state_district.json');
        $json = json_decode($json,true);
        if (!empty($state_name)) {
            foreach ($json['states'] as $key => $state) {
               if ($state['state'] === urldecode($state_name)) {
                 $districts = $state['districts'];
               }
             }
             foreach ($districts as $key => $value) {
               $data[] = [
                   'id'=>$value,
                   'text'=>$value
               ];
             }
        }
		else
        foreach ($json['states'] as $key => $state) {
           $data[] =[
               'id'=> $state['state'],
               'text' =>$state['state']
                       ];
					   
        }

        echo json_encode(["items"=>$data]);
    }
	public function centreDoctors(Request $request)
	{
		if (isset($request->centres) && !empty($request->centres)) {
			$centre_id_list =json_decode($request->centres);
			$centres = Centre::whereIn('id',$centre_id_list)->get();
			$doctor_ids = [];
			foreach ($centres as $key => $centre) {
				$doctor_ids = array_merge($doctor_ids,json_decode($centre->doctors_list_json,true));
			}
			$doctors = Doctor::whereIn('id',$doctor_ids)->get();
		}
		else{
			$doctors = Doctor::whereNull('deleted_at')->where('name',"LIKE","%".$request->search."%")->get();
		}
		$data = [];

		foreach ($doctors as $key => $doctor) {
			$data[] =[
				'id'=> $doctor->id,
				'text' =>"Dr. ".strtoupper($doctor->name).", ".$doctor->specialist,
				"selected"=>'true'
						];
		}
		echo json_encode(["items"=>$data]);
	}
	public function createSlots(Request $request)
	{
		$doctor_id_list = json_decode($request->doctor_id_list,true);
		$doctors = Doctor::whereIn('id',$doctor_id_list)->get();
		if (empty($doctors)) {
		$doctors = Doctor::whereNotNull('deleted_at')->get();		
		}
		$slots_created = 0;
		$from_date = date("Y-m-d",strtotime($request->from_date));
		$to_date = date("Y-m-d",strtotime($request->to_date));
		$period = new \DatePeriod(
			new \DateTime($from_date),
			new \DateInterval('P1D'),
			new \DateTime($to_date)
	    );
		//return response(['status' => true, "message" => "Something went wrong with type","dates"=>$period], 200);
		foreach ($doctors as $key => $doctor) {
			$doctor->visits();
			switch ($doctor->visits->frequency) {
				case 'daily':
					foreach ($period as $key => $value) {
						if ($this->entrySlot($doctor->id,$value->format('Y-m-d'),null,$doctor->visits->others_json)) {
						$slots_created++;
						}
					}
					
					break;
				case 'weekly':
					$days = json_decode($doctor->visits->days,true);
					foreach ($period as $key => $value) {
						$week_day_no = 	date('w',strtotime($value->format('Y-m-d')));		
						if (in_array(++$week_day_no,$days)) {
							if ($this->entrySlot($doctor->id,$value->format('Y-m-d'),null,$doctor->visits->others_json)) {
								$slots_created++;
								}
						}
					}
					break;
				case 'monthly':
					switch ($doctor->visits->type) {
						case 'week_nos':
						$days = json_decode($doctor->visits->days,true);
						$week_nos =  json_decode($doctor->visits->week_no,true);
					foreach ($period as $key => $value) {
					//	return response([date('',strtotime($value->format('Y-m-d')))]);
						if (in_array($this->weekOfMonth(strtotime($value->format('Y-m-d'))),$week_nos)) {
							$week_day_no = 	date('w',strtotime($value->format('Y-m-d')));					
							if (in_array(++$week_day_no,$days)) {
								if ($this->entrySlot($doctor->id,$value->format('Y-m-d'),null,$doctor->visits->others_json)) {
									$slots_created++;
									}
							}
						}
						
					}
							break;
							case 'dates':
								$dates = json_decode($doctor->visits->dates,true);
								foreach ($period as $key => $value) {
								if (in_array(date('d',strtotime($value->format('Y-m-d'))),$dates)) {
									if ($this->entrySlot($doctor->id,$value->format('Y-m-d'),null,$doctor->visits->others_json)) {
										$slots_created++;
										}
								}
						    	}
								break;
						
						default:
						return response(['status' => false, "message" => "Something went wrong with type"], 400);
							break;
					}
					break;
				default:
				return response(['status' => false, "message" => "Something went wrong with frequency, ".$doctor->visits->frequency], 400);
					break;
			}
			$result_array[] =[
				'doctor_id'=>$doctor->id,
				'doctor_name' =>$doctor->name,
				'slots_created'=>$slots_created
			] ;
			$slots_created = 0;
		}
		return response(['status' => true, "result" => $result_array,"message"=>"New slots created"], 200);
	}
	private function entrySlot($doc_id,$date,$cen_id=null,$timmings){
		
		$timming = json_decode($timmings);
		$from_time = $timming->from_time;
		$to_time = $timming->to_time;
		$doctor = Doctor::find($doc_id);
		$centre_id = (empty($cen_id)) ? json_decode($doctor->centre_id_json,true)[0] : $cen_id ;
		$repeat = Slots::where('doctor_id',$doc_id)->where('centre_id',$centre_id)->where('date',$date)->count();
		if (empty($repeat)) {
			Slots::create([
				'centre_id'=>$centre_id,
				'doctor_id' =>$doctor->id,
				'date'=>$date,
				'from_time'=>$from_time,
				'to_time'=>$to_time,
				'free_slots'=>20
			]);
			return true;
		}
		else return false;
	}
	private function weekOfMonth($date) {
		//Get the first day of the month.
		$firstOfMonth = strtotime(date("Y-m-01", $date));
		//Apply above formula.
		return $this->weekOfYear($date) - $this->weekOfYear($firstOfMonth);
	}
	
	private function weekOfYear($date) {
		$weekOfYear = intval(date("W", $date));
		if (date('n', $date) == "1" && $weekOfYear > 51) {
			// It's the last week of the previos year.
			return 0;
		}
		else if (date('n', $date) == "12" && $weekOfYear == 1) {
			// It's the first week of the next year.
			return 53;
		}
		else {
			// It's a "normal" week.
			return $weekOfYear;
		}
	}
	public function bookAppointment(Request $request)
	{
		$log_slug = "booking_error_";
		try {
			$validator_password = Validator::make($request->all(), [
				"booking_date" => "required",
				"booking_type" => "required",
				"user_contact"=>"required|min:10",
				"user_name" => "required|string|min:5",
				"centre_id" => "required|exists:centres,id",
				"doctor_id" => "required|exists:doctors,id",
				"amount_paid" => "required",
				"amount_due" => "required",
				"payment_id" => "required|exists:payments,id"
	
			]);
			if ($validator_password->fails()) {
				$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> $validator_password->errors()]);
				return response(['status' => false, "errors" => $validator_password->errors(),"message"=>"Invalid booking request"], 400);
			}
			$slot = Slots::where('doctor_id',$request->doctor_id)->whereDate('date',$request->booking_date)->where('centre_id',$request->centre_id)->first();
			if (empty($slot) || empty($slot->free_slots)) {
				$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> "Insufficient slots"]);
				return response(['status' => false, "errors" => "Insufficient slots","data"=>"Insufficient slots! Please try with a different date"], 400);
			}
			if (strtotime('now')>strtotime($request->booking_date)) {
				$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> "Invalid booking date"]);
				return response(['status' => false, "errors" => "Invalid booking date","message"=>"Invalid booking date"], 400);
			}
			if (!empty(User::where('contact',$request->user_contact)->count())) {
				$request->user_id = User::where('contact',$request->user_contact)->first()->id;
				$array = array_merge($request->all(),['user_id'=>$request->user_id]);
			}
			else{
				$request->user_id = 'guest';
				$array = array_merge($request->all(),['user_id'=>'guest']);
			}
			$array = array_merge($array,['centre_contact'=>Centre::find($request->centre_id)->details]);
			$array = array_merge($array,['centre_address'=>Centre::find($request->centre_id)->address]);
			//$request->centre_contact = Centre::find($request->centre_id)->details;
		
			$repeat = Booking::where('user_contact',$request->contact)->whereDate('booking_date',$request->booking_date)->where('doctor_id',$request->doctor_id)->where('centre_id',$request->centre_id)->count();
			if (!empty($repeat)) {
				$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> "Duplicate booking request"]);
				return response(['status' => false, "errors" => $validator_password->errors(),"message"=>"Duplicate booking request"], 400);	
			}
			$booking = Booking::create($array);
			$booking_log =new AppointmentController($booking->id);
			$details = $booking_log->setBookingDetails();
			$slot->free_slots  = $slot->free_slots-1;
			$slot->save();
			event(new NewBooking($booking));
			return response(['status' => true, "data" => $array,"message"=>"Booking inserted","details"=>$details], 200);
		} catch (\Throwable $th) {
			$this->logger($log_slug.date("Y-m-d_H-i-s"),["errors"=> $th->getMessage()]);
		    return response(['status' => false, "errors" => $th->getMessage(),"message"=>"Something went wrong!"], 400);	
		}
	}
	public function validateAppointment(Request $request){
		$log_slug = "booking_validate_error_";
		return response(['status' => true, "data" => [],"message"=>"Booking is valid"], 200);
		try {
			$validator_password = Validator::make($request->all(), [
				"booking_date" => "required",
				"booking_type" => "required",
				"user_contact"=>"required|min:10",
				"user_name" => "required|string|min:5",
				"centre_id" => "required|exists:centres,id",
				"doctor_id" => "required|exists:doctors,id",
			]);
			if ($validator_password->fails()) {
				$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> $validator_password->errors()]);
				return response(['status' => false, "errors" => $validator_password->errors(),"message"=>"Invalid booking request"], 400);
			}
			$slot = Slots::where('doctor_id',$request->doctor_id)->whereDate('date',$request->booking_date)->where('centre_id',$request->centre_id)->first();
			if (empty($slot) || empty($slot->free_slots)) {
				$this->logger($log_slug.date("Y-m-d_H-i-s"),["errors"=> "Insufficient slots"]);
				return response(['status' => false, "errors" => "Insufficient slots","message"=>"Insuficient slots! Please try with a different date"], 400);
			}
			if (strtotime('now')>strtotime($request->booking_date)) {
				$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> "Invalid booking date"]);
				return response(['status' => false, "errors" => "Invalid booking date","message"=>"Invalid booking date"], 400);
			}
			if (!empty(User::where('contact',$request->user_contact)->count())) {
				$request->user_id = User::where('contact',$request->user_contact)->first()->id;
				$array = array_merge($request->all(),['user_id'=>$request->user_id]);
			}
			else{
				$request->user_id = 'guest';
				$array = array_merge($request->all(),['user_id'=>'guest']);
			}
			$array = array_merge($array,['centre_contact'=>Centre::find($request->centre_id)->details]);
			$array = array_merge($array,['centre_address'=>Centre::find($request->centre_id)->address]);
			//$request->centre_contact = Centre::find($request->centre_id)->details;
		
			$repeat = Booking::where('user_contact',$request->contact)->whereDate('booking_date',$request->booking_date)->where('doctor_id',$request->doctor_id)->where('centre_id',$request->centre_id)->count();
			if (!empty($repeat)) {
				$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> "Duplicate booking request"]);
				return response(['status' => false, "errors" => $validator_password->errors(),"message"=>"Duplicate booking request"], 400);	
			}	
			return response(['status' => true, "data" => $array,"message"=>"Booking is valid"], 200);
		} catch (\Throwable $th) {
			$this->logger($log_slug.date("Y-m-d_H-i-s"),["errors"=> $th->getMessage()]);
		    return response(['status' => false, "errors" => $th->getMessage(),"message"=>"Something went wrong!"], 400);	
		}

	}
	public function placeOrder(Request $request)
	{
		$log_slug = "order_error_";
		try {
			$validator_password = Validator::make($request->all(), [
				"order_type" => "required",
				"id" => "required",
				"payment_type"=>"required",
				"total" => "required",
				"status" => "required",
				"user_contact" => "required",
				"payment_id" => "exists:payments,id"
	
			]);
			if ($validator_password->fails()) {
				$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> $validator_password->errors()]);
				return response(['status' => false, "errors" => $validator_password->errors(),"message"=>"Invalid order request"], 400);
			}
			
			if (!empty(User::where('contact',$request->user_contact)->count())) {
				$request->user_id = User::where('contact',$request->user_contact)->first()->id;
				$array = array_merge($request->all(),['user_id'=>$request->user_id]);
			}
			elseif(!empty(Contact::where('number',$request->user_contact)->count())){
				$request->contact_id = Contact::where('number',$request->user_contact)->first()->id;
				$array = array_merge($request->all(),['contact_id'=>$request->contact_id]);
			}
			else{
				$contactData = [
					"number"  => $request->user_contact,
					"name"    => @$request->user_name,
					"address" => @$request->user_address,
				];

				$contact = Contact::create($contactData);
				$request->contact_id = $contact->id;
				$array = array_merge($request->all(),['contact_id'=>$request->contact_id]);
			}
			
			unset($array["table_name"]);		
			unset($array["table_model"]);		
			unset($array["id"]);	
			$order = Order::where("id",$request->id)->update($array) ? Order::where("id",$request->id)->first() : null;
			if(empty($order))
			{
				$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> "Order update function issue"]);
				return response(['status' => false, "errors" => null,"message"=>"Order could not be updated"], 400);
			
			}

			event(new NewOrder($order));
			return response(['status' => true, "data" => $array,"message"=>"Order placed successfully","details"=>$order], 200);
		} catch (\Throwable $th) {
			$this->logger($log_slug.date("Y-m-d_H-i-s"),["errors"=> $th->getMessage()]);
		    return response(['status' => false, "errors" => $th->getMessage(),"message"=>"Something went wrong!"], 400);	
		}
	}
	public function placeOnlineOrder(Request $request)
	{
		$log_slug = "online_order_error_";
		try {
			
			$validator_password = Validator::make($request->all(), [
				"payment_type"=>"required",
				"total" => "required",
				"user_contact" => "required",
				"payment_id" => "exists:payments,id"	
			]);

			
			if ($validator_password->fails()) {
				$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> $validator_password->errors()]);
				return response(['status' => false, "errors" => $validator_password->errors(),"message"=>"Invalid order request"], 400);
			}
			
			if (!empty(User::where('contact',$request->user_contact)->count())) {
				// $request->user_id = User::where('contact',$request->user_contact)->first()->id;
				 $array = array_merge($request->all(),['user_id'=>$request->user_id]);
			}
			elseif(!empty(Contact::where('number',$request->user_contact)->count())){
				$request->contact_id = Contact::where('number',$request->user_contact)->first()->id;
				$array = array_merge($request->all(),['contact_id'=>$request->contact_id]);
			}
			else{
				$contactData = [
					"number"  => $request->user_contact,
					"name"    => @$request->user_name,
					"address" => @$request->user_address,
					"email" => @$request->user_email,
				];

				$contact = Contact::create($contactData);
				$request->contact_id = $contact->id;
				$array = array_merge($request->all(),['contact_id'=>$request->contact_id]);
			}
			
			unset($array["table_name"]);		
			unset($array["table_model"]);		
			unset($array["id"]);	
			$array["status"] = "pending";
			$array["order_type"] = "website";
			$order = Order::create($array);


			if(empty($order))
			{
				$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> "Order Insert function issue"]);
				return response(['status' => false, "errors" => null,"message"=>"Order could not be updated"], 400);
			
			}
			$user_finder_id = $request->user_id;
			$order->order_id = time().$order->id;
			$order->save();
			$cart_items = Cart::where("user_id",$user_finder_id)->get();
			//  dd($user_finder_id);
			
			foreach ($cart_items as  $item) {
				$product_price = empty($item->product->on_offer) ? $item->product->pre_price : $item->product->price;
				$orderDetail = [
					"order_id" => $order->order_id,
					"product_id" => $item->product->id,
					"price" => $product_price,
					"quantity" => $item->quantity,
					"subtotal" => $product_price * $item->quantity,
				];
				OrderDetails::create($orderDetail);
				$item->delete();
			}
			
			$trackOrder = new handleOrder($order);

			$charges = $trackOrder->chargesApplicable($cart_items);
			
			
			foreach ($charges as $key => $charge) {
				unset($charge["charge_label"]);
				OrderCharge::create($charge);
			}
			
			$trackOrder->setOrderDetails();
			
			Cart::where("user_id",$user_finder_id)->delete();
			event(new NewOrder($order));			
			return response(['status' => true, "data" => $array,"message"=>"Order placed successfully","	"=>$order], 200);

		} catch (\Throwable $th) {
			$this->logger($log_slug.date("Y-m-d_H-i-s"),["errors"=> $th->getMessage()]);
		    return response(['status' => false, "errors" => $th->getMessage(),"message"=>"Something went wrong!"], 400);	
		}
	}
		public function makeOrder(Request $request)
		{
			$log_slug = "razor_pay_order_error_";
			try {
				if (!isset($request->amount) || !isset($request->order_type) || empty($request->amount) || empty($request->order_type) ) {
				$this->logger($log_slug.date("Y-m-d_H-i-s"),["errors"=> "Razor pay order issue due to insufficient inputs"]);
				return response(['status' => false, "errors" => "Invalid parameters","message"=>"Something went wrong!"], 400);
				}
				$client = new Api($this->api_key, $this->secret_key);
				$id = Payment::whereNotNull('id')->count();
				++$id;
				$receipt_id = $request->order_type.date('His').$id;
				$order  = $client->order->create([
				'receipt' => $receipt_id,
				'amount'  => $request->amount*100,
				'currency' => 'INR'
				]);
				return response(['status' => true, "data" => ['order_id'=>$order->id,'receipt_id'=>$receipt_id],"message"=>"Order created successfully"], 200);
			} catch (\Throwable $th) {
				$this->logger($log_slug.date("Y-m-d_H-i-s"),["errors"=> $th->getMessage()]);
				return response(['status' => false, "errors" => $th->getMessage(),"message"=>"Something went wrong!"], 400);
			}
			
		}
		public function makePurchase(Request $request){
			$log_slug = "payment_entry_error_";
			try {
				$validator_password = Validator::make($request->all(), [
					"status" => "required",
					"type" => "required",
					"user_contact"=>"required",
					"amount" => "required",
					"order_id" => "required"
		
				]);
				if ($validator_password->fails()) {
					$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> $validator_password->errors()]);
					return response(['status' => false, "errors" => $validator_password->errors(),"message"=>"Invalid payment request"], 400);
				}
				if (!empty(User::where('contact',$request->user_contact)->count())) {
					$request->user_id = User::where('contact',$request->user_contact)->first()->id;
					$array = array_merge($request->all(),['user_id'=>$request->user_id]);
				}
				else{
					$request->user_id = 'guest';
					$array = array_merge($request->all(),['user_id'=>'guest']);
				}
				$payment = Payment::create($array);
				return response(['status' => true, "data" => $payment,"message"=>"Payment created successfully"], 200);
			} catch (\Throwable $th) {
				$this->logger($log_slug.date("Y-m-d_H-i-s"),["errors"=> $th->getMessage()]);
				return response(['status' => false, "errors" => $th->getMessage(),"message"=>"Something went wrong!"], 400);
			}
			
			

		}
		public function addToCart(Request $request){
			$log_slug = "add_cart_error_";
			$duplicate = false;
			$json_data = [];
			try {
				$validator_password = Validator::make($request->all(), [
					"user_id" => "required",
					"product_id" => "required|exists:products,id",
					"quantity"=>"required|min:1",			
		
				]);
				if ($validator_password->fails()) {
					$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> $validator_password->errors()]);
					return response(['status' => false, "errors" => $validator_password->errors(),"message"=>"Invalid request","duplicate"=>$duplicate], 400);
				}				
				if (empty(Product::find($request->product_id)->stock)) {
					$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> "Product has gone out of stock"]);
					return response(['status' => false, "errors" => "Product has gone out of stock","message"=>"Product has gone out of stock","duplicate"=>$duplicate], 400);
				}
				if (!empty(Cart::where('user_id',$request->user_id)->where('product_id',$request->product_id)->count())) {
					$x = 0;
					if (isset($request->variants) && !empty(count($request->variants))) {
					$cart_id_list = Cart::where('user_id',$request->user_id)->where('product_id',$request->product_id)->pluck("id");
					$cart_vars = cartHasVariant::whereIn("cart_id",$cart_id_list)->pluck("variant_value");
					$duplicate = false;
					foreach ($request->variants as $variant) {		
						//  echo($variant["value"]);				
						$variant_values[] = $variant["value"];				
					}	
					if(empty(array_diff($variant_values,$cart_vars->toArray())))
				     	$duplicate = true;
				    }	
					else{
						$duplicate = true;
						$x = 2;
					}	
					if($duplicate){
					$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> "Product is already in cart","x" => $x]);
					return response(['status' => false, "errors" => "Product/Variant is already in cart","message"=>"Product is already in cart","duplicate"=>$duplicate, "x" => $x], 400);
					}
			 		
					
				}
				
				$insert = [
					"user_id" => $request->user_id,
					"product_id" => $request->product_id,
					"quantity" => $request->quantity,

				];
				
				// $insert["product_details"] = $json_data;
				$cart = Cart::create($insert);
				// echo "here";
				
				if(isset($request->variants) && !empty(count($request->variants)))
				{
					$json_data["variants"] = $request->variants;
					foreach($request->variants as $variant){
						$insert_data[] = [
							"cart_id" => $cart->id,
							"product_id" => $request->product_id,
							"variant_name" => $variant["variant"],
							"variant_value" => $variant["value"]
						];
					}
					
					cartHasVariant::insert($insert_data);

				}
				if(isset($request->set) ){
					$json_data["set"] = $request->set;			
				}				
				if(isset($request->offer) && !empty($request->offer)){
					// $json["offer"] = json_encode($request->offer);
					$cart->offer_details = json_encode($request->offer);
				}
				$cart->product_details = json_encode($json_data);
				
				$cart->save();

				$cart->product = $cart->product;
				$cartRows = new cartRows;
				$cartHTML = $cartRows->render()->render();
				return response(['status' => true, "data" => $cart->toArray(),"message"=>"Product added into cart","duplicate"=>$duplicate,"cartHTML" => $cartHTML,"count" => $cartRows->cart_items_count], 200);


			}catch(\Throwable $th){
				$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> $th->getMessage()]);
				return response(['status' => false, "errors" => $th->getMessage(),"message"=>"Sorry something went wrong","duplicate"=>$duplicate,"variants" => $th], 400);

			}

		}
		public function removeFromCart(Request $request){
			$log_slug = "remove_cart_error_";
			$duplicate = false;
			try {
				$validator_password = Validator::make($request->all(), [
					"user_id" => "required",
				    "cart_id"=>"required",			
		
				]);
				if ($validator_password->fails()) {
					$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> $validator_password->errors()]);
					return response(['status' => false, "errors" => $validator_password->errors(),"message"=>"Invalid request"], 400);
				}
				
			
				$cart = Cart::find($request->cart_id);
				$cart->delete();
				return response(['status' => true, "data" => $cart,"message"=>"Product removed from cart",], 200);


			}catch(\Throwable $th){
				$this->logger($log_slug.date("Y-m-d_H-i-s"),['data'=>$request->all(),"errors"=> $th->getMessage()]);
				return response(['status' => false, "errors" => $th->getMessage(),"message"=>"Sorry something went wrong"], 400);

			}

		}
		public function changeQuantity(Request $request){
			$cart = Cart::find($request->cart_id);
			$cart->quantity = $request->quantity;
			$cart->save();
			return response(['status'=>true,'message'=>"Quantity updated!","data"=>$cart],200);
		  }
		public function getResources(Request $request){
			$resource_type = $request->resource_type;
			$results = [];
			switch ($resource_type) {
				case 'products':
				
					$products = Product::where('title', 'like', '%' . $request->search . '%')->orWhere('short_name', 'like', '%' . $request->search  . '%')->get()->take(10);
					foreach ($products as $key => $product) {
						$results[] = ['id'=>$product->id,'text'=>$product->short_name];
					}
					break;
				case 'items':			
					$products = Item::whereNotNull("id");
					if($request->search)
					$products =$products->where('name', 'like', '%' . $request->search . '%');
					if($request->filters){
						foreach ($request->filters as $column => $value) {
							$products = $products->WhereIn($column,$value);
						}
					}
					$products = $products->get();
					foreach ($products as $key => $product) {
						$results[] = ['id'=>$product->id,'text'=>$product->name,"price" => $product->price,"unit" => $product->unit];
					}
					break;
				case 'charges':			
					$products = Charge::whereNotNull("id");
					if($request->search)
					$products =$products->where('name', 'like', '%' . $request->search . '%');
					if($request->filters){
						foreach ($request->filters as $column => $value) {
							$products = $products->WhereIn($column,$value);
						}
					}
					$products = $products->get();
					foreach ($products as $key => $product) {
						$results[] = ['id'=>$product->id,'text'=>$product->title,"price" => $product->amount];
					}
					break;
			
				default:
					# code...
					break;
			}
			echo json_encode(["items"=>$results]);
		  
   	    }
		public function saveDailyExpenses(Request $request){
			if (!empty(count($request->row_data))) {
				if(DailyExpense::insert($request->row_data))
				return response(['status'=>true,'message'=>"Expense Created Successfully"],200);
			}
			else{
				return response(['status'=>false,'message'=>"No data Provided"],400);

			}
		}
		public function saveOrderDetails(Request $request){
			if (!empty(count($request->row_data))) {
				$order = Order::where("order_id",$request->order_id)->first();
				$orderInstance = new OrderController($order->id);
				$orderInstance->setConfirmation(count($request->row_data) * 5);
				foreach ($order->orderDetails as $key => $value) {
					$value->delete();
				}
				if(OrderDetails::insert($request->row_data))
				return response(['status'=>true,'message'=>"Order Details Saved Successfully"],200);
			}
			else{
				return response(['status'=>false,'message'=>"No data Provided"],400);

			}
		}
		public function cancelOrderDraft(Request $request){
			$order = Order::where("order_id",$request->order_id)->first();
			if ($order) {
				foreach ($order->orderDetails as $key => $value) {
					$value->delete();
				}
				$order->delete();
				return response(['status'=>true,'message'=>"Order cancelled successfully"],200);
			}
			else
			return response(['status'=>false,'message'=>"No order found"],400);
		}

		public function getOrderDetails($id){
			$order = Order::where("order_id",$id)->first();
			if ($order) {
				foreach ($order->orderDetails as $key => $value) {
					$value->item = $value->item;
					
				}
				foreach ($order->chargeDetails as $key => $value) {
					$value->charge = $value->charge;
					
				}

				
				return response(['status'=>true,'data'=>$order],200);
			}
			else
			return response(['status'=>false,'message'=>"No order found"],400);
		}
		public function saveChargeDetails(Request $request){
			if (!empty(count($request->row_data))) {
				$order = Order::where("order_id",$request->order_id)->first();
				foreach ($order->chargeDetails as $key => $value) {
					$value->delete();
				}
				if(OrderCharge::insert($request->row_data))
				return response(['status'=>true,'message'=>"Charge Details Saved Successfully"],200);
			}
			else{
				return response(['status'=>false,'message'=>"No data Provided"],400);

			}
		}
		public function confirmOrder($id,Request $request){
			$order = Order::where("order_id",$request->order_id)->first();
			if (empty($request->preparation_time)) {
				return response(['status'=>false,'message'=>"No data Provided"],400);
			}
			$orderController = new OrderController($order->id);
			$orderController->setConfirmation($request->preparation_time);
			return response(['status'=>true,'message'=>"Order confirmed!"],200);

		}
		public function readyOrder($id,Request $request){
			$order = Order::where("order_id",$request->order_id)->first();			
			$orderController = new OrderController($order->id);
			$orderController->setReadyInfo();
			return response(['status'=>true,'message'=>"Order confirmed!"],200);
		}
		public function packOrder($id,Request $request){
			$order = Order::where("order_id",$request->order_id)->first();			
			$orderController = new OrderController($order->id);
			$orderController->setPackInfo();
			return response(['status'=>true,'message'=>"Order packed and handed over!"],200);
		}
		public function deliverOrder($id,Request $request){
			$order = Order::where("order_id",$request->order_id)->first();			
			$orderController = new OrderController($order->id);
			if(isset($request->delivery_boy_id))
			 $user = User::find($request->delivery_boy_id);
			else
			$user = [];
			$orderController->setDeliveryInfo($user);
			return response(['status'=>true,'message'=>"Order delivered!"],200);
		}
		public function getOrderLog($id){
			$order = Order::where("order_id",$id)->first();			
			$orderController = new OrderController($order->id);		
			$order->orderDetails = $order->orderDetails;
			foreach ($order->orderDetails as $key => $value) {
				$value->product = $value->product;
			}
			return response(['status'=>true,'data'=>$orderController->steps,"order" => $order],200);
		}

		}


