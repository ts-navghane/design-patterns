<?php

declare(strict_types=1);

namespace App\Composite\Element;

class Fieldset extends FieldComposite
{
    public function render(): string
    {
        $output = parent::render();

        return "<fieldset><legend>{$this->title}</legend>\n$output</fieldset>\n";
    }
}
