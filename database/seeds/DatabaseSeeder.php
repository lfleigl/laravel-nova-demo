<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'email' => 'info@orlyapps',
            'password' => bcrypt('hallo1.2!'),
            'name' => 'Orlyapps'
        ]);
        factory(\App\Company::class, 4)->create()->each(function ($company) {
            factory(\App\Department::class, 4)->create([
                'comp_id' => $company->company_id
            ]);
        });

        $department = \App\Department::find(1);
    }
}
