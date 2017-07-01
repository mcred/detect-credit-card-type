<?php
namespace CardDetect;

class Detector
{
    private function isVisa(string $card) : bool
    {
        return preg_match("/^4[0-9]{0,15}$/i", $card);
    }

    private function isMasterCard(string $card) :  bool
    {
        return preg_match("/^5$|^5[1-5][0-9]{0,14}$/i", $card);
    }

    public function detect(string $card) : string
    {
        $cardTypes = [
            'Visa',
            'MasterCard'
        ];
        foreach ($cardTypes as $cardType) {
            $method = 'is' . $cardType;
            if ($this->$method($card)) {
                return $cardType;
            }
        }
    }
}
