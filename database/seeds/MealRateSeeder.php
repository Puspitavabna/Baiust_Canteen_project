<?php
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\MealRate;

class MealRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MealRate::truncate();
        MealRate::insert([
            [
                'id'       =>'1',
                'meal_rate_name'       => 'package 1',
                'breakfast_rate'  =>  '50',
                'breakfast_menu'  =>  'Dim pauruti',
                'lunch_rate'  =>  '80',
                'lunch_menu'  =>  'Biriyani',
                'Dinner_rate'  =>  '50',
                'Dinner_menu'  =>  'Aluvorta Dal',
                'active' => '1',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'id'       =>'2',
                'meal_rate_name'       => 'package 2',
                'breakfast_rate'  =>  '50',
                'breakfast_menu'  =>  'khichuri',
                'lunch_rate'  =>  '80',
                'lunch_menu'  =>  'Murgi',
                'Dinner_rate'  =>  '50',
                'Dinner_menu'  =>  'Sutivorta Dal',
                'active' =>'0',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'id'       =>'3',
                'meal_rate_name'       => 'package 3',
                'breakfast_rate'  =>  '50',
                'breakfast_menu'  =>  'Porota Aluvaji',
                'lunch_rate'  =>  '80',
                'lunch_menu'  =>  'Dim',
                'Dinner_rate'  =>  '50',
                'Dinner_menu'  =>  'Alu vorta Dal',
                'active' =>'0',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
