<?php

declare(strict_types=1);

namespace App\AbstractFactory\PhpTemplate;

use App\AbstractFactory\Interfaces\TemplateRendererInterface;

class PhpTemplateRenderer implements TemplateRendererInterface
{
    public function render(string $templateContent, array $arguments = []): string
    {
        extract($arguments, EXTR_OVERWRITE);

        ob_start();
        eval(' ?>' . $templateContent . '<?php ');

        return ob_get_clean();
    }
}
