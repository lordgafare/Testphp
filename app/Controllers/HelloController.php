<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HelloController extends BaseController
{
    public function index()
    {
        $data['display'] = $this->displayLoop();
        $data['pattern'] = $this->createPattern('');
        return view('hello', $data);
    }

    private function displayLoop()
    {
        $content = '';
        for ($row = 1; $row <= 10; $row++) {
            for ($star = 1; $star <= 11 - $row; $star++) {
                $content .= "*";
            }
            $numberToShow = 11 - $row;
            if ($star <= 10) {
                for ($num = 1; $num < $row; $num++) {
                    $content .= $numberToShow;
                }
            }
            $content .= "<br/>";
        }
        return $content;
    }
    public function generate()
    {
        $number = $this->request->getPost('number');
        $data['pattern'] = $this->createPattern($number);
        $data['display'] = $this->displayLoop();
        return view('hello', $data);
    }
    private function createPattern($number)
    {
        $pattern = '';
        $totalLength = 20;

        for ($i = $number; $i >= 1; $i--) {
            $numAsterisks = $i;
            $numZeros = $totalLength - ($numAsterisks * 2);
            $pattern .= str_repeat('*', $numAsterisks);
            $pattern .= str_repeat('0', $numZeros);
            $pattern .= str_repeat('*', $numAsterisks);
            $pattern .= "\n";
        }

        return $pattern;
    }
}
