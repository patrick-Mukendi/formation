<?php
require_once 'Interface/Render.php';

class Form implements Render 
{
    private $attributs;
    private $content;

    public function __construct ($attributs = [] )
    {
        $this->attributs= $attributs;
        
    }

    public function addElement($element)
    {
        $elements = $element;
        $this->content[] =  $elements->render();
    }

    private function contents()
    {
        $attribut = '';

        foreach($this->attributs as $key => $values)
        {
            $attribut .= sprintf('%s="%s"',  $key, $values);
        }
        return $attribut;
    }

    public function render()
    {
        $element = '<form' . $this->contents().'>';

        foreach ($this->content as $values )
        {
            $element .= $values;
        }
        $element .= '</form>';

        return $element;
    }
}