<?php

class VigenèreCipher
{

    /**
     * @var string
     */
    private $key;
    /**
     * @var string
     */
    private $alphabet;

    public function __construct(string $key, string $alphabet)
    {
        $this->key = str_split($key);
        $this->alphabet = str_split($alphabet);
    }

    public function decode(string $word): string
    {
        return $this->encode($word, true);
    }

    public function encode(string $code, bool $left = false): string
    {
        $decoded = [];
        foreach (str_split($code) as $key => $letter) {
            $decoded[] = $this->getEquivalenceRight($letter, $key, $left);
        }
        return implode("", $decoded);
    }

    public function getEquivalenceRight(string $letter, int $position, bool $left = false)
    {
        $alphaPosition = array_search($letter, $this->alphabet);
        if ($alphaPosition || $alphaPosition === 0) {
            $keyEquiv = $this->key[$position % count($this->key)];
            $r =
                $left ?
                    $alphaPosition - array_search($keyEquiv, $this->alphabet) :
                    (array_search($keyEquiv, $this->alphabet) + $alphaPosition) % count($this->alphabet);
            if ($r < 0) $r += count($this->alphabet);
            return $this->alphabet[$r];
        }
        return $letter;
    }
}

$c = new VigenèreCipher('password', 'abcdefghijklmnopqrstuvwxyz');

//$c->encode('laxxhsj'); // returns 'rovwsoiv'
echo $c->decode('laxxhsj');


/*
['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', ' k', ' l', ' m', ' n', ' o', ' p', ' q', ' r', ' s', ' t', ' u', ' v', ' w', ' x', ' y', ' z'];
['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25'];
*/
