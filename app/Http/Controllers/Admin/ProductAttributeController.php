<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function loadAttribute()
    {
        $attributes = Attribute::all();

        return response()->json($attributes);
    }

    public function productAttributes(Request $request)
    {
        $product = Product::findOrFail($request->get('id'));

        return response()->json($product->attributes);
    }

    public function loadValues(Request $request)
    {
        $attribute = Attribute::findOrFail($request->get('id'));

        return response()->json($attribute->values);
    }

    public function addAttribute(Request $request)
    {
        $productAttribute = ProductAttribute::create($request->get('data'));

        if ($productAttribute)
        {
            return response()->json(['message' => 'The product attribute created successfully']);
        }
        else
        {
            return response()->json(['message' => 'Something went wrong while submitting product attribute']);
        }
    }

    public function deleteAttribute(Request $request)
    {
        $productAttribute = ProductAttribute::findOrFail($request->get('id'));
        $productAttribute->delete();

        return response()->json(['status' => 'success', 'message' => 'Product attribute is deleted successfully']);
    }
}
