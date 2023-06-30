<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use Image;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    //
    public function HomeAbout(){
        $aboutpage = About::find(1);

        return view('frontend.about_page', compact('aboutpage'));
        
    }// End Method

    public function AboutPage(){

        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all', compact('aboutpage'));
        
    }// End Method

    public function UpdateAbout(Request $request){


        $about_id = $request->id;
        if($request->file('about_image')){
            $image = $request->file('about_image');
            $name_generate = hexdec(uniqid()). '.' . $image->getClientOriginalExtension(); // 3434343443.($image_extension)
            Image::make($image)->resize(523, 605)->save('upload/home_about/'.$name_generate);
            $save_url = 'upload/home_about/'.$name_generate;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'About Page Updated Successfully with Image',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }else{
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,          
            ]);
            $notification = array(
                'message' => 'About Page Updated Successfully without Image',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } // End Else

    }// End Method

    public function AboutMultiImage(){
        return view('admin.about_page.multimage');
    }// End Method

    public function StoreMultiimage(Request $request){
        $image = $request->file('multi_image');
        $counter = 0; // Counter to limit the image inserted

        foreach ($image as $multi_image) {
            if ($counter <7) {
                $name_generate = hexdec(uniqid()). '.' . $multi_image->getClientOriginalExtension(); // 3434343443.($image_extension)
                Image::make($multi_image)->resize(240, 240)->save('upload/multi/'.$name_generate);
                $save_url = 'upload/multi/'.$name_generate;
    
                MultiImage::insert([
                    'multi_image' => $save_url,
                    'created_at' => Carbon::now(),
                ]);
            }
            $counter++;
        } // End Foreach Loop

        $notification = array(
            'message' => 'Multiple Image Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.multi.image')->with($notification);

    }// End Method

    public function AllMultiImage(){
        $allMultiImage = MultiImage::all(); // all() used to get all the data inside the table
        return view('admin.about_page.all_multimage', compact('allMultiImage'));
    }// End Method

    public function EditMultiImage($id){

        $multiImage = MultiImage::findOrFail($id); // findOrFail()function is a method available on Eloquent models. It is used to retrieve a single record from the database based on its primary key ($id), and it throws an exception if no record is found.
        return view('admin.about_page.edit_multi_image', compact('multiImage'));
    
    }// End Method

    public function UpdateMultiImage(Request $request){

        $idImage = $request->id;
        if($request->file('multi_image')){
            $image = $request->file('multi_image');
            $name_generate = hexdec(uniqid()). '.' . $image->getClientOriginalExtension(); // 3434343443.($image_extension)
            Image::make($image)->resize(240, 240)->save('upload/multi/'.$name_generate);
            $save_url = 'upload/multi/'.$name_generate;

            MultiImage::findOrFail($idImage)->update([
                'multi_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Multi Image Updated Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.multi.image')->with($notification);    
        }
    }// End Method

    public function DeleteMultiImage($id){
        $multi = MultiImage::findOrFail($id);
        $img = $multi->multi_image;
        unlink($img);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Multi Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);    

    }// End Method

}
