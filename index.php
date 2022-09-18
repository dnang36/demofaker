<?php

require 'vendor/autoload.php';
use src\data\data;

$data = new data();

for ($i=0;$i<4;$i++) {
    $data->fakeData();
}


//$data->modifiersUnique();
//$data->modifiersOptional();
//$data->modifiersValid();

$data->localization();

//$data->seeding();