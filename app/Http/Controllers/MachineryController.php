<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class MachineryController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'maquinaria')->first();
    }

    public function content()
    {
        return view('administrator.machinery.content');
    }

    public function create()
    {
        return view('administrator.machinery.create');
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('content_6')) 
            $data['content_6'] = $request->file('content_6')->store('images/data-sheet', 'public');

        $element = Content::create($data);

        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $element->images()->create([
                    'image' => $image->store('images/machinery', 'public')
                ]);
            }
        }
        return redirect()->route('machinery.edit', ['id' => $element->id]);
    }

    public function edit($id)
    {
        $element = Content::findOrFail($id);
        $numberOfImagesAllowed = 6 - $element->images()->count();
        return view('administrator.machinery.edit', compact('element', 'numberOfImagesAllowed'));
    }

    public function update(Request $request)
    {
        $element= Content::find($request->input('id'));
        $data   = $request->all();
        if($request->hasFile('content_6')) 
            $data['content_6'] = $request->file('content_6')->store('images/data-sheet', 'public');

        $element->update($data);
        
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $element->images()->create([
                    'image' => $image->store('images/machinery', 'public')
                ]);
            }
        }
        
        return back();
    }

    public function destroy($id)
    {
        $element = Content::find($id);
        $element->delete();
        return response()->json([], 200);
    }

    public function getList()
    {
        $elements = $this->page->sections()->where('name', 'section_1')->first();
        $elements = $elements->contents()->orderBy('order', 'ASC');
        
        return DataTables::of($elements)
        ->editColumn('image', function($element){
            return '<img src="'.asset($element->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->editColumn('content_2', function($element){
            return $element->content_2;
        })
        ->addColumn('actions', function($element) {
            return '<a href="'. route('machinery.edit', ['id' => $element->id]) .'" class="btn btn-sm btn-primary rounded-pill"><i class="far fa-edit"></i></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_2', 'image'])
        ->make(true);
    }
}
