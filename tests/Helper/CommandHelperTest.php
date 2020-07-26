<?php

namespace App\Tests\Helper;

use App\Helper\CommandHelper;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Filesystem;

class CommandHelperTest extends TestCase
{

    public function testGetNumberpart()
    {

        /** @var CommandHelper $helper */
        $helper = new CommandHelper();

        // we open the tests case
        $handle = fopen("tests/Helper/Files/getNumberPart.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $data = explode(';', $line);
                if (count($data) === 2) {
                    $result = $helper::getNumberpart($data[0]);
                    $this->assertEquals($result, floatval($data[1]));
                }
            }

            fclose($handle);
        }
    }
}
