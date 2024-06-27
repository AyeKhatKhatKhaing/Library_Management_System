<?php

namespace App\Http\Controllers;

use App\BookCard;
use App\User;
use App\UserCard;
use Illuminate\Http\Request;

class UserCardController extends Controller
{

    public function __construct()
    {
        return $this->middleware("auth");
    }

    public function index()
    {
        $cards = UserCard::all();
//        $card = new UserCard();
//        $cards = $card->orderBy('id', 'desc');
        return view('user.index', [
            'cards' => $cards
        ]);

    }

    public function borrow_book()
    {
        $result = UserCard();
        return view('borrow_book.index', compact('result'));
    }

    public function add()
    {
        $data = new UserCard();
        $cards = $data->orderBy("id","desc")->get();

        return view('user.add_user',compact("cards"));
    }

    public function show($id)
    {
        $card = new UserCard();
        $cards = $card->find($id);
        return view('user.show', compact('cards'));
    }

    public function store(Request $request)
    {
        $card = new UserCard();
        
        $validatedData = $request->validate([
            'barcodeId' => 'required|unique:user_cards',
            'username' => 'required',
            'rollno' => 'required',
            'major' => 'required',
            'nrc' => 'required',
            'phoneno' => 'required',
            'address' => 'required'
        ]);

        $card->barcodeId = $request->input('barcodeId');
        $card->username = $request->input('username');
        $card->rollno = $request->input('rollno');
        $card->major = $request->input('major');
        $card->nrc = $request->input('nrc');
        $card->phoneno = $request->input('phoneno');
        $card->address = $request->input('address');

        if($card->save()) {
            return redirect(route('user_add'));
        }else {
            return "Register fail";
        }
    }

    public function edit($id)
    {
        $card = new UserCard();
        $result = $card->find($id);
        return view('user.edit', compact('result'));
    }

    public function update(Request $request)
    {


//        return $request;

        $request->validate([
            'barcodeId' => 'required',
            'username' => 'required',
            'rollno' => 'required',

            'nrc' => 'required',
            'phoneno' => 'required',
            'address' => 'required'
        ]);



        $result = UserCard::find($request->input('id'));
        $result->barcodeId = $request->input('barcodeId');
        $result->username = $request->input('username');
        $result->rollno = $request->input('rollno');
//        $result->major = $request->input('major');
        $result->nrc = $request->input('nrc');
        $result->phoneno = $request->input('phoneno');
        $result->address = $request->input('address');

        $result->save();
        return redirect(route('c.name'));
    }

    public function delete($id)
    {
        $card = new UserCard();

        $cards = $card->find($id)->delete();
        return redirect(route('c.name', compact('cards')));
    }

    public function isReg($barCode){
        $card = new UserCard();
        $checkData = $card->where("barcodeId",$barCode)->get();
        return $checkData;
    }

}
