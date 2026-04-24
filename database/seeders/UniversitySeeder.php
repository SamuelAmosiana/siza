<?php

namespace Database\Seeders;

use App\Models\University;
use App\Models\Programme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UniversitySeeder extends Seeder
{
    public function run(): void
    {
        $unis = [
            [
                'name' => 'University of Zambia',
                'location' => 'Lusaka',
                'province' => 'Lusaka',
                'type' => 'public',
                'website' => 'https://www.unza.zm',
                'established_year' => 1966,
                'description' => 'The University of Zambia (UNZA) is the premier university in Zambia, providing excellence in higher education.',
                'programmes' => [
                    ['name' => 'Bachelor of Medicine and Surgery', 'level' => 'bachelor', 'faculty' => 'Medicine'],
                    ['name' => 'Bachelor of Laws', 'level' => 'bachelor', 'faculty' => 'Law'],
                    ['name' => 'Bachelor of Engineering', 'level' => 'bachelor', 'faculty' => 'Engineering'],
                    ['name' => 'Master of Public Health', 'level' => 'master', 'faculty' => 'Medicine'],
                ]
            ],
            [
                'name' => 'Copperbelt University',
                'location' => 'Kitwe',
                'province' => 'Copperbelt',
                'type' => 'public',
                'website' => 'https://www.cbu.ac.zm',
                'established_year' => 1987,
                'description' => 'A leading public university focused on business, mining, and technology.',
                'programmes' => [
                    ['name' => 'Bachelor of Accountancy', 'level' => 'bachelor', 'faculty' => 'Business'],
                    ['name' => 'Bachelor of Science in Mining Engineering', 'level' => 'bachelor', 'faculty' => 'Mines'],
                    ['name' => 'Bachelor of Computer Science', 'level' => 'bachelor', 'faculty' => 'ICT'],
                ]
            ],
            [
                'name' => 'Mulungushi University',
                'location' => 'Kabwe',
                'province' => 'Central',
                'type' => 'public',
                'website' => 'https://www.mu.ac.zm',
                'established_year' => 2008,
                'description' => 'One of Zambia\'s fastest growing public universities with three campuses.',
                'programmes' => [
                    ['name' => 'Bachelor of Science in Agriculture', 'level' => 'bachelor', 'faculty' => 'Agriculture'],
                    ['name' => 'Bachelor of International Relations', 'level' => 'bachelor', 'faculty' => 'Social Sciences'],
                ]
            ],
            [
                'name' => 'Zambia Open University',
                'location' => 'Lusaka',
                'province' => 'Lusaka',
                'type' => 'private',
                'website' => 'https://www.zaou.ac.zm',
                'established_year' => 2002,
                'description' => 'A leading private institution offering flexible distance and open learning.',
                'programmes' => [
                    ['name' => 'Bachelor of Education', 'level' => 'bachelor', 'faculty' => 'Education'],
                    ['name' => 'Master of Business Administration', 'level' => 'master', 'faculty' => 'Business'],
                ]
            ]
        ];

        foreach ($unis as $uniData) {
            $programmes = $uniData['programmes'];
            unset($uniData['programmes']);

            $uniData['slug'] = Str::slug($uniData['name']);
            $university = University::create($uniData);

            foreach ($programmes as $progData) {
                $progData['slug'] = Str::slug($progData['name']);
                $university->programmes()->create($progData);
            }
        }
    }
}
