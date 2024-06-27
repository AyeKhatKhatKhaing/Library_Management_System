<?php

namespace App\Http\Controllers;

use App\BookCard;
use Illuminate\Http\Request;

class BookCardController extends Controller
{
    public function __construct()
    {
        return $this->middleware("auth");
    }

    public function index()
    {
        $books =BookCard::all();

        return view('book.index', [
            'books' => $books
        ]);
    }
    public function add()
    {
        $book = new BookCard();
        $books = $book->orderBy("id","desc")->get();
        return view('book.add_book' , compact('books'));
    }
    public function show($id)
    {
        $book = new BookCard();
        $result = $book->find($id);
        return view('book.show', compact('result'));
//        return $result;
    }

    public function store(Request $request)
    {
        $book = new BookCard();

        $request->validate([
            'borrowbookId' => 'required|unique:book_cards',
            'bookname' => 'required|min:5',
            'bookCat' => 'required',
            'author' => 'required|min:3',
            'price' => 'required|min:3',
            'remark' => 'required',
//            'availability' => 'required'
        ]);

        $book->borrowbookId = $request->input('borrowbookId');
        $book->bookname = $request->input('bookname');
        $book->bookCat = $request->input('bookCat');
        $book->author = $request->input('author');
        $book->price = $request->input('price');
        $book->remark = $request->input('remark');
//        $book->availability = $request->input('availability');
        $book->save();

        return redirect(route('b.name'));
    }

    public function edit(BookCard $bookCard,$id)
    {
        $book = new BookCard();

        $result = $book->find($id);
        return view('book.edit', compact('result'));
        return $id;
    }

    public function update(Request $request)
    {


        $request->validate([
            'borrowbookId' => 'required',
            'bookname' => 'required|min:5',
            'author' => 'required|min:3',
            'price' => 'required|min:3',
            'remark' => 'required',
            'availability' => 'required'
        ]);

//        return $request;

        $result = BookCard::find($request->input('id'));
        $result->borrowbookId = $request->input('borrowbookId');
        $result->bookname = $request->input('bookname');
        $result->author = $request->input('author');
        $result->price = $request->input('price');
        $result->remark = $request->input('remark');
        $result->availability = $request->input('availability');
        $result->save();

        return redirect(route('b.name'));
    }

    public function delete($id)
    {
        $book = new BookCard();

        $result = $book->find($id)->delete();
        return redirect(route('b.name', compact('result')));
    }

    public function bookInfo($barCode){
        $book = new BookCard();
        $bookDetail = $book->where("borrowbookId",$barCode)->get();
        return $bookDetail;
    }
}
