<?php

namespace App\Http\Controllers;
//use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Models\PostsBlog;
use App\Models\User;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=PostsBlog::paginate(3);
return view('Blog.index',['posts'=>$posts]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Blog.CRUD.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'content'=>'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048 ' 
             //dimensions:min_width=250,max_height=500
        ]);
     
      
        $slug=SlugService::createSlug(PostsBlog::class,'slug',
        $request->title && $request->id);

        
        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        PostsBlog::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'slug'=> SlugService::createSlug(PostsBlog::class,'slug',
            $request->title && $request->id),
            'content'=> $request->input('content'),
            'category'=> $request->input('category'),
            'URL1'=> $request->input('URL1'),
            'URL2'=> $request->input('URL2'),
            'user_id'=> auth()->user()->id,
            'user_name'=> auth()->user()->name,
            'role'=> auth()->user()->role,
            'image'=> $newImageName,
            
        ]);
    return redirect('/blog/create')->with('message','You have created a new post!');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $posts=PostsBlog::where('slug',$slug)->get();
        return view('Blog.article',['posts'=>$posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        return view('Blog.CRUD.update')->with('posts', PostsBlog::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'content' => 'required',
        ]);
                
       // $newImageName = uniqid() . '-' . $request->title . '.' . $request->image;
       // $request->image->move(public_path('images'), $newImageName);
        PostsBlog::where('slug', $slug)->update
        ([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
          
            'slug'=> SlugService::createSlug(PostsBlog::class,'slug',
            $request->title),
            'category'=>$request->input('category'),
            'content'=> $request->input('content'),
            //'image'=> $request->input('image'),
            //'image'=> $newImageName,
            
        ]);
       // return redirect('/blog')->with('posts', PostsBlog::where('slug', $slug)->first())->with('message','You have created a new post!');
       // return redirect('/blog/edit')->with('message','You have created a new post!');
       //$posts=PostsBlog::paginate(3);
       //return view('Blog.index',['posts'=>$posts]);
       return view('Blog.MSG.msgupdate');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {  
        $posts=PostsBlog::where('slug',$slug);
        $posts->delete();
        return view('Blog.MSG.msgdelete');
        
        
    }
}
