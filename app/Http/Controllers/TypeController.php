<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use App\Models\ProductTypeImg;

use Illuminate\Http\Request;
use App\Services\FileService;

class TypeController extends Controller
{
    // 引入
    protected $FileService;
    public function __construct(FileService $FileService)
    {
        $this->FileService = $FileService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(123);
        $types = ProductType::all();
        //找尋第一筆資料，寫all會是一整包陣列，就找不到
        // $types = ProductType::first();
        // dd($types->productTypeImg);
        // $typesImg = ProductTypeImg::all();
        return view('cart_type.typeProductList', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //進入產品新增頁
        return view('cart_type.typeAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //產品新增頁add 送出表單要送到這裡
        // dd($request->all());
        $type = ProductType::create([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        foreach ($request->img ?? [] as $value) {
            ProductTypeImg::create([
                'img_path' => $this->FileService->imgUpload($value, 'type-img'),
                'product_type_id' => $type->id,
            ]);
        }
        return redirect(route('typeProductList'));
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
    public function edit(string $id)
    {
        //
        // dd($id);
        $type = ProductType::find($id);
        return view('cart_type.typeEdit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // dd($request->hasFile('img'));
        $type = ProductType::find($id);
        $type->update([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);
        if ($request->hasFile('img')) {
            // 舊的
            foreach ($type->productTypeImg ?? [] as $img) {
                // dump($img);
                $this->FileService->deleteUpload($img->img_path);
                $img->delete();
            }
            //新的
            foreach($request->img ?? [] as $img) {
                ProductTypeImg::create([
                    'img_path' => $this->FileService->imgUpload($img, 'type-img'),
                    'product_type_id' => $id,
                ]);
            }
            return redirect(route('typeProductList'));
        }
    }

    /**
     * $id : 產品類別的id
     * return 'success' : 'fail'
     */
    public function destroy(string $id)
    {
        $type = ProductType::find($id);

        // 寫法一
        // foreach ($type->productTypeImg ?? [] as $img) {
        //     // dump($img);
        //     $this->FileService->deleteUpload($img->img_path);
        //     $img->delete();
        // }
        // $type->delete();
        // return redirect(route('typeProductList'));
        // 寫法二
        if ($type) {
            return 'success';
            dd('刪除資料' . $id);
            foreach ($type->productTypeImg ?? [] as $img) {
                // dump($img);
                $this->FileService->deleteUpload($img->img_path);
                $img->delete();
            }
            return 'success';
        } else {
            return 'fail';
        }
    }
}
