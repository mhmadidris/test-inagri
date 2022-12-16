<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Auth;

class DashboardController extends Controller
{
  public function index()
  {
    return view("pages.dashboard.index");
  }
}
