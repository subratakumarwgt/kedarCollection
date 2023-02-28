<?php

namespace App\Http\Controllers;

use App\Models\DailyExpense;
use App\Models\Expense;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    //

    public function getOrderBarChart(){
        $sales = new Order();
        $expenses = new Expense();
        $salesVsExpense =DB::select(DB::raw("SELECT A.day as day, A.orderTotal, B.expenseTotal
        FROM (SELECT DATE(created_at) AS day, SUM(total) AS orderTotal
              FROM orders GROUP BY day ) AS A
        LEFT JOIN (SELECT DATE(created_at) AS day, SUM(amount) AS expenseTotal
                    FROM expenses GROUP BY day) AS B ON A.day = B.day  ORDER BY A.day LIMIT 10")) ;
      
       
         $dataSets[0] = ["Day", "Sales(₹)","Expenses(₹)"];
        foreach ($salesVsExpense as $key => $sale) {
        $dataSet = [
            date("d M,D",strtotime($sale->day)),
           $sale->orderTotal ?? 0,
           $sale->expenseTotal ?? 0
        ];
        array_push($dataSets,$dataSet);
        }

        return response($dataSets,200);
    }
    public function getItemRevenueBarChart(){
        $sales = new OrderDetails();
       
        $salesVsExpense = $sales->whereDate("order_details.created_at",">=",date("Y-m-1"))->select(DB::raw("SUM(quantity) as units"),DB::raw("SUM(subtotal) as revenue"),"item_id",DB::raw("items.name as product"))->groupBy("item_id")->join("items",'order_details.item_id', '=', 'items.id')->orderBy("revenue","desc")->take(5)->get();

    //    dd($salesVsExpense->toArray());
       
         $dataSets[0] = ["Product","Revenue(₹)"];
        foreach ($salesVsExpense as $key => $sale) {
        $dataSet = [
            $sale->product,
         
           intval($sale->revenue) ?? 0
        ];
        array_push($dataSets,$dataSet);
        }
        // dd($dataSets);

        return response($dataSets,200);
    }
    public function getItemUnitBarChart(){
        $sales = new OrderDetails();
       
        $salesVsExpense = $sales->whereDate("order_details.created_at",">=",date("Y-m-1"))->select(DB::raw("SUM(quantity) as units"),DB::raw("SUM(subtotal) as revenue"),"item_id",DB::raw("items.name as product"))->groupBy("item_id")->join("items",'order_details.item_id', '=', 'items.id')->orderBy("units","desc")->take(5)->get();

    //    dd($salesVsExpense->toArray());
       
         $dataSets[0] = ["Product","Units"];
        foreach ($salesVsExpense as $key => $sale) {
        $dataSet = [
            $sale->product,
         
           intval($sale->units) ?? 0
        ];
        array_push($dataSets,$dataSet);
        }
        // dd($dataSets);

        return response($dataSets,200);
    }
    public function getItemTypePieChart(){
        $sales = new OrderDetails(); 
        $salesVsExpense = $sales->whereDate("order_details.created_at",">=",date("Y-m-1"))->select(DB::raw("SUM(subtotal) as revenue"),DB::raw("items.sub_category as type"))->groupBy("sub_category")->join("items",'order_details.item_id', '=', 'items.id')->get();
        // dd($salesVsExpense->toArray());
             $dataSets[0] = ["Product Type", "Revenue Generated (₹)"];
          foreach ($salesVsExpense as $key => $sale) {
            $dataSet = [
               ucfirst(str_replace("_"," ",$sale->type)),
               intval($sale->revenue)
            ];
            array_push($dataSets,$dataSet);
          }
            // dd($dataSets);
        return response(
            $dataSets
          ,200);
    }
    public function getOrderTimeChart(){
        $sales = new Order(); 
        $salesVsExpense = $sales->where("status","completed")->whereDate("created_at",">=",date("Y-m-1"))->select(DB::raw("COUNT(id) AS order_count,DATE(created_at) AS order_date"))->groupBy("order_date")->get();
             $dataSets[0] = ["Order Date", "Order Placed"];
          foreach ($salesVsExpense as $key => $sale) {
            $dataSet = [
                date("d M,D",strtotime($sale->order_date)),
               intval($sale->order_count)
            ];
            array_push($dataSets,$dataSet);
          }
        return response(
            $dataSets
          ,200);

    }
    public function getExpenseBarChart(){
        $sales = new DailyExpense();
       
        $salesVsExpense = $sales->whereDate("daily_expenses.created_at",">=",date("Y-m-1"))->select(DB::raw("SUM(quantity) as units"),DB::raw("SUM(subtotal) as revenue"),"item_id",DB::raw("items.name as product"))->groupBy("item_id")->join("items",'daily_expenses.item_id', '=', 'items.id')->orderBy("revenue","desc")->take(5)->get();

    //    dd($salesVsExpense->toArray());
       
         $dataSets[0] = ["Item","Cost(₹)"];
        foreach ($salesVsExpense as $key => $sale) {
        $dataSet = [
            $sale->product,
         
           intval($sale->revenue) ?? 0
        ];
        array_push($dataSets,$dataSet);
        }
        // dd($dataSets);

        return response($dataSets,200);
    }
}
