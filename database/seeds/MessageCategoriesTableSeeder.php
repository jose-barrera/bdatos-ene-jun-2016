<?php

use Illuminate\Database\Seeder;

use App\Models\MessageCategory;

class MessageCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MessageCategory::create([
            'key' => 'question',
            'description' => 'Pregunta'
        ]);

        MessageCategory::create([
            'key' => 'petition',
            'description' => 'Petición'
        ]);

        MessageCategory::create([
            'key' => 'notice',
            'description' => 'Aviso'
        ]);
    }
}
