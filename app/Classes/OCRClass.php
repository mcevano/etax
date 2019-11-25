<?php 
namespace App\Classes;

use Alimranahmed\LaraOCR\Facades\OCR;
use PHPUnit\Framework\TestCase;

class OCRClass extends TestCase
{
    public function testOcr($img)
    {
        $imagePath = __DIR__."../resources/images/text.png";
        $text = OCR::scan($imagePath);
        return $imagePath;
    }
}

?>