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

    private function isAmex(string $card) : bool
    {
        return preg_match("/^3$|^3[47][0-9]{0,13}$/i", $card);
    }

    private function isDiscover(string $card) : bool
    {
        return preg_match("/^6$|^6[05]$|^601[1]?$|^65[0-9][0-9]?$|^6(?:011|5[0-9]{2})[0-9]{0,12}$/i", $card);
    }

    public function detect(string $card) : string
    {
        $cardTypes = [
            'Visa',
            'MasterCard',
            'Amex',
            'Discover'
        ];
        foreach ($cardTypes as $cardType) {
            $method = 'is' . $cardType;
            if ($this->$method($card)) {
                return $cardType;
            }
        }
    }
}
