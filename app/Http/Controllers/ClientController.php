<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    protected $page;

    public function __construct(){
        
        $this->page = Page::where('name', 'clientes')->first();
    }

    /**
     * @author Raul castro
     */

    public function content()
    {
        return view('administrator.clients.content');
    }

    /**
     * @param array $request
     * @author Raul castro
     */

    public function store(Request $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/client', 'public');
        $content = Content::create($data);
        return response()->json(['tableReload' => true],201);
    }


    public function update(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/client','public');
        }        
        $element->update($data);
    }

    public function destroy($id)
    {
        $element = Content::find($id);

        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);

        $element->delete();

        return response()->json([], 200);
    }

    /**
     * @author Raul castro
     * @return datatable
     */

    public function getList()
    {
        $sectionSlider = $this->page
            ->sections()
            ->where('name', 'section_1')
            ->first();

        $sliders = $sectionSlider->contents()
            ->orderBy('order', 'ASC');

        return DataTables::of($sliders)
        ->editColumn('image', function($slider){
            return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }
}
