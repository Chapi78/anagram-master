<?php

class anagram{

    public $mot;
    public $option;
    public $index;

    public function initialise($argv) {
        $mot = $argv[1];
        $limite = strlen($mot);
        if(isset($argv[2])) {
            $option = $argv[2];
            if($option <= 0 || $option > $limite) {
                echo 'Veuillez entrer un nombre correct';
                exit;
            }
        }
        $lettres = $this->word_init($mot);
    }

    public function word_init($mot) { 
        echo "word_init\n";
        $alphabet = [
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
        ];
        // boucle for
        foreach($alphabet as $cara) {
            $initiaLen = strlen($mot);
            $mot = trim($mot, $cara);
            $outLen = strlen($mot);
            if($initiaLen > $outLen) {
                $iterate = $initiaLen - $outLen;
                echo "lettre touver: ". $cara . "\n iteration: ". $iterate. "\n";
                $this->word_count($cara, $iterate);
            }
        }
        $len_last_word = strlen($mot);
        if($len_last_word != 0) {
            $mot = $mot . "yz";
            $this->word_init($mot); // trouver a 17h27
            $this->word_count("y", "-1");
            $this->word_count("z", "-1");
        }

        // if($outLen == 0) {

        // }
    }

    public function word_count($word, $iterate) {

    }

    public function compare() {
        $dico = fopen('../anagram-master-dictionnaire.txt', "r");
        while(!feof($dico)) {
            echo fgets($dico);
        }
        fclose($dico);
    }
}

$yolo = new anagram();
$yolo->initialise($argv);