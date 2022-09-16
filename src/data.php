<?php

namespace src\data;
use Faker\Factory as Faker;

class data{
    protected $faker;

    public function __construct()
    {
        $faker = Faker::create();
        $this->faker=$faker;
        return $this->faker;
    }

    public function fakeData()
    {
        echo $this->faker->name();
        echo "\n";
        echo $this->faker->address();
        echo "\n";
        echo $this->faker->phoneNumber();
        echo "\n";
        echo $this->faker->email();
        echo "\n";
        echo $this->faker->text();
        echo "\n";
    }

    public function modifiersUnique()
    {
        //unique
        $values = [];
        try {
            for ($i = 0; $i < 2; $i++) {
                // get a random digit, but always a new one, to avoid duplicates
                $values []= $this->faker->unique()->randomDigit();
            }
            print_r($values);
        }
        catch (\Exception $exception){
            echo 'Error'."\n";
        }
    }

    public function modifiersOptional()
    {
        //optional
        $values=[];
        for ($i = 0; $i < 10; $i++) {
            // get a random digit, but also null sometimes
            $values []= $this->faker->optional()->randomDigit();
        }
        print_r($values);
    }

    public function modifiersValid()
    {
        //valid
        $values=[];
        $evenValidator = function($digit) {
            return $digit % 2 === 0;
        };
        for ($i = 0; $i < 5; $i++) {
            $values []= $this->faker->valid($evenValidator)->randomDigit();
        }
        print_r($values);
    }

    public function localization()
    {
        $faker = Faker::create('vi_VN');
        for ($i = 0; $i < 3; $i++) {
            echo $faker->name(), "\n";
            echo $faker->address()."\n";
        }
    }

    public function seeding()
    {
        $faker= $this->faker;
        $faker->seed(5);
        echo $faker->name();
    }
}

