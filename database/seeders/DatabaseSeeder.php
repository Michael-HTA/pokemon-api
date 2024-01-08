<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\Set;
use App\Models\Rarity;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $types =[
            "Colorless",
            "Darkness",
            "Dragon",
            "Fairy",
            "Fighting",
            "Fire",
            "Grass",
            "Lightning",
            "Metal",
            "Psychic",
            "Water",];
        
        $raritys = [
            "Amazing Rare",
            "Common",
            "LEGEND",
            "Promo",
            "Rare",
            "Rare ACE",
            "Rare BREAK",
            "Rare Holo",
            "Rare Holo EX",
            "Rare Holo GX",
            "Rare Holo LV.X",
            "Rare Holo Star",
            "Rare Holo V",
            "Rare Holo VMAX",
            "Rare Prime",
            "Rare Prism Star",
            "Rare Rainbow",
            "Rare Secret",
            "Rare Shining",
            "Rare Shiny",
            "Rare Shiny GX",
            "Rare Ultra",
            "Uncommon"
        ];

        $sets = [
            'sword', 
            'sheild', 
            'base',
        ];


        foreach($types as $type){
            Type::factory()->create([
                "name" => $type,
            ]);
        };

        foreach($raritys as $rarity){
            Rarity::factory()->create([
                'name' => $rarity,
            ]);
        };

        foreach($sets as $set){
            Set::factory()->create([
                'name' => $set,
            ]);
        };
    }
}
