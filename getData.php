<?php
$data = [
    'name' => 'name: leo',
    'mobile' => 'mobile: 091231232',
    'word' => 'word: try it~ 才有無限可能!',
];

function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

// dd($data);

$myJSON = json_encode($data);

echo $myJSON;