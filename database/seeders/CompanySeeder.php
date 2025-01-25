<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Job;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $company = Company::create([
            'company_name' => 'Test Company',
            'location' => 'New York',
        ]);

        Job::create([
            'title' => 'Developer',
            'description' => 'Build cool stuff.',
            'company_id' => $company->id,
        ]);

        Job::create([
            'title' => 'Designer',
            'description' => 'Create amazing designs.',
            'company_id' => $company->id,
        ]);
    }
}
