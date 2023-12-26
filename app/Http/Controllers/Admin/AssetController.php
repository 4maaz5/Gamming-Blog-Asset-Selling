<?php

namespace App\Http\Controllers\Admin;

use Stripe;
use App\Models\Post;
use App\Models\Cart;
use App\Models\Asset;
use App\Models\Order;
use App\Models\Review;
use Stripe\StripeClient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    public function index()
    {
        return view('admin.asset.create');
    }
    public function create()
    {
        $asset = Asset::all();
        return view('admin.asset.index', compact('asset'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imageone' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imagetwo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $imagePath = 'storage/images/' . $imageName;
        }
        $asset = new Asset();
        $asset->title = $request->title;
        $asset->description = $request->description;
        $asset->main_image = $imagePath ?? null;
        $image2 = $request->file('imageone')->store('images') ?? null;
        $image3 = $request->file('imagetwo')->store('images') ?? null;
        $asset->image_one = $image2;
        $asset->image_two = $image3;
        $asset->price = $request->price;
        $asset->status = $request->status;
        $asset->slug=$request->slug;
        $asset->save();
        return redirect(route('create.asset'))->with('message', 'Asset Added Successfully!');
    }
    public function edit($asset_id)
    {
        $edit = Asset::find($asset_id);
        return view('admin.asset.edit', compact('edit'));
    }
    public function update(Request $request, $asset_id)
    {
        $asset = Asset::find($asset_id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $imagePath = 'storage/images/' . $imageName;
        }
        $asset->title = $request->title;
        $asset->description = $request->description;
        $asset->main_image = $imagePath ?? null;
        $image2 = $request->file('imageone')->store('images') ?? null;
        $image3 = $request->file('imagetwo')->store('images') ?? null;
        $asset->image_one = $image2;
        $asset->image_two = $image3;
        $asset->price = $request->price;
        $asset->status = $request->status;
        $asset->slug=Str::slug($request->slug);
        $asset->save();
        return redirect(route('create.asset'))->with('message', 'Asset Updated Successfully!');
    }
    public function delete($asset_id)
    {
        Asset::destroy($asset_id);
        $review = Review::where('asset_id', $asset_id)->get();
        // return $review;
        Review::destroy($review);
        return redirect(route('create.asset'))->with('message', 'Asset Deleted Successfully!');
    }
    public function PaidAsset()
    {
        $asset = Asset::all();
        return view('admin.asset.paid_asset', compact('asset'));
    }
    public function FreeAsset()
    {
        $asset = Asset::all();
        return view('admin.asset.free_asset', compact('asset'));
    }
    public function DetailAsset($asset_id)
    {
        $asset = Asset::find($asset_id);
        $review = Review::find($asset_id);
        return view('admin.asset.detail_asset_paid', compact('asset', 'review'));
    }
    public function DetailFreeAsset($asset_id)
    {
        $asset = Asset::find($asset_id);
        return view('admin.asset.detail_asset_free', compact('asset'));
    }
    public function stripeCheckout(Request $request)
    {
        //Creating an instance The $Stripe variable would be used throughout the program to interact with stripe Api...
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        //in context of stripe checkout_session_id is used to generates session id for a specific user transaction...This code of line will redirect user back to show page after successfull transaction...
        $redirecturl = route('stripe.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}';
        $response = $stripe->checkout->sessions->create([
            'success_url' =>  $redirecturl,
            'customer_email' => Auth::user()->email,
            'payment_method_types' => ['link', 'card'],
            'line_items' => [
                [
                    'price_data' => [
                        'product_data' => [
                            'name' => $request->product,
                            // 'product_id'=>$request->product_id,
                        ],
                        'unit_amount' =>100*$request->price,
                        'currency' => 'USD',
                    ],
                    'quantity' => 1
                ],
            ],
            'mode' => 'payment',
            'allow_promotion_codes' => true,
        ]);
        $data=new Order();
        $data->user_id=Auth::user()->id;
        Cart::where('user_id',Auth::user()->id)->get();
        $data->product_name=$request->product;
        $data->user_email=Auth::user()->email;
        $data->product_quantity=$request->quantity;
        $data->total_amount="$".$request->price;
        $data->save();
        return redirect($response['url']);
    }

    public function StripeCheckoutSuccess(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $response = $stripe->checkout->sessions->retrieve($request->session_id);

        return redirect()->route('stripe.index')->with('success', 'Payment Successfull.');
    }
    public function Review(Request $request)
    {
        if (Auth::check()) {
            $review = new Review();
            $review->asset_id = $request->asset_id;
            $review->user_id = Auth::user()->id;
            $review->review_body = $request->review_body;
            $review->save();
            return redirect()->back()->with('message', 'Review Added !');
        } else {
            return redirect('/login')->with('message', 'You have to login first!');
        }
    }

    // public function download($id)
    // {
    //     $post = Post::find($id);
// return $post->image;
        // if (!$post || !$post->image) {
        //     abort(404); // Post not found or does not have an image
        // }

        // // Adjust the path to use the public disk
        // $path = storage_path('app/public/' . $post->image);

        // if (file_exists($path)) {
        //     return response()->download($path);
        // } else {
        //     abort(404); // File not found
        // }
    // }

    public function ReviewDelete($id){
        if (Auth::check()) {
            Review::destroy($id);
            return redirect()->back();
        }
        else{
            return redirect(route('login'));
        }
    }
    public function AdminReviewDelete($id){
        if (Auth::check()) {
            Review::destroy($id);
            return redirect()->back();
        }
        else{
            return redirect(route('login'));
        }
    }
}
