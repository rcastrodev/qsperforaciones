<?php

use App\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create(['name' => 'home']);
        Page::create(['name' => 'quienes somos']);
        Page::create(['name' => 'servicios']);
        Page::create(['name' => 'maquinaria']);
        Page::create(['name' => 'obras realizadas']);
        Page::create(['name' => 'clientes']);
        Page::create(['name' => 'videos']);
        Page::create(['name' => 'contacto']);
    }
}
