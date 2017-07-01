<?php
namespace CardDetect;

class Detector
{
    public function isVisa(string $card)
    {
        return preg_match("/^4[0-9]{0,15}$/i", $card);
    }

    public function detect(string $card) : string
    {
        $cardTypes = [
            'Visa'
        ];
        foreach ($cardTypes as $cardType) {
            $method = 'is' . $cardType;
            if ($this->$method($card)) {
                return $cardType;
            }
        }
    }
}
