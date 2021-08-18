<?php

namespace App\Http\Controllers;

use App\Models\Midwife;
use Illuminate\Http\Request;

class MidwifeController extends Controller
{
    
    //variable declaration
    protected $midwifeModel;


    //constructor
    public function __construct()
    {
        $this->midwifeModel = new Midwife();
    }

    //get midwives
    public function getMidwives()
    {
        return $this->midwifeModel->getMidwives();
    }


    //get a single midwife by Id
    public function getMidwife($midwifeId)
    {
        return $this->midwifeModel->getMidwife($midwifeId);
    }


    //post midwife to db
    public function postMidwife(Request $request)
    {
        return $this->midwifeModel->postMidwife($request);
    }



    //Edit an midwife
    public function putMidwife(Request $request, $midwifeId)
    {
        return $this->midwifeModel->putMidwife($request, $midwifeId);
    }


    //delete an midwife
    public function deleteMidwife($midwifeId)
    {
        return $this->midwifeModel->deleteMidwife(
            $midwifeId
        );
    }
}
