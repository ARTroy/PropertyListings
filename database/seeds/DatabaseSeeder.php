<?php

use Illuminate\Database\Seeder;
use App\Models\PropertyType;
use App\Models\RoomType;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {       
        try {
            $prop = ['R'=>[],'C'=>[]];
            $rooms = [];
            $rooms2 = [];
            DB::beginTransaction();

            array_push($prop['R'], PropertyType::create(['type_name' => 'House', 'display_class' => 'icon-house', 'use'=>'Residential']));
            array_push($prop['R'], PropertyType::create(['type_name' => 'Apartment', 'display_class' => 'icon-apartment', 'use'=>'Residential']));
            array_push($prop['R'], PropertyType::create(['type_name' => 'Plot', 'display_class' => 'icon-plot', 'use'=>'Residential']));
            array_push($prop['C'], PropertyType::create(['type_name' => 'Office', 'display_class' => 'icon-office', 'use'=>'Commercial']));
            array_push($prop['C'], PropertyType::create(['type_name' => 'Shop', 'display_class' => 'icon-shop', 'use'=>'Commercial']));
            array_push($prop['C'], PropertyType::create(['type_name' => 'Industrial', 'display_class' => 'icon-factory', 'use'=>'Commercial']));
            array_push($prop['C'], PropertyType::create(['type_name' => 'Storage', 'display_class' => 'icon-warehouse', 'use'=>'Commercial']));
            array_push($prop['C'], PropertyType::create(['type_name' => 'Agriculture', 'display_class' => 'icon-land', 'use'=>'Commercial']));
            array_push($prop['C'], PropertyType::create(['type_name' => 'Plot', 'display_class' => 'icon-plot', 'use'=>'Commercial']));
            //['type_name' => 'Cottage', 'display_class' => 'icon-bungalow', 'use'=>'residential'],

            array_push($rooms2, RoomType::create(['type_name' => 'Bedroom', 'display_class' => 'icon-bed']));
            array_push($rooms, RoomType::create(['type_name' => 'Lounge', 'display_class' => 'icon-lounge']));
            array_push($rooms2, RoomType::create(['type_name' => 'Bathroom', 'display_class' => 'icon-bathroom']));
            array_push($rooms, RoomType::create(['type_name' => 'Kitchen', 'display_class' => 'icon-kitchen']));
            array_push($rooms2, RoomType::create(['type_name' => 'Dining Room', 'display_class' => 'icon-dining']));
            array_push($rooms, RoomType::create(['type_name' => 'Hall', 'display_class' => 'icon-hall']));
            array_push($rooms, RoomType::create(['type_name' => 'Lift', 'display_class' => 'icon-lift']));
            array_push($rooms, RoomType::create(['type_name' => 'Storage', 'display_class' => 'icon-storage']));
            array_push($rooms, RoomType::create(['type_name' => 'Covered Parking', 'display_class' => 'icon-garage']));
            array_push($rooms, RoomType::create(['type_name' => 'Parking', 'display_class' => 'icon-car']));
            array_push($rooms, RoomType::create(['type_name' => 'Office', 'display_class' => 'icon-office-room']));
            array_push($rooms, RoomType::create(['type_name' => 'Toilet', 'display_class' => 'icon-toilet']));
            array_push($rooms, RoomType::create(['type_name' => 'Workshop', 'display_class' => 'icon-workshop']));
            array_push($rooms2, RoomType::create(['type_name' => 'Garden', 'display_class' => 'icon-garden']));
            array_push($rooms2, RoomType::create(['type_name' => 'Utilities', 'display_class' => 'icon-utility']));
            array_push($rooms2, RoomType::create(['type_name' => 'Pool', 'display_class' => 'icon-pool']));
            array_push($rooms2, RoomType::create(['type_name' => 'Games room', 'display_class' => 'icon-games']));
            array_push($rooms, RoomType::create(['type_name' => 'Out door Area', 'display_class' => 'icon-land']));
            array_push($rooms, RoomType::create(['type_name' => 'Room', 'display_class' => 'icon-room']));
            
            foreach ($rooms as $room) {
                foreach ($prop['R'] as $pro) {
                    $pro->validRoomTypes()->attach($room);
                }
                foreach ($prop['C'] as $pro) {
                    $pro->validRoomTypes()->attach($room);
                }
            }
            foreach ($rooms2 as $room) {
                foreach ($prop['R'] as $pro) {
                    $pro->validRoomTypes()->attach($room);
                }
            }
            
            //['type_name' => 'Basment', 'display_class' => 'basment'],
            //['type_name' => 'Central Heating', 'display_class' => 'heater'],
            //['type_name' => 'Air Conditioning', 'display_class' => 'air-con'],
            // $this->call(UsersTableSeeder::class);

            // For testing only, remove before deployment.
            DB::table('users')->insert([
                'name' => 'BasicAdmin',
                'email' => 'blackhole@example.com',
                'password' => bcrypt('wd99GaULqVACKbORMA5d8vME9m51JioV7DGjUaYfGYnwUVFTc8'),
                'admin' => 1,
                'created_at' => '2016-07-09 22:32:55',
                'updated_at' => '2016-07-09 22:32:55',
            ]);
        
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
        
        DB::commit();
        return;
    } 
}
