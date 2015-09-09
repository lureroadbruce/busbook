<?php

use Illuminate\Database\Seeder;
use App\Models\EmailTemplet;

class EmailTempletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmailTemplet::create([
            'title' => '班车预订提醒',
            'type'  => 1,
            'body'  => '用户{{用户姓名}}，手机号码{{用户手机}}，预订班车{{预订日期}},站点{{预订站点}}。'
        ]);
}
}
