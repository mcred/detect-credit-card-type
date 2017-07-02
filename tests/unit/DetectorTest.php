<?php
namespace CardDetect;

/**
* @covers CardDetect\Detector
*/
class DetectorTest extends \PHPUnit\Framework\TestCase
{
    private $Detector;
    private $cards;

    public function setup()
    {
        $this->Detector = new Detector();
        $this->cards = [
            'Visa' => '4111111111111111',
            'MasterCard' => '5555555555554444',
            'Discover' => '6011111111111117',
            'Amex' => '378282246310005',
            'Invalid' => '7877787778777877'
        ];
    }

    public function testCanInstantiateAssembler()
    {
        $this->assertInstanceOf(Detector::class, $this->Detector);
    }

    public function testIsMasterCard()
    {
        $this->assertEquals('MasterCard', $this->Detector->detect($this->cards['MasterCard']));
    }

    public function testIsDiscover()
    {
        $this->assertEquals('Discover', $this->Detector->detect($this->cards['Discover']));
    }

    public function testIsAmex()
    {
        $this->assertEquals('Amex', $this->Detector->detect($this->cards['Amex']));
    }

    public function testIsInvalid()
    {
        $this->assertEquals('Invalid Card', $this->Detector->detect($this->cards['Invalid']));
    }
}
