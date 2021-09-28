<?php

namespace AppUnitTest;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Basic wrapper around symfony/dom-crawler
 * It's a simple way to assert if an HTML string contains various selectors.
 *
 * Usually, this wouldn't be needed since I'd go with integration test rather than unit test.
 */
abstract class AppTestCase extends TestCase
{
    protected function assertHtmlContainsSelector(string $rawHtml, string $selector): void {
        $crawler = new Crawler($rawHtml);
        $this->assertEquals(1, $crawler->filter($selector)->count());
    }
}
