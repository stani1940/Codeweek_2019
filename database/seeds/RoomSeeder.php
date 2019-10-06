<?php

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            [
                'hotel_id' => 1,
                'type' => 'апартамент',
                'description' => ' Хол и спалня,  Баня с вана 3, Бюро',
                'price' => 110.00,
                'image' => 'public/image/Hemus_Apartament_1.jpg'
            ],
            [
                'hotel_id' => 1,
                'type' => 'Двойна стая',
                'description' => 'Стая с 2 легла',
                'price' => 70.00,
                'image' => 'public/image/Hemus_Double_room_1.jpg'
            ],
            [
                'hotel_id' => 2,
                'type' => 'Двойна стая',
                'description' => 'Стая с 2 легла.',
                'price' => 50.00,
                'image' => 'public/image/Body_Double_room.jpg'
            ],
            [
                'hotel_id' => 2,
                'type' => 'Eдинична',
                'description' => 'Стая с едно легло.',
                'price' => 35.00,
                'image' => 'public/image/body_Single_room.jpg'
            ],
            [
                'hotel_id' => 3,
                'type' => 'Suite',
                'description' => 'One ultra wide king bed, full kitchen.',
                'price' => 399.00,
                'image' => 'https://placeimg.com/640/480/arch'
            ]
        ];

        foreach ($rooms as $room) {
            Room::create(array(
                'hotel_id' => $room['hotel_id'],
                'type' => $room['type'],
                'description' => $room['description'],
                'price' => $room['price'],
                'image' => $room['image']
            ));
        }
    }
}
