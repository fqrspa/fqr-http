<?php

namespace Database\Seeders;

use App\Models\Fqr\EntityCode;
use Illuminate\Database\Seeder;

class EntityCodesBankTypeCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        EntityCode::where('entity','bank','and')->where('property','countType')->delete();
        
        $codeEntity = new EntityCode();
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'countType';
        $codeEntity->code = "ctacte";
        $codeEntity->description = "Cuenta Corriente";
        $codeEntity->save();

        $codeEntity = new EntityCode();
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'countType';
        $codeEntity->code = "vista";
        $codeEntity->description = "Cuenta Vista";
        $codeEntity->save();

        $codeEntity = new EntityCode();
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'countType';
        $codeEntity->code = "ahorro";
        $codeEntity->description = "Cuenta Ahorro";
        $codeEntity->save();

    }
}
