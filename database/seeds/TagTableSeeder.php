<?php

use App\Tag;
use App\Tagcategory;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$tag_cat_phase = Tagcategory::where('name', 'fase')->first();
    	$tag_cat_department = Tagcategory::where('name', 'afdeling')->first();
    	$tag_cat_samenwerkingsvorm = Tagcategory::where('name', 'samenwerkingsvorm')->first();

    	$phase_orientatie = new Tag();
    	$phase_orientatie->name = 'oriëntatie';
    	$phase_orientatie->description = '';
    	$phase_orientatie->save();
    	$tag_cat_phase->tags()->save($phase_orientatie);

    	$phase_afweging = new Tag();
    	$phase_afweging->name = 'afweging';
    	$phase_afweging->description = '';
    	$phase_afweging->save();
    	$tag_cat_phase->tags()->save($phase_afweging);

    	$phase_besluitvorming = new Tag();
    	$phase_besluitvorming->name = 'besluitvorming';
    	$phase_besluitvorming->description = '';
    	$phase_besluitvorming->save();
    	$tag_cat_phase->tags()->save($phase_besluitvorming);

    	$phase_uitvoering = new Tag();
    	$phase_uitvoering->name = 'uitvoering';
    	$phase_uitvoering->description = '';
    	$phase_uitvoering->save();
    	$tag_cat_phase->tags()->save($phase_uitvoering);

    	$department_bestuurders = new Tag();
    	$department_bestuurders->name = 'bestuurders';
    	$department_bestuurders->description = '';
    	$department_bestuurders->save();
    	$tag_cat_department->tags()->save($department_bestuurders);

    	$department_bestuurders = new Tag();
    	$department_bestuurders->name = 'bestuurders';
    	$department_bestuurders->description = '';
    	$department_bestuurders->save();
    	$tag_cat_department->tags()->save($department_bestuurders);

    	$department_docentteams = new Tag();
    	$department_docentteams->name = 'docenten (teams)';
    	$department_docentteams->description = '';
    	$department_docentteams->save();
    	$tag_cat_department->tags()->save($department_docentteams);

    	$department_ict = new Tag();
    	$department_ict->name = 'ICT';
    	$department_ict->description = '';
    	$department_ict->save();
    	$tag_cat_department->tags()->save($department_ict);

    	$department_communicatie = new Tag();
    	$department_communicatie->name = 'communicatie';
    	$department_communicatie->description = '';
    	$department_communicatie->save();
    	$tag_cat_department->tags()->save($department_communicatie);

    	$department_hrm = new Tag();
    	$department_hrm->name = 'HRM';
    	$department_hrm->description = '';
    	$department_hrm->save();
    	$tag_cat_department->tags()->save($department_hrm);

    	$samenwerkingsvorm_volledig = new Tag();
    	$samenwerkingsvorm_volledig->name = 'volledige samenwerking';
    	$samenwerkingsvorm_volledig->description = '';
    	$samenwerkingsvorm_volledig->save();
    	$tag_cat_samenwerkingsvorm->tags()->save($samenwerkingsvorm_volledig);

    }
}
