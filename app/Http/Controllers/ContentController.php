<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ContentController extends Controller
{
    public function viewLogo() {
        return view('view-logo-content');
    }

    public function viewhampi() {
        return view('view-hampi-content');
    }

    public function viewGumbaz() {
        return view('view-gumbaz-content');
    }

    public function viewbangalore() {
        return view('view-bangalore-content');
    }

    public function viewFalls() {
        return view('view-falls-content');
    }

    public function viewKuvempu() {
        return view('view-kuvempu-content');
    }

    public function viewBandipur() {
        return view('view-bandipur-content');

    }
    
    public function viewkambala() {
        return view('view-kambala-content');
    }
    public function viewBelur() {
        return view('view-belur-content');
    }
    public function viewMascot() {
        return view('view-mascot-content');
    }
}