<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Insurance;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        $slidersExtras = Slider::latest()->get();
        $sliderMain = Slider::oldest()->first();
        //Lây ra category cha
        $categories = Category::where('parent_id', 0)->get();
        $products = Product::latest()->take(8)->get();
        $productsRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        $productsAppreciate = Product::inRandomOrder()->limit(12)->get();
        $blogsNews = Blog::latest()->take(6)->get();
        return view('client.home', compact('sliderMain', 'slidersExtras', 'categories', 'products', 'productsRecommend', 'productsAppreciate', 'blogsNews'));
    }

    public function product($id)
    {
        if (empty($id)) {
            $id = 5;
        }
        $categories = Category::where('parent_id', 0)->get();
        $productList = Product::where('category_id', $id)->paginate(16);
        $productsRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        $productsDiscount = Product::latest('discount', 'asce')->take(6)->get();
        return view('client.product.shop-grid', compact('categories', 'productsRecommend', 'productsDiscount', 'productList'));
    }


    public function product_detail($id)
    {
        $categories = Category::where('parent_id', 0)->get();
        $productDetail = Product::find($id);
        $productsRecommend = Product::inRandomOrder()->limit(4)->get();
        return view('client.product.shop-details', compact('productDetail', 'productsRecommend', 'categories'));
    }
    public function product_cart()
    {

        return view('client.list.shoping-cart');
    }

    public function save_cart(Request $request)
    {
        $productID = $request->product_id_hidden;
        $quantity = $request->qty;
        $product = DB::table('products')->find($productID);
        $data['id'] = $productID;
        $data['qty'] = $quantity;
        $data['name'] = $product->name;
        $data['weight'] = 25;
        $data['price'] = $product->discount;
        $data['options']['image_path'] = $product->product_vartar_path;
        Cart::add($data);
        // Cart::destroy();
        return Redirect::route('shoping-cart');
        // return view('client.list.shoping-cart',compact($product));
    }

    public function delete_cart($id)
    {
        Cart::remove($id);
        return Redirect::route('shoping-cart');
    }
    public function update_cart(Request $request)
    {
        // dd($request->rowId_cart);
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId, ['qty'=>$qty]);
        return Redirect::route('shoping-cart');
    }

    public function blog()
    {
        $keywords = "Bộ sưu tập";
      
        
        $categories = Category::where('parent_id', 0)->get(); 
        $key = Category::where('category_name','like','%'.$keywords.'%')->get();
        // $blogs = Blog::latest()->paginate(8);
        // $blogsNews = Blog::latest()->take(6)->get();
        return view('client.blog.blog', compact('key'));
    }
    public function blog_detail($id)
    {
        if (empty($id)) {
            $id = 5;
        }
        $productList = Product::where('category_id', $id)->paginate(16);
        $productsRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        $productsDiscount = Product::latest('discount', 'asce')->take(6)->get();
        $blogsNews = Blog::latest()->take(6)->get();
        $blogItems = Blog::find($id);
        $blogsRecomend = Blog::inRandomOrder()->limit(3)->get();
        $categories = Category::where('parent_id', 0)->get();
        return view('client.blog.blog-details', compact('blogsNews','productList', 'blogItems', 'blogsRecomend', 'categories'));
    }
    public function contact()
    {
        $categories = Category::where('parent_id', 0)->get();

        return view('client.contact.contact',compact('categories'));
    }
    public function sendContact(SendContactRequest $request)
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        return view('client.contact.handcard');
    }
    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $slidersExtras = Slider::latest()->get();
        $sliderMain = Slider::oldest()->first();
        //Lây ra category cha
        $categories = Category::where('parent_id', 0)->get();
        $products = Product::where('name','like','%'.$keywords.'%')->get();
        $productsRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        $productsAppreciate = Product::inRandomOrder()->limit(12)->get();
        $blogsNews = Blog::latest()->take(6)->get();
        return view('client.product.search', compact('sliderMain', 'slidersExtras', 'categories', 'products', 'productsRecommend', 'productsAppreciate', 'blogsNews'));
    }
    public function insurance()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('client.insurances.insurance', compact('categories'));
    }
    public function searchInsurance(Request $request)
    {

        $categories = Category::where('parent_id', 0)->get();
        $insurance = Insurance::find($request->insurance_id);
        return view('client.insurances.insurance',compact('categories','insurance'));
    }
    //hiển thị sản phẩm theo sixdo
    public function productSixdo(){
        $productsAppreciate = Product::inRandomOrder()->limit(12)->get();
        $products = Product::latest()->take(8)->get();
        $productsRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        $categories = Category::where('parent_id', 0)->get();
        $slidersExtras = Slider::latest()->get();
        return view('client.product.san_pham',compact('categories','slidersExtras','products','productsAppreciate','productsRecommend'));
    }
    public function productSixdoSale(){
        $productsDiscount = Product::latest('discount', 'asce')->take(6)->get();
        $categories = Category::where('parent_id', 0)->get();
        // $slidersExtras = Slider::all();
        return view('client.product.san_pham_sale',compact('categories','productsDiscount'));
    }
    public function productSixdoBST(){
        $categories = Category::where('parent_id', 0)->get();
        $keywords = "Bộ sưu tập";
        $key = Category::where('category_name','like','%'.$keywords.'%')->get();
        $products = Product::where('category_id',$key->category_id);
        return view('client.product.bo_suu_tap',compact('categories','products'));
    }
    public function inforShopChamy(){
        $categories = Category::where('parent_id', 0)->get();
        return view('client.contact.cua_hang',compact('categories'));
    }
    public function productSixdoDetail(){
        $categories = Category::where('parent_id', 0)->get();
        return view('client.product.san_pham_chi_tiet',compact('categories'));
    }
}
