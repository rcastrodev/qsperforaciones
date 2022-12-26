<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;


class ServiceController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'servicios')->first();
    }

    public function content()
    {
        $sections   = $this->page->sections;
        $section_1   = $sections->where('name', 'section_1')->first()->contents()->first();
        return view('administrator.service.content', compact('section_1'));
    }

    public function create()
    {
        return view('administrator.service.create');
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/service','public');

        if ($request->hasFile('content_7'))
            $data['content_7'] = $request->file('content_7')->store('images/service','public');
        
        $element = Content::create($data);

        return redirect()->route('service.edit', ['id' => $element->id]);
    }

    public function edit($id)
    {
        $element = Content::findOrFail($id);
        return view('administrator.service.edit', compact('element'));
    }

    public function update(Request $request)
    {
        $element= Content::find($request->input('id'));
        $data   = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/service','public');
        } 

        if($request->hasFile('content_7')){
            if(Storage::disk('public')->exists($element->content_7))
                Storage::disk('public')->delete($element->content_7);
            
            $data['content_7'] = $request->file('content_7')->store('images/service','public');
        } 

        $element->update($data);
        return back();
    }

    public function destroy($id)
    {
        $element = Content::find($id);
        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);

        if(Storage::disk('public')->exists($element->content_7))
            Storage::disk('public')->delete($element->content_7);

        $element->delete();
        
        return response()->json([], 200);
    }

    public function getList()
    {
        $services = $this->page->sections()->where('name', 'section_2')->first();
        $services = $services->contents()->orderBy('order', 'ASC');

        return DataTables::of($services)
        ->editColumn('image', function($service){
            return '<img src="'.asset($service->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->editColumn('content_2', function($service){
            return $service->content_2;
        })
        ->addColumn('actions', function($service) {
            return '<a href="'. route('service.edit', ['id' => $service->id]) .'" class="btn btn-sm btn-primary rounded-pill"><i class="far fa-edit"></i></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$service->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_2', 'image'])
        ->make(true);
    }
}
