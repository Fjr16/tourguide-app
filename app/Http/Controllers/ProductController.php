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
        $data = Product::all();
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
    public function edit($id) {
        $item = Product::find($id);
        return view('pages.product.index', [
            'title' => 'Product',
            'item' => $item, 
        ]);
    }
    public function update(Request $request, $id) {
        $item = Product::find($id);
        $data = $request->validate([
            'name' => 'string|size:100',
            'price' => 'decimal:1,999999999',
            'deskripsi' => 'text',
            'image' => 'image',
        ]);

        dd($data);
        $item->update($data);
        // return back()->with('success', 'Berhasil Ditambahkan');
    }

    public function destroy($id) {
        $item = Product::find($id);
        $item->delete();
        return back()->with('success', 'Berhasil Dihapus');
    }
}
