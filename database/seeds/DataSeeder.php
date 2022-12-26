<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_id = Company::first()->id;

        Data::create([
            'company_id'=> $company_id,
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium nesciunt quaerat cum cumque architecto vitae distinctio ex aspernatur, quidem non nostrum, praesentium id, fugit animi ipsa rerum mollitia? Aspernatur, cum.',
            'address'   => 'Ameghino 867, Villa Martelli',
            'email'     => 'info@qsperforaciones.com.ar',
            'phone1'    => '01160609629|011 6060 9629',
            'phone2'    => '01122817993|011 2281 7993',
            'logo_header'=> '',
            'logo_footer'=> ''
        ]);
    }
}
