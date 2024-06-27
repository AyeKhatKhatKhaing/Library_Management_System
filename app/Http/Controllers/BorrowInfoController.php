<?php

namespace App\Http\Controllers;

use App\BookCard;
use App\BorrowInfo;
use App\BorrowList;
use App\fine;
use App\UserCard;
use Illuminate\Http\Request;

class BorrowInfoController extends Controller
{

    public function __construct()
    {
        return $this->middleware("auth");
    }

    public function index()
    {
        $borrow_book = new BorrowInfo();
        $result = $borrow_book->all();

        return view('borrow_book.index', compact('result'));

    }

    public function store($barCode)
    {
        $today = date("Y-m-d");
        $returnDay = date("Y-m-d",strtotime($today.'+ 7day'));
        $borrowInfo = new BorrowInfo();
        $borrowInfo->userId = $barCode;
        $borrowInfo->start_date = $today;
        $borrowInfo->last_date = $returnDay;
        $save = $borrowInfo->save();
        if($save){
            $data = ["status"=>1,"text"=>"Borrow List :added","lastId"=>$borrowInfo->id];
            return $data;
        }else{
            $data = ["status"=>1,"text"=>"Borrow List :Fail"];

            return $data;
        }


    }


    public function list(){


        $info = new BorrowInfo();
        $list = $info->orderby("id","desc")->get();

        return view("borrow_book.list",compact("list"));


    }

    public function expired(){

        $today = date("Y-m-d");
        $info = new BorrowInfo();
        $list = $info->where('last_date',"<",$today)->where('return_status','0')->orderby("id","desc")->get();
        $count = $info->where('last_date',"<",$today)->count();

        return view("borrow_book.expired",compact("list","count"));


    }

    public function detail($id){

        $info = new BorrowInfo();
        $borrowInfo = $info->find($id);

        $list = new BorrowList();
        $borrowList = $list->where("borrowInfoId",$id)->get();

        return view("borrow_book.detail",compact("borrowInfo","borrowList"));

    }

    public function return(){

        return view("borrow_book.return");

    }

    public function returnCheck($barCode){

        $bInfo = new BorrowInfo();
        $row = $bInfo->where('userId',$barCode)->where("return_status","0")->first();


        if($row){




            $lastDate = $row["last_date"];

            if($lastDate < date("Y-m-d")){

                $userData = array("status"=>2,"text"=>"$barCode is expired and need to cash Fine Payment");

                return $userData;

            }else{

                $id = $row["id"];

                $info = new BorrowInfo();
                $borrowInfo = $info->find($id);

                $list = new BorrowList();
                $borrowList = $list->where("borrowInfoId",$id)->get();

                $card = new UserCard();
                $userInfo = $card->where("barcodeId",$barCode)->first();

                $userData = array("status"=>1,"text"=>"Card is correct","borrowInfo"=>$borrowInfo,"borrowList"=>$borrowList,"userInfo"=>$userInfo);

                return $userData;
            }


        }else{

            $userData = array("status"=>0,"text"=>"this card does not borrow any book.");

            return $userData;

        }


    }

    public function returnSave($barCode){

        $bInfo = new BorrowInfo();
        $row = $bInfo->where('userId',$barCode)->where("return_status","0")->first();
        $id = $row["id"];

        $info = new BorrowInfo();
        $borrowInfo = $info->find($id);
        $borrowInfo->return_status = '1';
        $borrowInfo->save();

        $list = new BorrowList();
        $borrowList = $list->where("borrowInfoId",$id)->get();

        foreach ($borrowList as $bl){

            $book = new BookCard();
            $book->where("borrowbookId",$bl->bookId)->update(["availability" => '1']);

        }


        return 1;

    }

    public $fineRate = 50;

    public function fineShow($barCode){





        $bInfo = new BorrowInfo();
        $row = $bInfo->where('userId',$barCode)->where("return_status","0")->first();

        $id = $row["id"];
        $info = new BorrowInfo();
        $borrowInfo = $info->find($id);

        $date1 = date_create(date("Y-m-d"));
        $date2 = date_create($borrowInfo->last_date);
        $diff = date_diff($date1,$date2);
        $fineDay = $diff->format("%a");

        $list = new BorrowList();
        $borrowList = $list->where("borrowInfoId",$id)->get();

        $card = new UserCard();
        $userInfo = $card->where("barcodeId",$barCode)->first();

        $rate = $this->fineRate;


        return view("borrow_book.fine",compact("borrowInfo","fineDay","borrowList","userInfo",'rate'));



    }

    public function fineSave($barCode){


        $bInfo = new BorrowInfo();
        $row = $bInfo->where('userId',$barCode)->where("return_status","0")->first();
        $id = $row["id"];

        $date1 = date_create(date("Y-m-d"));
        $date2 = date_create($row->last_date);
        $diff = date_diff($date1,$date2);
        $fineDay = $diff->format("%a");

        $info = new BorrowInfo();
        $borrowInfo = $info->find($id);
        $borrowInfo->return_status = '1';
        $borrowInfo->save();

        $list = new BorrowList();
        $borrowList = $list->where("borrowInfoId",$id)->get();

        foreach ($borrowList as $bl){

            $book = new BookCard();
            $book->where("borrowbookId",$bl->bookId)->update(["availability" => '1']);

            $fine = new fine();
            $fine->user= $barCode;
            $fine->bookId = $bl->bookId;
            $fine->eDay = $fineDay;
            $fine->fineAmount = $this->fineRate;

            $fine->save();


        }


        return redirect(route("bb.index"));
    }

    public function fineList(){
        $fine = new Fine();
        $all = $fine->orderBy("id","desc")->get();
        return view("borrow_book.fine-list",compact("all"));
    }



}
