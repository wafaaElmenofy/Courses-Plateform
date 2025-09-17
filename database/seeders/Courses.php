<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course; // تأكد من استدعاء الموديل هنا

class Courses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Course::create([
            'title' => 'Web Design & Development',
            'description' => 'Courses for biggner',
            'start_date' => '2025-09-20',
            'max_students' => 15,
            'instructor_id' => 1
        ]);

        Course::create([
            'title' => 'Graphic Design',
            'description' => 'Courses for biggner',
            'start_date' => '2025-09-20',
            'max_students' => 10,
            'instructor_id' => 1
        ]);

        Course::create([
            'title' => 'Video Editing',
            'description' => 'Courses for biggner',
            'start_date' => '2025-09-20',
            'max_students' => 15,
            'instructor_id' => 1
        ]);

        Course::create([
            'title' => 'Online Marketing',
            'description' => 'Courses for biggner',
            'start_date' => '2025-09-20',
            'max_students' => 10,
            'instructor_id' => 1
        ]);

        Course::create([
    'title' => 'Mobile App Development',
    'description' => 'Courses for beginners',
    'start_date' => '2025-09-22',
    'max_students' => 20,
    'instructor_id' => 2
]);

Course::create([
    'title' => 'UX/UI Design',
    'description' => 'Learn user experience and interface design',
    'start_date' => '2025-09-25',
    'max_students' => 12,
    'instructor_id' => 2
]);

Course::create([
    'title' => 'Digital Photography',
    'description' => 'Courses for beginners in photography',
    'start_date' => '2025-09-28',
    'max_students' => 15,
    'instructor_id' => 3
]);

Course::create([
    'title' => 'SEO & Content Marketing',
    'description' => 'Improve your online presence',
    'start_date' => '2025-10-01',
    'max_students' => 10,
    'instructor_id' => 3
]);

Course::create([
    'title' => '3D Animation',
    'description' => 'Introduction to 3D animation and modeling',
    'start_date' => '2025-10-05',
    'max_students' => 8,
    'instructor_id' => 4
]);

Course::create([
    'title' => 'Python Programming',
    'description' => 'Learn Python from scratch',
    'start_date' => '2025-10-10',
    'max_students' => 25,
    'instructor_id' => 4
]);
    }
}
