<?php

declare(strict_types=1);

namespace App\Composite;

use App\Composite\Element\Fieldset;
use App\Composite\Element\Form;
use App\Composite\Element\FormElement;
use App\Composite\Element\Input;

class Run
{
    public function getProductForm(): FormElement
    {
        $form = new Form('product', 'Add product', '/product/add');
        $form->add(new Input('name', 'Name', 'text'));
        $form->add(new Input('description', 'Description', 'text'));

        $picture = new Fieldset('photo', 'Product photo');
        $picture->add(new Input('caption', 'Caption', 'text'));
        $picture->add(new Input('image', 'Image', 'file'));
        $form->add($picture);

        return $form;
    }

    public function loadProductData(FormElement $form): void
    {
        $data = [
            'name'        => 'Apple MacBook',
            'description' => 'A decent laptop.',
            'photo'       => [
                'caption' => 'Front photo.',
                'image'   => 'photo1.png',
            ],
        ];

        $form->setData($data);
    }

    public function renderProduct(FormElement $form): void
    {
        echo $form->render();
    }
}
