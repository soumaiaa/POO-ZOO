<?php
class  volière extends enclos
{
    private int $hauteur;


    public function getHauteur()
    {
        return $this->hauteur;
    }
    public function setHauteur($hauteur)
    {
        $this->hauteur = $hauteur;
    }



    public function carracte()
    {
        return [
            'nom' => $this->getNom(),
            'proprété' => $this->getPropreté(),
            'types' => $this->setTypes('volière'),
            'nombanimaux' => $this->getNombAnimaux(),
            'allAnimals' => $this->carAnimaux(),
            'hauteur' => $this->getHauteur()
        ];
    }
    public function entretenir()
    {
        if ($this->getNombAnimaux() === 0 && $this->getPropreté() === self::DIRTY && $this->hauteur < 15) { {
                return [
                    $this->setPropreté('bon'),
                    $this->setHauteur(20)
                ];
            }
        } else if ($this->getNombAnimaux() === 0 && $this->getPropreté() === self::CORRECT && $this->hauteur < 15) {
            return [
                $this->setPropreté('correct'),
                $this->setHauteur(20)
            ];
        }
    }
    public function addAnimal(animaux $animal)
    {
        if ($animal instanceof aigles) {
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
