<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class AdminDashboardController extends Controller
{

    public function index() {
        $items = LostItem::all();
        return view("admin.index", ["items" => $items]);
    }

    public function showUsers() {
        $users = User::all();
        return view("admin.users", ["users" => $users]);
    }

    public function deleteUser(Request $request, int $userId) {

    }

    public function deleteItem(Request $request, int $itemId) {
        dd($itemId);
        $item = LostItem::query()->where("id", "=", $itemId)->first();
        dd($item);
        if (is_null($item)) {
            dd($item);
        }
    }
}
