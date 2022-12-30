<?php

declare(strict_types=1);

namespace App\Composite\Element;

class FieldComposite extends FormElement
{
    protected array $fields = [];

    public function add(FormElement $field): void
    {
        $name = $field->getName();
        $this->fields[$name] = $field;
    }

    public function remove(FormElement $component): void
    {
        $this->fields = array_filter($this->fields, static function ($child) use ($component) {
            return $child !== $component;
        });
    }

    public function getData(): array
    {
        $data = [];

        foreach ($this->fields as $name => $field) {
            $data[$name] = $field->getData();
        }

        return $data;
    }

    public function setData(mixed $data): void
    {
        foreach ($this->fields as $name => $field) {
            if (isset($data[$name])) {
                $field->setData($data[$name]);
            }
        }
    }

    public function render(): string
    {
        $output = "";

        foreach ($this->fields as $field) {
            $output .= $field->render();
        }

        return $output;
    }
}
