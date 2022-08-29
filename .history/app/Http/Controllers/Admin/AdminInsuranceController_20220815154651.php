<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InsuranceRequest;
use App\Models\DoneOrder;
use App\Models\Insurance;
use Illuminate\Http\Request;

class AdminInsuranceController extends Controller
{
    protected $insurance , $doneOrder;
    /**
     * Class constructor.
     */
    public function __construct(Insurance $isurance, DoneOrder $doneOrder)
    {
        $this->insurance = $isurance;
        $this->doneOrder = $doneOrder;
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
