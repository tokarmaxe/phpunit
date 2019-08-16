<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;

    protected function setUp():void
    {
        $this->article = new App\Article;
    }

    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $this->assertSame($this->article->getSlug(), "");
    }

//    public function testSlugHasSpacesReplacedByUnderscores()
//    {
//        $this->article->title = "An example article";
//
//        $this->assertEquals($this->article->getSlug(), "An_example_article");
//    }
//
//    public function testSlugHasWhitespaceRaplaceBySingleUnderscore()
//    {
//        $this->article->title = "An    example  \n   article";
//
//        $this->assertEquals($this->article->getSlug(), "An_example_article");
//    }
//
//    public function testSlugDoesNotStartOrEndWithAnUnderscore()
//    {
//        $this->article->title = " An example article ";
//
//        $this->assertEquals($this->article->getSlug(), "An_example_article");
//    }
//
//    public function testSlugDoesNotHaveAnyNonWordCharacters()
//    {
//        $this->article->title = "Read! This! Now!";
//
//        $this->assertEquals($this->article->getSlug(), "Read_This_Now");
//    }

    public function titleProvider()
    {
        return [
            ["An example article", "An_example_article"],
            ["An    example  \n   article", "An_example_article"],
            ["Read! This! Now!", "Read_This_Now"],
            [" An example article ", "An_example_article"]
        ];
    }

    /**
     * @param $title
     * @param $slug
     * @dataProvider titleProvider
     */
    public function testSlug($title, $slug)
    {
        $this->article->title = $title;

        $this->assertEquals($this->article->getSlug(), $slug);
    }
}