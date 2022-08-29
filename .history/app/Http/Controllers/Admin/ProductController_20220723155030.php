<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    private $products;

    use StorageImageTrait;
    public function __construct(Product $product)
    {
        $this->products = $product;

    }
    public function index()
    {
        $products = $this->products->paginate(5);
        return view('admin.products.product',compact('products'));
    }
    public function create()
    {
        $category = new Category;
        $category = new CategoryController($category);
        $htmloptions = $category->getCategory('');

        return view('admin.products.create', compact('htmloptions'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->menus_name,
                'category_id' => $request->parent_id,
                'content' => $request->description,
                'price' => $request->price,
                'discount' => $request->discount
            ];
            $dataUploadImage_link = $this->storagetraitsUpload($request, 'image_link', 'product');
            if (!empty($dataUploadImage_link)) {
                $dataProductCreate['product_avatar'] = $dataUploadImage_link['file_name'];
                $dataProductCreate['product_vartar_path'] = $dataUploadImage_link['file_path'];
            }
            $products = $this->products->create($dataProductCreate);

            if ($request->hasFile('image_list')) {
                foreach ($request->file('image_list') as $fileItems) {
                    $dataProductCreateDetail = $this->storagetraitsUploadMutiple($fileItems, 'product');

                    $products->images()->create([
                        'product_id' => $products->id,
                        'image_detail' => $dataProductCreateDetail['file_name'],
                        'image_detail_link' => $dataProductCreateDetail['file_path']
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('products.create');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message:'.$exception->getMessage(). '     Line :'.$exception->getLine());
        }

    }
    public function edit($id)
    {
        $category = new Category;
        $category = new CategoryController($category);
        $htmloptions = $category->getCategory($this->products->category_id);
        $products = $this->products->find($id);
        // dd($products);
        return view('admin.products.edit',compact('products','htmloptions'));
    }
}
