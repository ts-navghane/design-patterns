<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

use App\Decorator\Formatter\DangerousHTMLTagsFormat;
use App\Decorator\Formatter\MarkdownFormat;
use App\Decorator\Formatter\PlainTextFormat;
use App\Decorator\Input\TextInput;
use App\Decorator\Run;

$dangerousComment = <<<HERE
Hello! Nice blog post!
Please visit my <a href='https://www.iwillhackyou.com'>homepage</a>.
<script src="http://www.iwillhackyou.com/script.js">performXSSAttack();</script>
HERE;

$run       = new Run($dangerousComment);
$textInput = new TextInput();
echo "Website renders comments without filtering (unsafe):\n";
$run->display($textInput);

$plainTextFormat = new PlainTextFormat($textInput);
echo "Website renders comments after stripping all tags (safe):\n";
$run->display($plainTextFormat);

$dangerousForumPost = <<<HERE
# Welcome

This is my first post on this **gorgeous** forum.

<script src="https://www.iwillhackyou.com/script.js">performXSSAttack();</script>
HERE;
$run                = new Run($dangerousForumPost);
$textInput          = new TextInput();
echo "Website renders a forum post without filtering and formatting (unsafe, ugly):\n";
$run->display($textInput);

$text          = new TextInput();
$markdownFormat      = new MarkdownFormat($text);
$dangerousHTMLTagsFormat = new DangerousHTMLTagsFormat($markdownFormat);
echo "Website renders a forum post after translating markdown markup"
    ." and filtering some dangerous HTML tags and attributes (safe, pretty):\n";
$run->display($dangerousHTMLTagsFormat);

