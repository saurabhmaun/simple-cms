<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Page;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pages'] = Page::get();
        return view('admin.page-list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pages'] = Page::get();
        return view('admin.page',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $validator = Validator::make($request->all(), [
            
        ]);
        if ($validator->fails()) {

        }else{
            $pageObj = Page::where('id', $request->updateid)->get()->first();
            if(!$pageObj){
                $pageObj = new Page();
                $pageObj->parent_id = $request->parent_id;
                $pageObj->title = $request->title;
                $pageObj->content = $request->content;
                $pageObj->slug = Str::slug($request->title);
                $pageObj->save();
                return redirect('/page-list')->with('status', 'Page created');
            }else{
                $pageObj->parent_id = $request->parent_id;
                $pageObj->title = $request->title;
                $pageObj->content = $request->content;
                $pageObj->slug = Str::slug($request->title);
                $pageObj->save();
                return redirect('/page-list')->with('status', 'Page updated');
            }
        }
        
        //return view('admin.page');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        echo $request->id;
        $data['row'] = Page::where('id', $request->id)->get()->first();
        $data['pages'] = Page::get();
        $data['update'] = true;
        return view('admin.page', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePageRequest  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
