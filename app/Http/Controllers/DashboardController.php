<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $allItems = LostItem::all();
        return view('dashboard.index', ['items' =>$allItems]);
    }

    public function uploadLostItem(Request $request){
        $validatedData = $request->validate([
            'name'=>['string', 'required'],
            'image' => ['mimes:png,jpg', 'required'],
            'description' => ['string', 'required'],
            'last_seen' => ['string', 'required'],
            'location' => ['string', 'required'],
        ]);


        $newImageName = time().'-'.$request->get('title').'.'.$request->image->extension();  // renaming image
        $request->image->move(public_path('images/categories'), $newImageName);

        LostItem::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'image_url' => $newImageName,
            'location' => $validatedData['location'],
            'last_seen' => $validatedData['last_seen'],
        ]);
        return back();
    }
}
