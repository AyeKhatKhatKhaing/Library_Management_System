<?php

namespace App\Http\Controllers;

use App\BookCard;
use App\BorrowList;
use Illuminate\Http\Request;

class BorrowListController extends Controller
{

    public function __construct()
    {
        return $this->middleware("auth");
    }

    public function store($code,$id){

        $bookCard = new BookCard();
        $row = $bookCard->where("borrowbookId",$code);
        $row->update(['availability' => '0']);



        $blc = new BorrowList();
        $blc->borrowInfoId = $id;
        $blc->bookId = $code;



        if($blc->save()){
            return $code." is borrowed";
        } else{
            return $code." is failed to borrow";
        }

    }

}
