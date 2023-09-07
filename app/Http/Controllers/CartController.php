<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;
use App\Services\FileService;
class CartController extends Controller
{
    // 引入
    protected $FileService;
    public function __construct(FileService $FileService)
    {
        $this->FileService = $FileService;
    }
    use AuthorizesRequests, ValidatesRequests;
        /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $search = Product::query();
        $keyword = $request->keyword ?? '';
        // dd($keyword);
        if ($request->filled('keyword')) {
            // dd($keyword);
            $search->where('name', 'like', '%'.$keyword.'%')->orwhere('descr', 'like', "%{$keyword}%");
        }

        $search = $search->paginate(5);
        // $search->withPath('/cart/product-list?keyword=' . $keyword);
        $search->appends(compact('keyword'));
        // dd($search);

        // $productItem = Product::all();

        //建立變數用於跟model要資料(m會找DB，將資料過率)取出來
        //產品列表
        return view('freshCart.cartProductList', compact
        ('search'));
        // compact() = [key => value, key1 => value1, key2 => value2,...]
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //新增資料
        return view('freshCart.cartAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //驗證進來的資料是否合規範
        //新產品儲存功能
        //查看請求的資料（form表單裡的input
        // 儲存方法一 使用storage
        // $path = Storage::putFile('public/upload', $request->file('img'));

        // 儲存方法二(使用fileService)
        $path = $this->FileService->imgUpload($request->file('img'), 'product-img');

        Product::create([
                    // 表格名稱 html屬性的name
                    'name' => $request->name,
                    // 方法一
                    // 'img_path' => str_replace('public', 'storage', $path),
                    // 方法二
                    'img_path' => $path,
                    'price' => $request->price,
                    'status' => $request->status,
                    'descr' => $request->desc,
                ]);
        // dd($request->all());
        // dd($request->desc);
        //呼叫model

        return redirect(route('cartProductList'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        //產品編輯頁
        return view('freshCart.cartEdit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //資料更新功能
        // dd($request->all());
        $product = Product::find($id);
        // 方法一
        // if($request->file('img')){
        //     $path = Storage::putFile('public/upload', $request->file('img'));
        //     Storage::delete(str_replace('storage', 'public',$product->img_path));
        //     $product->update([
        //         'name'=>$request->name,
        //         'price'=>$request->price,
        //         'status'=>$request->status,
        //         'descr'=>$request->desc,
        //         'img_path' => str_replace('public', 'storage', $path),
        //     ]);
        // }else {
        //     $product->update([
        //         'name' => $request->name,
        //         'price' => $request->price,
        //         'status' => $request->status,
        //         'descr' => $request->desc,
        //     ]);
        // }
        // 方法二
        if ($request->file('img')) {
            $path = $this->FileService->imgUpload($request->file('img'), 'product-img');
            $this->FileService->deleteUpload($product->img_path);
            $product->update([
                'name'=>$request->name,
                'price'=>$request->price,
                'status'=>$request->status,
                'descr'=>$request->desc,
                'img_path' => $path,
            ]);
        }else {
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
              'status' => $request->status,
                'descr' => $request->desc,
            ]);
        }
        return redirect(route('cartProductList'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //刪除資料功能
        // dd($id);
        $product = Product::find($id);
        $this->FileService->deleteUpload($product->img_path);
        $product->delete();
        return redirect(route('cartProductList'));
    }
}
