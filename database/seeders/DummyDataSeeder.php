<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Running Projects: 10টি ইমেজ ডাউনলোড এবং ডেটাবেজে ইনসার্ট
        $path = public_path('running-projects');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $locations = ['Kolkata', 'Howrah', 'Bengaluru', 'Kerala', 'Mumbai', 'Delhi', 'Chennai', 'Hyderabad', 'Pune', 'Jaipur'];

        for ($i = 1; $i <= 10; $i++) {
            $imageName = time() . '_' . $i . '.jpg';
            $imageUrl = "https://picsum.photos/800/600?random=" . $i;
            $imageContent = @file_get_contents($imageUrl);

            if ($imageContent) {
                File::put($path . '/' . $imageName, $imageContent);
            }

            DB::table('running_projects')->insert([
                'title'       => 'Commercial Interior Project ' . $i,
                'location'    => $locations[array_rand($locations)],
                'image'       => $imageName,
                'description' => 'This is a detailed description for running project number ' . $i . '. 
                It includes modern architectural and interior design features.',
                'status'      => 1,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }

        // 2. Careers: 10টি ডামি জব সার্কুলার ইনসার্ট
        $jobs = [
            ['title' => 'Senior Laravel Developer', 'dept' => 'Engineering', 'exp' => '3-5 Years', 'vacancy' => 2],
            ['title' => 'Frontend Developer (React/Vue)', 'dept' => 'Engineering', 'exp' => '2-3 Years', 'vacancy' => 3],
            ['title' => 'UI/UX Designer', 'dept' => 'Design', 'exp' => '1-3 Years', 'vacancy' => 1],
            ['title' => 'Interior Architect', 'dept' => 'Architecture', 'exp' => '4+ Years', 'vacancy' => 2],
            ['title' => '3D Visualizer', 'dept' => 'Design', 'exp' => '2+ Years', 'vacancy' => 4],
            ['title' => 'Project Manager', 'dept' => 'Operations', 'exp' => '5+ Years', 'vacancy' => 1],
            ['title' => 'Site Supervisor', 'dept' => 'Operations', 'exp' => '2-4 Years', 'vacancy' => 5],
            ['title' => 'Digital Marketing Executive', 'dept' => 'Marketing', 'exp' => '1-2 Years', 'vacancy' => 2],
            ['title' => 'HR & Admin Officer', 'dept' => 'Human Resources', 'exp' => '2-3 Years', 'vacancy' => 1],
            ['title' => 'Accounts Executive', 'dept' => 'Finance', 'exp' => '2+ Years', 'vacancy' => 2],
        ];

        foreach ($jobs as $job) {
            DB::table('careers')->insert([
                'job_title'   => $job['title'],
                'department'  => $job['dept'],
                'location'    => $locations[array_rand($locations)],
                'experience'  => $job['exp'],
                'vacancy'     => $job['vacancy'],
                'description' => 'We are looking for an experienced ' . $job['title'] . ' to join our growing team. 
                Responsibilities include executing projects effectively and coordinating with cross-functional teams.',
                'status'      => 1,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}