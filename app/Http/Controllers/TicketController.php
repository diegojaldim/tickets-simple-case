<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TicketController extends Controller
{

    public function getAllData()
    {
        return new JsonResponse(['message' => 'success']);
    }

}
