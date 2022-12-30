<?php

declare(strict_types=1);

namespace App\Decorator\Formatter;

class DangerousHTMLTagsFormat extends TextFormat
{
    private array $dangerousTagPatterns = ['|<script.*?>([\s\S]*)?</script>|i'];

    private array $dangerousAttributes = [
        'onclick',
        'onkeypress',
    ];


    public function formatText(string $text): string
    {
        $text = parent::formatText($text);

        foreach ($this->dangerousTagPatterns as $pattern) {
            $text = preg_replace($pattern, '', $text);
        }

        foreach ($this->dangerousAttributes as $attribute) {
            $text = (string)preg_replace_callback('|<(.*?)>|', static function ($matches) use ($attribute) {
                $result = preg_replace("|$attribute=|i", '', $matches[1]);

                return '<'.$result.'>';
            }, $text);
        }

        return $text;
    }
}
