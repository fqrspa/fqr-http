<?php

namespace Database\Seeders;

use App\Models\Fqr\EntityCode;
use Illuminate\Database\Seeder;

class EntityCodesBankNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        EntityCode::where('entity','bank','and')->where('property','name')->delete();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "001";
        $codeEntity->description = "Banco de Chile";
        $codeEntity->save();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "009";
        $codeEntity->description = "Banco Internacional";
        $codeEntity->save();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "014";
        $codeEntity->description = "Scotiabank Chile";
        $codeEntity->save();


        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "016";
        $codeEntity->description = "Banco de crédito e inversiones (BCI)";
        $codeEntity->save();


        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "027";
        $codeEntity->description = "Banco Corpbanca";
        $codeEntity->save();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "028";
        $codeEntity->description = "Banco Bice";
        $codeEntity->save();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "031";
        $codeEntity->description = "HSBC Bank Chile";
        $codeEntity->save();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "037";
        $codeEntity->description = "Banco Santander Chile";
        $codeEntity->save();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "039";
        $codeEntity->description = "Itaú Corpbanca	";
        $codeEntity->save();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "049";
        $codeEntity->description = "Banco Security";
        $codeEntity->save();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "051";
        $codeEntity->description = "Banco Falabella";
        $codeEntity->save();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "053";
        $codeEntity->description = "Banco Ripley";
        $codeEntity->save();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "054";
        $codeEntity->description = "Rabobank Chile";
        $codeEntity->save();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "055";
        $codeEntity->description = "Banco Consorcio";
        $codeEntity->save();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "056";
        $codeEntity->description = "Banco Penta";
        $codeEntity->save();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "057";
        $codeEntity->description = "Banco Paris";
        $codeEntity->save();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "504";
        $codeEntity->description = "Banco Bilbao Vizcaya Argentaria Chile (BBVA)";
        $codeEntity->save();

        $codeEntity = new EntityCode;
        $codeEntity->entity= 'bank';
        $codeEntity->property= 'name';
        $codeEntity->code = "059";
        $codeEntity->description = "Banco BTG Pactual Chile";
        $codeEntity->save();
    }
}
