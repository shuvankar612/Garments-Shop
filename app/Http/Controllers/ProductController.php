<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $search = $request->search;

    $products = Product::where('name', 'LIKE', "%$search%")
    
    ->paginate(6);

    return view('products.index', compact('products'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = Category::all();

    return view('products.create', compact('categories'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required',
        'name' => 'required',
        'price' => 'required|numeric',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $imageName = time().'.'.$request->image->extension();

    $request->image->move(public_path('products'), $imageName);

    Product::create([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'price' => $request->price,
        'description' => 'Demo Description',
        'size' => 'M',
        'color' => 'Black',
        'image' => $imageName,
    ]);

    return redirect()->route('products.index')
    ->with('success', 'Product Added Successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
{
    $categories = Category::all();

    return view('products.edit', compact('product', 'categories'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
{
    if($request->hasFile('image'))
    {
        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('products'), $imageName);

        $product->image = $imageName;
    }

     $request->validate([
        'category_id' => 'required',
        'name' => 'required',
        'price' => 'required|numeric',
    ]);

    $product->save();

    return redirect()->route('products.index')
    ->with('success', 'Product Updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
        ->with('success', 'Product Deleted Successfully');
    }

    public function categoryProducts($id)
{
    $category = Category::findOrFail($id);

    $products = Product::where('category_id', $id)->get();

    return view('products.category-products',
    compact('products', 'category'));
}

public function addToCart($id)
{
    $product = Product::findOrFail($id);

    Cart::create([
        'product_name' => $product->name,
        'price'        => $product->price,
        'quantity'     => 1,
        'image'        => $product->image
    ]);

    return redirect()->back()
        ->with('success', 'Product Added To Cart');
}

public function cart()
{
    $cartItems = Cart::all();

    return view('products.cart', compact('cartItems'));
}

public function checkout()
{
    return view('products.checkout');
}

public function removeCart($id)
{
    Cart::findOrFail($id)->delete();

    return redirect()->back()
        ->with('success', 'Item Removed From Cart');
}

public function increaseQuantity($id)
{
    $cart = Cart::findOrFail($id);

    $cart->quantity += 1;

    $cart->save();

    return redirect()->back();
}

public function decreaseQuantity($id)
{
    $cart = Cart::findOrFail($id);

    if($cart->quantity > 1)
    {
        $cart->quantity -= 1;

        $cart->save();
    }

    return redirect()->back();
}

public function clearCart()
{
    Cart::truncate();

    return redirect()->back()
        ->with('success','Cart Cleared Successfully');
}

public function dashboard()
{
    $totalProducts = Product::count();

    $totalCategories = Category::count();

    $cartItems = Cart::count();

    $totalOrders = Order::count();

    return view(
        'admin.dashboard',
        compact(
            'totalProducts',
            'totalCategories',
            'cartItems',
            'totalOrders'
        )
    );
}

}