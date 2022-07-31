<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function iniciado(){
        return Status::find(1)->recommendations()->get();
    }

    public function emProcesso(){
        return Status::find(2)->recommendations()->get();
    }

    public function finalizado(){
        return Status::find(3)->recommendations()->get();
    }
}
