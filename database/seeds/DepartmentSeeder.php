<?php
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::truncate();
        Department::insert([
            [
                'id'       =>'1',
                'name'       => 'CSE',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'id'       => '2',
                'name'       => 'ICE',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
            'id'       => '3',
            'name'       => 'Applied Chemistry',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'id'       => '4',
                'name'       => 'Applied Math',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'id'       => '5',
                'name'       => 'Physics',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]

        ]);
    }
}
