<?php
class terrestre extends enclos
{
    public function carracte()
    {
        return [
            'nom' => $this->getNom(),
            'proprété' => $this->getPropreté(),
            'types' => $this->setTypes('terrestre'),
            'nombanimaux' => $this->getNombAnimaux(),
            'allAnimals' => $this->carAnimaux()
        ];
    }
    public function entretenir()
    {
        if ($this->getNombAnimaux() === 0 && $this->getPropreté() === self::DIRTY) {
            return $this->setPropreté('bon');
        }
    }
    public function addAnimal(animaux $animal)
    {
        if ($animal instanceof tigres || $animal instanceof ours) {
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
