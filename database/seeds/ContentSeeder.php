<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        for ($i=0; $i < 2; $i++) { 
            Content::create([
                'section_id'=> 1,
                'image'     => 'images/home/Enmascarar_grup_524.png',
                'content_1' => 'Somos la base',
                'content_2' => 'de todo buen negocio'
            ]);
        }

        Content::create([
            'section_id'=> 2,
            'image'     =>  'images/home/Enmascarar_grupo_521.png',
            'content_1' =>  'MÁS DE 20 AÑOS EN EL MERCADO',
            'content_2' =>  'Somos una empresa conformada por un equipo altamente calificado, Seguimos contando con la misma ingeniería y con el mismo apoyo de quienes siempre confiaron en nosotros, manteniendo así la eficacia y calidad en nuestros trabajos.'
        ]);

        /** quienes somos */
        for ($i=0; $i < 3; $i++) { 
            Content::create([
                'section_id'=> 3,
                'order'     => 'AA',
                'image'     => 'images/company/Enmascarar_grup_524.png'
            ]);
        }


        Content::create([
            'section_id'=> 4,
            'image'     => 'images/company/Enmascarar_grupo_507.png',
            'content_1' => 'SOBRE NOSOTROS',
            'content_2' => '<p>QS Perforaciones una empresa cuya sede se encuentra en la ciudad de Lanús dedicada a prestar servicios para la construcción en el rubro fundaciones (pilotes, anclajes, micropilotes, inyecciones, etc.).</p>
            <p> Cuenta con personal altamente calificado con más de 20 años de experiencia en cualquiera de las especialidades enunciadas, abarcando un extenso abanico de servicios con el fin de ofrecer la más alta calidad en la ejecución de obras y proyectos de todo tipo.</p>
            <p> Contamos con Recursos Humanos, Maquinaria y equipo necesario para el desarrollo de las actividades de planeación y ejecución de cualquier tipo de obra geotécnica orientada a las fundaciones.</p>
            <p> Nuestro principal empeño es desenvolvernos en un marco de calidad, eficiencia y responsabilidad en todo proyecto el cual nos permita ,junto a nuestro cliente , alcanzar con exito el objetivo trazado.</p>'
        ]);


        /** Servicios */

        Content::create([
            'section_id'=> 5,
            'content_1' => 'Somos una empresa conformada por un equipo altamente calificado, Seguimos contando con la misma ingeniería y con el mismo apoyo de quienes siempre confiaron en nosotros, manteniendo así la eficacia y calidad en nuestros trabajos.'
        ]);

        Content::create([
            'section_id'=> 6,
            'order'     => 'AA',
            'image'     => 'images/support.svg',
            'content_1' => 'Pilotes',
            'content_2' => '<p>Realizamos Pilotes In Situ hasta 1,60 mts de diametro y hasta 50 mts. de profundidad.</p><p> Para ello utilizamos una máquina Soilmec RT3 ST. También realizamos Pilotes In Situ hasta 1,50 mts de diametro y hasta 40 mts. de profundidad. Lo que utilizamos en estos casos es una máquina Soilmec sobre camión Fiat RTA. Para Pilotes In Situ de hasta 1,00 mts de diametro y hasta 20 mts. de profundidad usamos una máquina Hidromac.</p>',
            'content_3' => 'images/service/Enmascarar_grupo_515.png'
        ]);

        Content::create([
            'section_id'=> 6,
            'order'     => 'BB',
            'image'     => 'images/support.svg',
            'content_1' => 'Micropilotes',
            'content_2' => '<p>Realizamos Micropilotes desde 15 cms. hasta 22 cms de diametro y hasta 35 mts. de profundidad. Para ello utilizamos una máquina Klemm 806 y una Soilmec 305 entre otras</p>',
            'content_3' => 'images/service/Enmascarar_grupo_515.png'
        ]);

        Content::create([
            'section_id'=> 6,
            'order'     => 'CC',
            'image'     => 'images/support.svg',
            'content_1' => 'Anclajes',
            'content_2' => '<p>Realizamos Anclajes para distintos tipos de obras Compromiso y rapidez son las cualidades que nos identifican a la hora de emprender una nueva obra, disponiendo de equipos y personal extra. Cumpliendo plazos y expectativas. Su proyecto, es nuestro proyecto.</p>',
            'content_3' => 'images/service/Enmascarar_grupo_515.png'
        ]);

        Content::create([
            'section_id'=> 6,
            'order'     => 'AA',
            'image'     => 'images/support.svg',
            'content_1' => 'Estudio de Suelo',
            'content_2' => '<p>Como empresa especializada en estudio de suelo hacemos investigación de suelos y proyectos de caminos, control de calidad de hormigones y suelos haciendo análisis y ensayos de laboratorio, físicos y/o químicos. Realizamos Movimientos de Suelo para distintos tipos de obras</p>',
            'content_3' => 'images/service/Enmascarar_grupo_515.png'
        ]);


        /** maquinaria  */
        Content::create([
            'section_id'=> 7,
            'order'     => 'AA',
            'image'     => 'images/machinery/Imagen_63.png',
            'content_1' => 'Perforadora Soilmec 305 para Micropilotes',
            'content_2' => '<p>Realizamos Micropilotes desde 15 cms. hasta 22 cms de diametro y hasta 35 mts. de profundidad. Para ello utilizamos una máquina Klemm 806 y una Soilmec 305 entre otras</p>',
            'content_3' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        ]);

        Content::create([
            'section_id'=> 7,
            'order'     => 'BB',
            'image'     => 'images/machinery/Imagen_63.png',
            'content_1' => 'Perforadora RT3',
            'content_2' => '<p>Realizamos Micropilotes desde 15 cms. hasta 22 cms de diametro y hasta 35 mts. de profundidad. Para ello utilizamos una máquina Klemm 806 y una Soilmec 305 entre otras</p>',
            'content_3' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        ]);

        Content::create([
            'section_id'=> 7,
            'order'     => 'CC',
            'image'     => 'images/machinery/Imagen_63.png',
            'content_1' => 'pilotera H113-8',
            'content_2' => '<p>Realizamos Micropilotes desde 15 cms. hasta 22 cms de diametro y hasta 35 mts. de profundidad. Para ello utilizamos una máquina Klemm 806 y una Soilmec 305 entre otras</p>',
            'content_3' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        ]);

        Content::create([
            'section_id'=> 7,
            'order'     => 'DD',
            'image'     => 'images/machinery/Imagen_63.png',
            'content_1' => 'pilotera Soilmec sobre camion Fiat',
            'content_2' => '<p>Realizamos Micropilotes desde 15 cms. hasta 22 cms de diametro y hasta 35 mts. de profundidad. Para ello utilizamos una máquina Klemm 806 y una Soilmec 305 entre otras</p>',
            'content_3' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        ]);

        Content::create([
            'section_id'=> 7,
            'order'     => 'EE',
            'image'     => 'images/machinery/Imagen_63.png',
            'content_1' => 'bomba inyectora clivio',
            'content_2' => '<p>Realizamos Micropilotes desde 15 cms. hasta 22 cms de diametro y hasta 35 mts. de profundidad. Para ello utilizamos una máquina Klemm 806 y una Soilmec 305 entre otras</p>',
            'content_3' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        ]);


        /** obras realizadas */

        Content::create([
            'section_id'=> 8,
            'order'     => 'AA',
            'image'     => 'images/works_made/Enmascarar_grupo_491.png',
            'content_1' => 'Perforaciones - Caratini-49 - JUST INTERNACIONAL LATAM - Gral Rodriguez',
            'content_2' => '<p>Trabajo de Perforaciones en Terreno Natural de 0,60 m de diámetro por 2,50 m de profundidad en Just Internacional LATAM</p>',
            'content_3' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'content_4' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        ]);

        Content::create([
            'section_id'=> 8,
            'order'     => 'BB',
            'image'     => 'images/works_made/Enmascarar_grupo_491.png',
            'content_1' => 'Micropilotes Saenz Peña 2227 - Pinturerías Rex - San Andrés',
            'content_2' => '<p>Trabajo de Perforaciones en Terreno Natural de 0,60 m de diámetro por 2,50 m de profundidad en Just Internacional LATAM</p>',
            'content_3' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'content_4' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        ]);

        Content::create([
            'section_id'=> 8,
            'order'     => 'CC',
            'image'     => 'images/works_made/Enmascarar_grupo_491.png',
            'content_1' => 'Micropilotes Saenz Peña 2227 - Pinturerías Rex - San Andrés',
            'content_2' => '<p>Trabajo de Perforaciones en Terreno Natural de 0,60 m de diámetro por 2,50 m de profundidad en Just Internacional LATAM</p>',
            'content_3' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'content_4' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        ]);

        Content::create([
            'section_id'=> 8,
            'order'     => 'DD',
            'image'     => 'images/works_made/Micropilotes - Uriarte 2240 - Centro Medico Fernandez - CABA',
            'content_1' => 'Micropilotes - Terralagos - Canning',
            'content_2' => '<p>Trabajo de Perforaciones en Terreno Natural de 0,60 m de diámetro por 2,50 m de profundidad en Just Internacional LATAM</p>',
            'content_3' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'content_4' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        ]);

        Content::create([
            'section_id'=> 8,
            'order'     => 'EE',
            'image'     => 'images/works_made/Enmascarar_grupo_491.png',
            'content_1' => 'Anclajes - Banco Nación - CABA',
            'content_2' => '<p>Trabajo de Perforaciones en Terreno Natural de 0,60 m de diámetro por 2,50 m de profundidad en Just Internacional LATAM</p>',
            'content_3' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'content_4' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        ]);

        Content::create([
            'section_id'=> 8,
            'order'     => 'FF',
            'image'     => 'images/works_made/Enmascarar_grupo_491.png',
            'content_1' => 'Micropilotes - Charcas 5151 - CABA',
            'content_2' => '<p>Trabajo de Perforaciones en Terreno Natural de 0,60 m de diámetro por 2,50 m de profundidad en Just Internacional LATAM</p>',
            'content_3' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'content_4' => '<iframe width="853" height="480" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        ]);
        
        /** clientes */
        Content::create([
            'section_id'=> 9,
            'order'     => 'AA',
            'image'     => 'images/client/31af8-logo-gatti-.png'
        ]);

        Content::create([
            'section_id'=> 9,
            'order'     => 'BB',
            'image'     => 'images/client/14117796_1743145639256916_2487992186213103574_n.png'
        ]);

        Content::create([
            'section_id'=> 9,
            'order'     => 'CC',
            'image'     => 'images/client/Enmascarar_grupo_525.png'
        ]);
    
        Content::create([
            'section_id'=> 9,
            'order'     => 'DD',
            'image'     => 'images/client/Enmascarar_grupo_526.png'
        ]);

        Content::create([
            'section_id'=> 9,
            'order'     => 'EE',
            'image'     => 'images/client/Enmascarar_grupo_527.png'
        ]);

        Content::create([
            'section_id'=> 9,
            'order'     => 'FF',
            'image'     => 'images/client/Enmascarar_grupo_528.png'
        ]);

        Content::create([
            'section_id'=> 9,
            'order'     => 'GG',
            'image'     => 'images/client/Enmascarar_grupo_529.png'
        ]);

        Content::create([
            'section_id'=> 9,
            'order'     => 'HH',
            'image'     => 'images/client/Enmascarar_grupo_530.png'
        ]);

        Content::create([
            'section_id'=> 9,
            'order'     => 'II',
            'image'     => 'images/client/Imagen_81.png'
        ]);

        Content::create([
            'section_id'=> 9,
            'order'     => 'JJ',
            'image'     => 'images/client/Imagen_86.png'
        ]);

        /** Videos */
        Content::create([
            'section_id'=> 10,
            'order'     => 'JJ',
            'image'     => '<iframe width="644" height="362" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'content_1' => 'Micropilotes Charcas 5151 Caba.Palermo Hollywood'
        ]);
    }
}






