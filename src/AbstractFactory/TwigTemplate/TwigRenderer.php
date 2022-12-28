<?php

declare(strict_types=1);

namespace App\AbstractFactory\TwigTemplate;

use App\AbstractFactory\Interfaces\TemplateRendererInterface;

class TwigRenderer implements TemplateRendererInterface
{
    public function render(string $templateContent, array $arguments = []): string
    {
        extract($arguments, EXTR_OVERWRITE);

        $templateContent = $this->replaceBetween($templateContent, '{{ ', ' }}', $title);

        return $this->replaceBetween($templateContent, '{{ ', ' }}', $content);
    }

    private function replaceBetween(
        string $haystack,
        string $needleStart,
        string $needleEnd,
        string $replacement
    ): string {
        $startPos = strpos($haystack, $needleStart);
        $endPos   = strpos($haystack, $needleEnd);

        $firstPart = substr($haystack, 0, $startPos);
        $lastPart  = substr($haystack, $endPos + 3);

        return $firstPart.$replacement.$lastPart;
    }
}
