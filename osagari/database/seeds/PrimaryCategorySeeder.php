<?php

use Illuminate\Database\Seeder;
use App\Models\PrimaryCategory;

class PrimaryCategorySeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    factory(PrimaryCategory::class)->create([
      'id'      => 1,
      'name'    => 'デザイン、建築',
      'sort_no' => 1,
    ]);
    factory(PrimaryCategory::class)->create([
      'id'      => 2,
      'name'    => '応用生物、応用化学',
      'sort_no' => 2,
    ]);
    factory(PrimaryCategory::class)->create([
      'id'      => 3,
      'name'    => '情報、機械、電子',
      'sort_no' => 3,
    ]);
    factory(PrimaryCategory::class)->create([
      'id'      => 4,
      'name'    => '一般教養',
      'sort_no' => 4,
    ]);
  }
}
