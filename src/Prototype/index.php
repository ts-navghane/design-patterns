<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

use App\Prototype\Author;
use App\Prototype\Page;

$author = new Author("John Doe");
$page = new Page("Test Title", "Test Body", $author);
$page->setComment('Good book!');
$page->setComment('Nice book!');

$page->setAuthor($author);

$draftPage = clone $page;
echo "Dump of the clone. Note that the author is now referencing two objects.\n\n";
print_r($draftPage);
