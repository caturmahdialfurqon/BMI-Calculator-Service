<!-- MIT License

Copyright (c) 2024 Furqonflynn

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE. -->
<?php

error_reporting(0);
system('clear');
$lb= "\033[1;36m"; $pt= "\033[0;37m"; $r = "\033[1;31m"; $gr = "\033[1;32m"; $y = "\033[1;33m";
//===================================START====================================//
function calculateBMI($weight, $height) {
    return $weight / (($height / 100) ** 2);
}

function banner() {
    echo "╭━━━╮╱╱╱╱╱╱╱╱╱╱╱╱╱╭━━━┳╮\n";
    echo "┃╭━━╯╱╱╱╱╱╱╱╱╱╱╱╱╱┃╭━━┫┃\n";
    echo "┃╰━━┳╮╭┳━┳━━┳━━┳━╮┃╰━━┫┃╭╮╱╭┳━╮╭━╮\n";
    echo "┃╭━━┫┃┃┃╭┫╭╮┃╭╮┃╭╮┫╭━━┫┃┃┃╱┃┃╭╮┫╭╮╮\n";
    echo "┃┃╱╱┃╰╯┃┃┃╰╯┃╰╯┃┃┃┃┃╱╱┃╰┫╰━╯┃┃┃┃┃┃┃\n";
    echo "╰╯╱╱╰━━┻╯╰━╮┣━━┻╯╰┻╯╱╱╰━┻━╮╭┻╯╰┻╯╰╯\n";
    echo "╱╱╱╱╱╱╱╱╱╱╱┃┃╱╱╱╱╱╱╱╱╱╱╱╭━╯┃[+]\033[32mBMI \033[0m\n";
    echo "╱╱╱╱╱╱╱╱╱╱╱╰╯╱╱╱╱╱╱╱╱╱╱╱╰━━╯[+] Calculator\n\n";
}

function getBMICategory($bmi, $gender) {
    if ($gender === 'male') {
        if ($bmi < 18.5) return 'Skinny';
        if ($bmi < 24.9) return 'Regular';
        if ($bmi < 29.9) return 'Overweight';
        return 'Obesity';
    } else {
        if ($bmi < 18.5) return 'Skinny';
        if ($bmi < 23.9) return 'Regular';
        if ($bmi < 28.9) return 'Overweight';
        return 'Obesity';
    }
}

function calculateIdealBodyWeight($height) {
    $minIdealWeight = 18.5 * (($height / 100) ** 2);
    $maxIdealWeight = 24.9 * (($height / 100) ** 2);
    return [$minIdealWeight, $maxIdealWeight];
}

banner();

echo "
$y ---------------------------------------
$r       [+] $lb MALE   = $y 1
$r       [+] $lb FEMALE = $y 2
$y ---------------------------------------\n";

$genderInput = readline("[+]\033[32mEnter Gender (male/female): \033[0m");
$age = readline("[+]\033[32mEnter Age: \033[0m");
$weight = readline("[+]\033[32mEnter Weight (kg): \033[0m");
$height = readline("[+]\033[32mEnter Height (cm): \033[0m");

$gender = strtolower($genderInput);
$bmi = calculateBMI($weight, $height);
$category = getBMICategory($bmi, $gender);
list($minIdealWeight, $maxIdealWeight) = calculateIdealBodyWeight($height);

echo "
$y ---------------------------------------
$gr            : BMI CALCULATOR :
$y ---------------------------------------
$y ---------------------------------------
$pt              YOUR DETAIL
$y ---------------------------------------
$r [+] $pt Gender $r : $lb $gender
$r [+] $pt Age    $r : $lb $age
$r [+] $pt Weight $r : $lb $weight
$r [+] $pt Height $r : $lb $height
$y ---------------------------------------
$pt  Category Score : $gr $category
$y --------------------------------------- 
$y ---------------------------------------
$gr               : RESULT :
$y ---------------------------------------
$r [+] $pt BMI Score        $r : $lb " . round($bmi, 2) . "
$r [+] $pt Label            $r : $lb $category
$r [+] $pt Ideal Weight MIN $r : $lb " . round($minIdealWeight, 2) . " kg
$r [+] $pt Ideal Weight MAX $r : $lb " . round($maxIdealWeight, 2) . " kg
$y ---------------------------------------
\n";

?>
//===================================END====================================//
