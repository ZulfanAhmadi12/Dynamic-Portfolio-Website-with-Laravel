<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portofolio;
use Image;
use Illuminate\Support\Carbon;

class PortofolioController extends Controller
{
    //
    public function AllPortofolio(){
        $portofolio = Portofolio::latest()->get();
        return view('admin.portofolio.portofolio_all', compact('portofolio'));


    }// End Method

    public function HomePortfolio(){
        $portofolio = Portofolio::latest()->get();
        return view('frontend.portfolio', compact('portofolio'));


    }// End Method

    public function AddPortofolio(){

        return view('admin.portofolio.portofolio_add');


    }// End Method

    public function EditPortofolio($id){

        $portofolio = Portofolio::findOrFail($id);
        return view('admin.portofolio.portofolio_edit', compact('portofolio'));


    }// End Method
 
    public function DeletePortofolio($id){

        $portofolio = Portofolio::findOrFail($id);
        $img = $portofolio->portofolio_image;
        unlink($img);

        Portofolio::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Portfolio Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);    


    }// End Method

    public function StorePortofolio(Request $request){
        $request->validate([
            'portofolio_name' => 'required',
            'portofolio_title' => 'required',
            'portofolio_image' => 'required',

        ],[
            'portofolio_name.required' => 'Portfolio Name is Required',
            'portofolio_title.required' => 'Portfolio Title is Required',
        ]);

        $image = $request->file('portofolio_image');
        $name_generate = hexdec(uniqid()). '.' . $image->getClientOriginalExtension(); // 3434343443.($image_extension)
        
        Image::make($image)->resize(1020, 519)->save('upload/portofolio/'.$name_generate);
        $save_url = 'upload/portofolio/'.$name_generate;

        Portofolio::insert([
            'portofolio_name' => $request->portofolio_name,
            'portofolio_title' => $request->portofolio_title,
            'portofolio_description' => $request->portofolio_description,
            'portofolio_image' => $save_url,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Portfolio Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portofolio')->with($notification);


    }// End Method

    public function UpdatePortofolio(Request $request){

        $portofolio_id = $request->id;
        if($request->file('portofolio_image')){
            $image = $request->file('portofolio_image');
            $name_generate = hexdec(uniqid()). '.' . $image->getClientOriginalExtension(); // 3434343443.($image_extension)
            Image::make($image)->resize(1020, 519)->save('upload/portofolio/'.$name_generate);
            $save_url = 'upload/portofolio/'.$name_generate;

            Portofolio::findOrFail($portofolio_id)->update([
                'portofolio_name' => $request->portofolio_name,
                'portofolio_title' => $request->portofolio_title,
                'portofolio_description' => $request->portofolio_description,
                'portofolio_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Portfolio Updated Successfully with Image',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.portofolio')->with($notification);
        }else{
            Portofolio::findOrFail($portofolio_id)->update([
                'portofolio_name' => $request->portofolio_name,
                'portofolio_title' => $request->portofolio_title,
                'portofolio_description' => $request->portofolio_description,
            ]);
            $notification = array(
                'message' => 'Portfolio Updated Successfully without Image',
                'alert-type' => 'success'
            );
            return redirect()->route('all.portofolio')->with($notification);
        } // End Else

    }// End Method

    public function PortofolioDetails($id){
        $portofolio = Portofolio::findOrFail($id);
        return view('frontend.portofolio_details', compact('portofolio'));
    }// End Method
}
