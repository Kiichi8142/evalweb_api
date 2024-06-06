<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\Evaluation;
use App\Models\EvaluationItem;
use App\Models\Question;
use App\Models\Section;
use App\Models\Team;
use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            JobTitleSeeder::class,
            OrganizationSeeder::class,
            EmployeeSeeder::class
        ]);

        // $teams = Team::factory(3)->create();

        // foreach ($teams as $team) {
        //     $employees = Employee::factory(25)->for($team)->create();

        //     foreach ($employees as $employee) {
        //         User::factory()->for($employee)->state([
        //             "name" => $employee->firstname . " " . $employee->lastname,
        //         ])->create();
        //     }
        // }

        // $teams = Team::all();

        // foreach ($teams as $team) {
        //     $manager = $team->employees->random();
        //     $team->manager_id = $manager->id;
        //     $manager->position = "Team Manager";
        //     $manager->save();
        //     $team->save();
        // }

        // $teams = Team::all();

        // $sections = Section::factory(3)->sequence(
        //     ['name' => 'ผลงาน', 'max_score' => 50],
        //     ['name' => 'คุณลักษณะในการปฏิบัติงาน', 'max_score' => 30],
        //     ['name' => 'ลักษณะส่วนตัว', 'max_score' => 20]
        // )->create();

        // $template = Template::factory()->create([
        //     'name' => 'แบบประเมินผลการทำงานทั่วไปสำหรับพนักงานทั่วไป'
        // ]);

        // $template->sections()->sync($sections);

        // Question::factory(5)->for($template)->for($sections[0])->sequence(
        //     ['name' => 'คุณภาพงาน', 'description' => 'ความถูกต้องแม่นยำความเรียบร้อยความตรงต่อเวลา'],
        //     ['name' => 'ปริมาณงาน', 'description' => 'บรรลุเป้าหมายที่กำหนดทำงานเสร็จตามกำหนดเวลา จัดการกับงานที่ได้รับมอบหมายได้ดี'],
        //     ['name' => 'ทักษะและความรู้', 'description' => 'ความถูกต้องแม่นยำความเรียบร้อยและความตรงต่อเวลา'],
        //     ['name' => 'การแก้ปัญหา', 'description' => 'ความถูกต้องแม่นยำ ความเรียบร้อย ความตรงต่อเวลา'],
        //     ['name' => 'การริเริ่มและความคิดสร้างสรรค์', 'description' => 'ความถูกต้องแม่นยำ ความเรียบร้อย ความตรงต่อเวลา'],
        // )->create();
        // Question::factory(4)->for($template)->for($sections[1])->sequence(
        //     ['name' => 'ความรับผิดชอบ', 'description' => 'ตรงต่อเวลา ทำงานอย่างทุ่มเท รับผิดชอบต่อหน้าที่'],
        //     ['name' => 'การทำงานเป็นทีม', 'description' => 'ร่วมมือกับผู้อื่น สามารถสื่อสารกับผู้ร่วมงานได้แบ่งปันงานกับผู้อื่น'],
        //     ['name' => 'วินัย', 'description' => 'ตรงต่อเวลา ทำงานอย่างทุ่มเท และรับผิดชอบต่อหน้าที่'],
        //     ['name' => 'ความตั้งใจ', 'description' => 'มุ่งมั่นทำงานที่ได้รับมอบ ตั้งใจเรียนรู้และพัฒนาตนเอง'],
        // )->create();
        // Question::factory(3)->for($template)->for($sections[2])->sequence(
        //     ['name' => 'มารยาทและท่าที', 'description' => 'พูดจาสุภาพ อ่อนน้อมถ่อมตนและยิ้มแย้มแจ่มใสอารมณ์ดี'],
        //     ['name' => 'การสื่อสาร', 'description' => 'สื่อสารได้ชัดเจน เข้าใจผู้อื่น เป็นผู้ฟังอย่างตั้งใจ'],
        //     ['name' => 'ความสัมพันธ์กับผู้อื่น', 'description' => 'เข้ากับผู้อื่นได้ดี ช่วยเหลือผู้อื่นสร้างบรรยากาศที่ดีในการทำงาน'],
        // )->create();

        // foreach ($teams as $team) {
        //     $manager = $team->manager_id;
        //     $emps = $team->employees;

        //     foreach ($emps as $emp) {
        //         $eval = Evaluation::factory()->for($emp)->for($template)->create([
        //             "user_id" => $emp->id
        //         ]);

        //         if($emp->id != $manager) {
        //             Evaluation::factory()->for($emp)->for($template)->create([
        //                 "user_id" => $manager,
        //                 "accessor_eval_id" => $eval->id
        //             ]);
        //         }
        //     }
        // }

        // $templates = Template::all();

        // foreach ($templates as $template) {
        //     $evaluations = $template->evaluations;
        //     foreach ($evaluations as $evaluation) {
        //         foreach ($template->questions as $question) {
        //             EvaluationItem::factory()->for($question)->for($evaluation)->for($question->section)->create();
        //         }
        //     }
        // }

        User::factory(1)->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin'
        ]);

    }
}
