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
            'MasterCard1' => '2221000000000009',
            'MasterCard2' => '2223000048400011',
            'MasterCard3' => '2223016768738313',
            'MasterCard4' => '5105510551055105',
            'Discover' => '6011111111111117',
            'Amex' => '378282246310005',
            'Amex1' => '371449635398431',
            'AmexCorp' => '378734493671000',
            'JCB' => '3530111333300000',
            'JCB1' => '3566002020360505',
            'Diners' => '30569309025904',
            'Diners1' => '38520000023237',
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
        $this->assertEquals('MasterCard', $this->Detector->detect($this->cards['MasterCard1']));
        $this->assertEquals('MasterCard', $this->Detector->detect($this->cards['MasterCard2']));
        $this->assertEquals('MasterCard', $this->Detector->detect($this->cards['MasterCard3']));
        $this->assertEquals('MasterCard', $this->Detector->detect($this->cards['MasterCard4']));
    }

    public function testIsDiscover()
    {
        $this->assertEquals('Discover', $this->Detector->detect($this->cards['Discover']));
    }

    public function testIsAmex()
    {
        $this->assertEquals('Amex', $this->Detector->detect($this->cards['Amex']));
        $this->assertEquals('Amex', $this->Detector->detect($this->cards['Amex1']));
        $this->assertEquals('Amex', $this->Detector->detect($this->cards['AmexCorp']));
    }

    public function testIsInvalid()
    {
        $this->assertEquals('Invalid Card', $this->Detector->detect($this->cards['Invalid']));
    }

    public function testIsJCB()
    {
        $this->assertEquals('JCB', $this->Detector->detect($this->cards['JCB']));
        $this->assertEquals('JCB', $this->Detector->detect($this->cards['JCB1']));
    }

    public function testIsDiners()
    {
        $this->assertEquals('DinersClub', $this->Detector->detect($this->cards['Diners']));
        $this->assertEquals('DinersClub', $this->Detector->detect($this->cards['Diners1']));
    }
}
