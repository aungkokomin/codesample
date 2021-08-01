<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BannerPostRequest;
use App\Http\Requests\PostRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use App\Posts;
use App\BannerPosts;
use App\Sub_Categories;
use Validator;
use Redirect;

class PostController extends Controller
{
    // ======= index ======== //
    public function index(){
    	$post = Posts::with('category')->get();
    	return view('la.posts.index',compact('post'));
    }

    // ======== create ======= //
    public function create(){
    	$sub = Sub_Categories::get();
    	return view('la.posts.create',compact('sub'));
    }

    // ======== store ======== //
    public function store(PostRequest $request){
        // $rules = array(
        //   'img_file_one' => 'required|image|mimes:jpg,jpeg,bmp,png',
        //   );

        // $validator = Validator::make($request->only('img_file_one','img_file_two'), $rules);
        // if($validator->fails()){
        //     return Redirect::back()->with('errors',trans('post/message.error.create'));
        // }else{
        $post = new Posts($request->except('_token'));
        if ($file = $request->file('img_file_one')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/posts/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $post['post_image'] = $safeName;
        }
        if ($file = $request->file('img_file_two')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/posts/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $post['feature_post_image'] = $safeName;
        }
        if($post->save()){
            return redirect('admin/posts')->with('success', trans('post/message.success.create'));
        }else{
            return redirect::back()->with('errors',trans('post/message.error.create'));
        }
    }

    // ======== edit ========= //
    public function edit(Posts $post){
    	$sub = Sub_Categories::get();
    	return view('la.posts.edit',compact('post','sub'));
    }

    // ========= update ======== //
    public function update(PostRequest $request,Posts $post){
        if ($file = $request->file('img_file_one')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/posts/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $request['post_image'] = $safeName;
        }
        if ($file = $request->file('img_file_two')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/posts/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $request['feature_post_image'] = $safeName;
        }
        if($post->update($request->except('_token'))){
            return redirect('admin/posts')->with('success',trans('post/message.success.update'));
        }else{
            return redirect::back()->with('errors',trans('post/message.error.update'));
        }
    }

    // ========= delete ======== //
    public function destroy(Posts $post){
        
        if($post->delete()){
            return redirect('admin/posts')->with('success',trans('post/message.success.delete'));
        }else{
            return redirect('admin/posts')->with('errors',trans('post/message.error.update'));
        }
    }



    /*...........................................................................................
    .............................................................................................
    ................................. Banner Post ...............................................
    .............................................................................................
    .............................................................................................*/

    // ============= Index ============= //

    public function bannerpostindex(){
        $banners = BannerPosts::get();
        return view('la.banner_posts.index',compact('banners'));
    }

    // ============ Create ============== //
    public function bannerpostcreate(){
        return view('la.banner_posts.create');
    }

    // ============ Insert =============== //
    public function bannerpoststore(BannerPostRequest $request){
            $i = 1;
            foreach ($request->file() as $image) {
                if ($file = $image) {
                    $fileName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension() ?: 'png';
                    $folderName = '/uploads/bannerposts/';
                    $destinationPath = public_path() . $folderName;
                    $safeName = str_random(10) . '.' . $extension;
                    $file->move($destinationPath, $safeName);
                    $request['banner_post_images_'.$i] = $safeName;
                    $i++;
                }
            }

            $post = new BannerPosts($request->except('_token'));
            if($post->save()){
                return redirect('admin/banner_posts')->with('success',trans('bannerpost/message.success.create'));
            }else{
                echo redirect::back()->with('errors',trans('bannerpost/message.error.create'));
            }
        }

    // ================== Edit ============== //

    public function bannerpostedit(BannerPosts $banner){
        return view('la.banner_posts.edit',compact('banner'));
    }

    // ================== Update ============== //

    public function bannerpostupdate(BannerPostRequest $request,BannerPosts $banner){
        $number = count($request->file());
        if(!empty($number)){
            for ($i=0; $i < $number ; $i++) {
                $n = $i+1;
                if ($file = $request->file('img_file_'.$n)) {
                    $fileName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension() ?: 'png';
                    $folderName = '/uploads/bannerposts/';
                    $destinationPath = public_path() . $folderName;
                    $safeName = str_random(10) . '.' . $extension;
                    $file->move($destinationPath, $safeName);
                    $request['banner_post_images_'.$n] = $safeName;
                }
            }
        }
            if($banner->update($request->except('_token'))){
                return redirect('admin/banner_posts')->with('success',trans('bannerpost/message.success.update'));
            }else{
                echo redirect::back()->with('errors',trans('bannerpost/message.error.update'));
            }
    }

    // ================== Delete ============== //

    public function bannerpostdestroy(BannerPosts $banner){
        
        if($banner->delete()){
            return redirect('admin/banner_posts')->with('success',trans('post/message.success.delete'));
        }else{
            return redirect('admin/banner_posts')->with('errors',trans('post/message.error.delete'));
        }
    }
}
