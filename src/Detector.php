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
        return preg_match("/^5[1-5][0-9]{5,}|222[1-9][0-9]{3,}|22[3-9][0-9]{4,}|2[3-6][0-9]{5,}|27[01][0-9]{4,}|2720[0-9]{3,}$/i", $card);
    }

    private function isAmex(string $card) : bool
    {
        return preg_match("/^3$|^3[47][0-9]{0,13}$/i", $card);
    }

    private function isDiscover(string $card) : bool
    {
        return preg_match("/^6$|^6[05]$|^601[1]?$|^65[0-9][0-9]?$|^6(?:011|5[0-9]{2})[0-9]{0,12}$/i", $card);
    }

    private function isJCB(string $card) : bool
    {
        return preg_match("/^(?:2131|1800|35[0-9]{3})[0-9]{3,}$/i", $card);
    }

    private function isDinersClub(string $card) : bool
    {
        return preg_match("/^3(?:0[0-5]|[68][0-9])[0-9]{4,}$/i", $card);
    }

    public function detect(string $card) : string
    {
        $cardTypes = [
            'Visa',
            'Amex',
            'MasterCard',
            'Discover',
            'JCB',
            'DinersClub'
        ];
        foreach ($cardTypes as $cardType) {
            $method = 'is' . $cardType;
            if ($this->$method($card)) {
                return $cardType;
            }
        }
        return 'Invalid Card';
    }
}
