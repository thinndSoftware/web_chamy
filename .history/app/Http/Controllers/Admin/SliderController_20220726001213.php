<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    private $sliders;
    use StorageImageTrait;
    public function __construct(Slider $sliders)
    {
        $this->sliders= $sliders;
    }

    public function index()
    {
        $sliders = $this->sliders->paginate(5);
        return view('admin.sliders.slider',compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(SliderAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataImages = $this->storagetraitsUpload($request, 'image_link', 'sliders');
            if (!empty($dataImages)) {
                $dataInsert['image_name'] = $dataImages['file_name'];
                $dataInsert['image_path'] = $dataImages['file_path'];
            }
            $this->sliders->create($dataInsert);
            DB::commit();
            return back();
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error("Message :". $exception->getMessage()."Line: ".$exception->getLine() );
        }

    }
    public function edit($id)
    {
        $sliders = $this->sliders->find($id);
        return view('admin.sliders.edit',compact('sliders'));
    }
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|max:255|min:10',
            'description' => 'required',
            'image_link' => 'required'
        ], [
            'name.required' => 'Tên slider không được để trống',
            'name.max'=> 'Ký tự tối đa 255',
            'name.min'=> 'Ký tự tối thiểu 10',
            'description.required'=> 'Mô tả slider không để trống',
            'image_link.required'=> 'Ảnh slider không để trống',
        ])
        ->validate();

            $dataUpdate = [
                'name'=>$validator['name'],
                'description'=>$validator['description'],
            ];
            // $dataImageUpdate = $this->storagetraitsUpload($request, 'image_link','slider');
           dd($validated = $request->validated(););
    }
}
