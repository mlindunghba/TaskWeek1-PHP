<?php

//Nama: Mochamad Lindung Hasti Budi Aldany

$data = <<<'EOD'
X, -9\\\10\100\-5\\\0\\\\, A
Y, \\13\\1\, B
Z, \\\5\\\-3\\2\\\800, C
EOD;

$lines = explode("\n", $data); 
$output = array();

foreach ($lines as $l) 
{
    $p = array_map('trim', explode(',', $l)); 

    $indexFirstPart = $p[0];
    $indexSecondPart = preg_replace('/\\\\+/', ',', $p[1]);
    $indexThirdPart = $p[2];

    $val = explode(',', $indexSecondPart); 
    sort($val, 1); 

    $c = 1;
    foreach ($val as $v) 
    {
        if(is_numeric($v))
        {
            $output[] = $indexFirstPart . ', ' . $v . ', ' . $indexThirdPart . ', ' . $c;
            $c++;
        }
    }
}

usort($output, function ($x, $y) 
    {
        $xVal = intval(explode(',', $x)[1]);
        $yVal = intval(explode(',', $y)[1]);

        if ($xVal == $yVal) 
        {
            return 0;
        }

        return ($xVal < $yVal) ? -1 : 1;
    }
);

foreach ($output as $o) 
{
    echo $o . "<br>";
}

?>