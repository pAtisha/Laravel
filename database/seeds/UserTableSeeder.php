<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           [
               'name' => 'Nathan',
               'email' => str_random(12).'@email.com',
               'password' => bcrypt('sifra123'),
               'created_at' => new DateTime,
               'updated_at' => new DateTime
           ],
           [
               'name' => 'Toni',
               'email' => str_random(12).'@email.com',
               'password' => bcrypt('sifra12345'),
               'created_at' => new DateTime,
               'updated_at' => new DateTime
           ],
           [
               'name' => 'Milos',
               'email' => str_random(12).'@email.com',
               'password' => bcrypt('sifra12345'),
               'created_at' => new DateTime,
               'updated_at' => new DateTime
           ]
        ]);
    }
}
