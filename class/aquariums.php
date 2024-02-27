<?php
class aquariums extends enclos
{
    private int $salinité;

    public function getSalinité()
    {
        return $this->salinité;
    }
    public function setSalinité($salinité)
    {
        $this->salinité = $salinité;
    }

    public function carracte()
    {
        return [
            'nom' => $this->getNom(),
            'proprété' => $this->getPropreté(),
            'types' => $this->setTypes('aquariums'),
            'nombanimaux' => $this->getNombAnimaux(),
            'allAnimals' => $this->carAnimaux(),
            'salinité' => $this->getSalinité()
        ];
    }
    public function entretenir()
    {
        if ($this->getNombAnimaux() === 0 && $this->getPropreté() === self::DIRTY && $this->getSalinité() < 70) {
            return [
                $this->setPropreté('bon'),
                $this->SetSalinité('0')
            ];
        }
    }
    public function addAnimal(animaux $animal)
    {
        if ($animal instanceof poissons) {
            if ($this->nombAnimaux < 6) {
                $this->allAnimals[] = $animal;
                $this->nombAnimaux++;
                return true;
            } else {
                echo "il y a un nombre max d animaux";
                return false;
            }
        }else{
           
            echo "Cette animal ne peut pas rentrer dans cet enclos";
        }

             
    }
   
}
