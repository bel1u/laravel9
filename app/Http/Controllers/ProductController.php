<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Product\ProductCreateValidation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);
        return view('admin.product.index', compact('products'));
    }

    public function store(ProductCreateValidation $request)
    {
        $validate = $request->validated();
        unset($validate['photo_file']);
        $photo = $request->file('photo_file')->store('public');
        # Explode => / => public/fsdffsfsd.jpg =>
        $validate['photo'] = explode('/', $photo)[1];

        Product::create($validate);
        return back()->with(['success', true]);
    }
}
