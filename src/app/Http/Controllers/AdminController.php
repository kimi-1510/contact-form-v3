<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class AdminController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::paginate(7); // 🔹 ページネーションを適用
        return view('auth.admin', compact('inquiries')); // 🔹 管理画面を表示
    }

    public function search(Request $request)
    {
        $query = Inquiry::query();

        if ($request->filled('name')) {
            $query->where('name', 'LIKE', "%{$request->name}%");
        }
        if ($request->filled('email')) {
            $query->where('email', $request->email);
        }
        if ($request->filled('gender') && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }
        if ($request->filled('inquiry_type')) {
            $query->where('inquiry_type', $request->inquiry_type);
        }
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $inquiries = $query->paginate(7);

        return view('auth.admin', compact('inquiries'));
    }
}