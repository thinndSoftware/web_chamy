<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InsuranceRequest;
use Illuminate\Http\Request;

class AdminInsuranceController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct(IsuranceRequest $request)
    {

    }
    public function index()
    {
        return view('admin.insurances.insurance');
    }
    public function create()
    {
        return view('admin.insurances.create');
    }

    public function store(InsuranceRequest $request)
    {

    }
}
