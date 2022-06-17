<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $allItems = LostItem::all();
        return view('dashboard.details-area.index', ['items' =>$allItems]);
    }

    public function details(LostItem $lostItem){
        return view('dashboard.details-area.details', ['item' => $lostItem]);
    }

    public function claim(Request $request, LostItem $lostItem){
        $current_user = $request->user()->id;
        $lostItem->claimed = true;
        $lostItem->claimed_by = $current_user;
        $lostItem->save();
        return redirect(route('dashboard'));
    }

    public function myItems (Request $request){
        $current_user = $request->user()->id;
        $user = User::where('id', '=', $current_user)->first();
        $items = $user->lostitem;
        return view('dashboard.my-items.index', ['items' => $items]);
    }
    public function uploadLostItem(Request $request){
        $validatedData = $request->validate([
            'name'=>['string', 'required'],
            'image' => ['mimes:png,jpg', 'required'],
            'description' => ['string', 'required'],
            'last_seen' => ['string', 'required'],
            'location' => ['string', 'required'],
            'status' => ['string', 'required']
        ]);

        $current_user = $request->user()->id;

        $newImageName = time().'-'.$request->get('title').'.'.$request->image->extension();  // renaming image
        $request->image->move(public_path('images/categories'), $newImageName);

        LostItem::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'image_url' => $newImageName,
            'location' => $validatedData['location'],
            'last_seen' => $validatedData['last_seen'],
            'status' => $validatedData['status'],
            'user_id' => $current_user
        ]);

        return back();
    }

}
