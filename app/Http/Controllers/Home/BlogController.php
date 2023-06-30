<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Image;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    //
    public function AllBlog(){
        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs_all', compact('blogs'));


    }// End Method

    public function AddBlog(){
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();

        return view('admin.blogs.blogs_add', compact('categories'));


    }// End Method

    public function EditBlog($id){

        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blogs.blogs_edit', compact('blogs', 'categories'));


    }// End Method

    public function DeleteBlog($id){

        $blogs = Blog::findOrFail($id);
        $img = $blogs->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Has Been Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);    


    }// End Method

    public function StoreBlog(Request $request){

        $request->validate([
            'blogs_title' => 'required',
            'blog_category_id' => 'required',

        ],[
            'blogs_title.required' => 'Blog Title is Required',
            'blog_category_id.required' => 'Blog Category is Required',
        ]);

        $image = $request->file('blogs_image');
        $name_generate = hexdec(uniqid()). '.' . $image->getClientOriginalExtension(); // 3434343443.($image_extension)
        
        Image::make($image)->resize(1020, 519)->save('upload/blogs/'.$name_generate);
        $save_url = 'upload/blogs/'.$name_generate;
        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blogs_title,
            'blog_tags' => $request->blogs_tags,
            'blog_description' => $request->blogs_description,
            'blog_image' => $save_url,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Congratulations! The blog has been added successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blogs')->with($notification);


    }// End Method

    public function UpdateBlog(Request $request){

        $blog_id = $request->id;
        if($request->file('blogs_image')){
            $image = $request->file('blogs_image');
            $name_generate = hexdec(uniqid()). '.' . $image->getClientOriginalExtension(); // 3434343443.($image_extension)
            Image::make($image)->resize(1020, 519)->save('upload/blogs/'.$name_generate);
            $save_url = 'upload/blogs/'.$name_generate;

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blogs_title,
                'blog_tags' => $request->blogs_tags,
                'blog_description' => $request->blogs_description,
                'blog_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Blog Data Updated Successfully with Image',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.blogs')->with($notification);
        }else{
            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blogs_title,
                'blog_tags' => $request->blogs_tags,
                'blog_description' => $request->blogs_description,
            ]);
            $notification = array(
                'message' => 'Blog Data Updated Successfully without Image',
                'alert-type' => 'success'
            );
            return redirect()->route('all.blogs')->with($notification);
        } // End Else

    }// End Method

    public function BlogDetails($id){

        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $allblogs = Blog::latest()->limit(5)->get();
        $blogs = Blog::findOrFail($id);

        return view('frontend.blog_details', compact('blogs','allblogs','categories'));

    }// end Method

    public function CategoryBlogs($id){

        $blogposts = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        $allblogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();

        return view('frontend.category_list_blog', compact('blogposts','allblogs','categories'));

    }

    public function HomeBlog(){
        $allblogs = Blog::latest()->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();

        return view('frontend.blog', compact('allblogs','categories'));
    }
}
