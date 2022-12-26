<?php

use App\Page;
use App\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $home_id    = Page::where('name', 'home')->first()->id;
        /** Home */
        Section::create(['page_id' => $home_id, 'name' => 'section_1']);
        Section::create(['page_id' => $home_id, 'name' => 'section_2']);



        /** quienes somos */
        Section::create(['page_id' => Page::where('name', 'quienes somos')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'quienes somos')->first()->id, 'name' => 'section_2']);
        Section::create(['page_id' => Page::where('name', 'quienes somos')->first()->id, 'name' => 'section_3']);

        /** servicios */
        Section::create(['page_id' => Page::where('name', 'servicios')->first()->id, 'name' => 'section_1']);

        /** maquinaria */
        Section::create(['page_id' => Page::where('name', 'maquinaria')->first()->id, 'name' => 'section_1']);

        /** obras realizadas */
        Section::create(['page_id' => Page::where('name', 'obras realizadas')->first()->id, 'name' => 'section_1']);

        /** clientes */
        Section::create(['page_id' => Page::where('name', 'clientes')->first()->id, 'name' => 'section_1']);

        /** videos */
        Section::create(['page_id' => Page::where('name', 'videos')->first()->id, 'name' => 'section_1']);
    }
}
