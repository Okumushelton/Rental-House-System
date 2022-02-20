<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(
            ['name' => 'admin', 'email' => 'admin@admin.com', 'password' => bcrypt('adiminpass'), 'issuper' => 1, 'created_at' => now()]
        );
    }
}
