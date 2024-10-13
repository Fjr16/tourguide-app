<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function index() {
        $data = Product::where('isDelete', false)->get();
        return view('pages.product.index', [
            'title' => 'Product',
            'data' => $data,
        ]);
    }
    public function create() {
        return view('pages.product.create', [
            'title' => 'Product',
        ]);
    }
    public function store(Request $request) {
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'product_name' => 'required|string|max:100',
                'product_price' => 'required|integer|digits_between:1,8',
                'product_desc' => 'required|string',
                'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $data = [
                'name' => $request->product_name,
                'price' => $request->product_price,
                'deskripsi' => $request->product_desc,
                // 'image' => $request->product_img,
            ];
    
            // handling image save

            // dd($data);
            Product::create($data);
            DB::commit();
            return back()->with('success', 'Berhasil Ditambahkan');
            // return redirect()->route()->with('success', 'Berhasil Ditambahkan');
        } catch (ValidationException $ve) {
            DB::rollBack();
            return back()->with('error', $ve->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }

    }

    // checkout page
    public function show($id) {
        $item = Product::find(decrypt($id));
        return view('pages.product.show', [
            'title' => 'Checkout',
            'item' => $item,
        ]);    
    }
    
    public function edit($id) {
        $item = Product::find(decrypt($id));
        return view('pages.product.edit', [
            'title' => 'Product',
            'item' => $item, 
        ]);
    }
    public function update(Request $request, $id) {
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'product_name' => 'required|string|max:100',
                'product_price' => 'required|integer|digits_between:1,8',
                'product_desc' => 'required|string',
                'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $data = [
                'name' => $request->product_name,
                'price' => $request->product_price,
                'deskripsi' => $request->product_desc,
                // 'image' => $request->product_img,
            ];
    
            // handling image save
            $item = Product::find(decrypt($id));
            $item->update($data);
            DB::commit();
            return redirect()->route('tourguide.product')->with('success', 'Berhasil Diperbarui');
        } catch (ValidationException $ve) {
            DB::rollBack();
            return back()->with('error', $ve->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id) {
        $item = Product::find(decrypt($id));
        $item->update([
            'isDelete' => true
        ]);
        return back()->with('success', 'Berhasil Dihapus');
    }
}
