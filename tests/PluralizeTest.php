<?php

namespace Aptoma\Twig\Extension;

use Tomodomo\Twig\Pluralize;
use PHPUnit\Framework\TestCase;

class PluralizeTest extends TestCase
{
    /**
     * @dataProvider getPluralizeDataProvider
     */
    public function testPluralize($template, $expected)
    {
        $this->assertEquals($expected, $this->getTemplate($template)->render());
    }

    public function testPluralizeWithNonInteger()
    {
        $this->expectException(\Exception::class);

        $template = "{{ pluralize('string', 'one', 'multiple') }}";

        $this->getTemplate($template)->render();
    }

    public function getPluralizeDataProvider()
    {
        return [
            ["1 {{ pluralize(1, 'post', 'posts', 'posts') }}", '1 post'],
            ["0 {{ pluralize(0, 'one', 'multiple', 'zero') }}", '0 zero'],
            ["0 {{ pluralize(0, 'one', 'multiple') }}", '0 multiple'],
            ["22 {{ pluralize(22, 'horse', 'horses') }}", '22 horses'],
        ];
    }

    protected function getTemplate($template)
    {
        $loader = new \Twig\Loader\ArrayLoader(['index' => $template]);
        $twig = new \Twig\Environment($loader, ['debug' => true, 'cache' => false]);
        $twig->addExtension(new Pluralize());

        return $twig->load('index');
    }
}
