<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Profile;
use App\Models\LoginLog;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $admin = User::create( [
            'name'      => 'bruce',
            'email'     => 'bruce@lureroad.com',
        ] );

    }
}
