<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function showServiceList()
    {

        $servicesList = Service::all();
        $orderNumber=1;
        return view('adminPanel.servicesList', compact('servicesList', 'orderNumber'));
    }



    public function deleteService($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect('/panel/services')->with('success', 'Service has been deleted successfully');
    }
}
