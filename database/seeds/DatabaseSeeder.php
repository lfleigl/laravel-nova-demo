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
            'email' => 'info@orlyapps.de',
            'password' => bcrypt('secret'),
            'name' => 'Orlyapps'
        ]);
        factory(\App\Company::class, 4)->create()->each(function ($company) {
            factory(\App\Department::class, 4)->create([
                'comp_id' => $company->company_id
            ])->each(function ($department) {
                factory(\App\Location::class, 4)->create([
                    'dep_id' => $department->department_id
                ]);
            });
        });

        $department = \App\Department::find(1);
    }
}
