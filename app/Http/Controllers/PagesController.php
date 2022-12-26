<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Post;
use App\Client;
use App\Content;
use App\Product;
use App\Category;
use App\WorkDone;
use App\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'home')->first();
        if ($page) {
            SEO::setTitle('home');
            SEO::setDescription($this->data->description);
        }

        /** Secciones de página */
        $sections = $page->sections;
        $sliders = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get(); // section1 == sección de slider
        $section2 = $sections->where('name', 'section_2')->first()->contents()->first(); // section2 == sección de card
        $services = Content::where('section_id', 6)->orderBy('order', 'ASC')->get();
        $machinery = Content::where('section_id', 7)->orderBy('order', 'ASC')->get();
        $worksMade = Content::where('section_id', 8)->orderBy('order', 'ASC')->get();
        $clients = Content::where('section_id', 9)->orderBy('order', 'ASC')->get();

        if (count($machinery) > 3) 
            $machinery = Content::where('section_id', 7)->orderBy('order', 'ASC')->take(3)->get();
        
        if( count($worksMade) > 2 )
            $worksMade = Content::where('section_id', 8)->orderBy('order', 'ASC')->take(2)->get();

        
        return view('paginas.index', compact('sliders', 'section2', 'services', 'machinery', 'worksMade', 'clients'));
    }

    public function quienesSomos()
    {
        $page = Page::where('name', 'quienes somos')->first();
        if ($page) {
            SEO::setTitle('quienes somos');
            SEO::setDescription($this->data->description);
        }

        /** Secciones de página */
        $sections = $page->sections;
        $sliders  = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get(); 
        $section2 = $sections->where('name', 'section_2')->first()->contents()->first(); 
        $textService = Content::where('section_id', 5)->first();  
        $services = Content::where('section_id', 6)->orderBy('order', 'ASC')->get();           
        return view('paginas.quienes-somos', compact('sliders',  'section2', 'textService', 'services'));
    }

    public function servicios()
    {
        SEO::setTitle('Servicios');
        SEO::setDescription($this->data->description);
        $services = Content::where('section_id', 6)->orderBy('order', 'ASC')->get();  
        return view('paginas.servicios', compact('services'));
    }

    public function maquinarias()
    {
        SEO::setTitle('maquinaria');
        SEO::setDescription($this->data->description);
        $machinery = Content::where('section_id', 7)->orderBy('order', 'ASC')->get();  
        return view('paginas.maquinarias', compact('machinery'));
    }

    public function maquinaria($id)
    {
        $mach = Content::findOrFail($id);
        SEO::setTitle($mach->content_1);
        SEO::setDescription(strip_tags($mach->content_2));
        $machinery = Content::where('section_id', 7)->orderBy('order', 'ASC')->get();  
        
        return view('paginas.maquinaria', compact('mach', 'machinery'));
    }

    public function obrasRealizadas()
    {
        SEO::setTitle('obras realizadas');
        SEO::setDescription($this->data->description);
        $worksMade = Content::where('section_id', 8)->orderBy('order', 'ASC')->get();  
        return view('paginas.obras-realizadas', compact('worksMade'));
    }

    public function obraRealizada($id)
    {
        $wm = Content::findOrFail($id);
        SEO::setTitle($wm->content_1);
        SEO::setDescription(strip_tags($wm->content_2));
        $worksMade = Content::where('section_id', 8)->orderBy('order', 'ASC')->get();  
        return view('paginas.obra-realizada', compact('wm', 'worksMade'));
    }

    public function clientes()
    {
        SEO::setTitle('clientes');
        SEO::setDescription($this->data->description);
        $clients = Content::where('section_id', 9)->orderBy('order', 'ASC')->get();  
        return view('paginas.clientes', compact('clients'));
    }

    public function videos()
    {
        SEO::setTitle('videos');
        SEO::setDescription($this->data->description);
        $videos = Content::where('section_id', 10)->orderBy('order', 'ASC')->get();  
        return view('paginas.videos', compact('videos'));
    }

    public function solicitarPresupuesto()
    {
        SEO::setTitle('solicitar presupuesto');
        SEO::setDescription($this->data->description);

        return view('paginas.solicitar-presupuesto');   
    }

    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("contacto");
        SEO::setDescription($this->data->description);      
        return view('paginas.contacto', compact('page'));
    }

    public function fichaTecnica($id)
    {
        $element = Content::findOrFail($id);  
        return Response::download($element->content_6);  
    }

    public function borrarFichaTecnica($id)
    {
        $element = Content::findOrFail($id);  
        
        if(Storage::disk('public')->exists($element->content_6))
            Storage::disk('public')->delete($element->content_6);

        $element->content_6 = null;
        $element->save();

        return response()->json([], 200);
    }
}