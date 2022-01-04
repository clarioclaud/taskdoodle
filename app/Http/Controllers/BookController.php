<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Carbon\Carbon;
use App\Models\Subscription;
use App\Imports\BookImport;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    public function Books()
    {
        $books = Book::latest()->get();
        return view('book.book_list',compact('books'));
    }

    public function BookAdd(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $filename = $name_gen.'.'.strtolower($image->getClientOriginalExtension());
        $uploadfolder = public_path().'/book/';
        $destination = 'book/'.$filename;
        $image->move($uploadfolder,$filename);

        $book = Book::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $destination,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('error','Book Added Successfully');
    }

    public function BookEdit($id)
    {
        $book = Book::findOrFail($id);
        return view('book.book_edit',compact('book'));
    }

    public function BookUpdate(Request $request)
    {
        $id = $request->id;
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid());
            $filename = $name_gen.'.'.strtolower($image->getClientOriginalExtension());
            $uploadfolder = public_path().'/book/';
            $destination = 'book/'.$filename;
            $image->move($uploadfolder,$filename);
            unlink($request->old_image);
        }

        $book = Book::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => isset($request->image)?$destination:$request->old_image,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('admin.books')->with('error','Book Updated Successfully');
    }

    public function BookDelete($id)
    {
        $book = Book::findOrFail($id);
        $image = unlink($book->image);
        $book->delete();
        return redirect()->back()->with('error','Book Deleted Successfully');
    }

    public function BookStatus($id)
    {
        $book = Book::findOrFail($id);
        if ($book->status == 1) {
            Book::findOrFail($book->id)->update([
                'status' => 0
            ]);
            return redirect()->back()->with('error','Book Status changed Successfully');
        } else {
            Book::findOrFail($book->id)->update([
                'status' => 1
            ]);
            return redirect()->back()->with('error','Book Status changed Successfully');
        }
        
    }

    public function BookBulk(Request $request)
    {
        Excel::import(new BookImport, request()->file('file'));
        return redirect()->back()->with('error','Imported Successfully');
    }

    public function Subscription()
    {
        $all = Subscription::latest()->get();
        return view('book.subscription',compact('all'));
    }
}
