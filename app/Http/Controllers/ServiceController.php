<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Http\Requests\ServiceFormRequest;


class ServiceController extends Controller
{
    public function showServiceList()
    {

        $servicesList = Service::all();
        $orderNumber = 1;
        return view('adminPanel.servicesList', compact('servicesList', 'orderNumber'));
    }


    public function create(Request $request)
    {

        if ($request->user()->is_admin() || $request->user()->is_privileged_user()) {
            return view('adminPanel.createService');
        } else {
            return redirect('/')->with('error', 'Nieprawidłowa operacja. Nie posiadasz wymaganych uprawnień.');
        }
    }


    public function store(ServiceFormRequest $request)
    {
        $service = new Service();
        $service->name = $request->get('name');
        $duplicate = Service::where('name', $service->name)->first();
        if ($duplicate) {
            return redirect('panel/services/createService')->with('error', 'Taka nazwa usługi już istnieje');
        }

        $service->save();

        return redirect('/panel/services')->with('success', 'Usługa została dodana prawidłowo.');
    }


    public function edit(Request $request, $id)
    {
        $service = Service::where('id', $id)->first();
        if ($service &&  $request->user()->is_admin())
            return view('adminPanel.editService')->with('service', $service);
        return redirect('/')->with('error', 'Nieprawidłowa operacja. Nie posiadasz wymaganych uprawnień.');
    }



    public function update(Request $request)
    {

        $service_id = $request->input('service_id');
        $service = Service::find($service_id);
        if ($service && $request->user()->is_admin()) {
            $name = $request->input('name');
            $duplicate = Service::where('name', $service->name)->first();
            if ($duplicate) {
                if ($duplicate->id != $service_id) {
                    return redirect('panel/services/edit')->with('error', 'Taka usługa już istnieje.');
                } else {
                    $service->name = $name;
                }
            }
        }

        $service->save();

        return redirect('/panel/services')->with('success', 'Usługa została edytowana prawidłowo.');
    }


    public function deleteService($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect('/panel/services')->with('success', 'Usługa została usunięta prawidłowo.');
    }
}
