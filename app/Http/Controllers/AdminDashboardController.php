<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\Transactions;
use App\Models\Transactions_Details;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
     public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Categories::count();
        $totalTransactions = Transactions::count();

         // Hitung omzet dari semua transaksi
        $totalRevenue = Transactions::sum('total'); // pastikan kolom 'total' ada

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalTransactions',
             'totalRevenue'
        ));
    }
}
