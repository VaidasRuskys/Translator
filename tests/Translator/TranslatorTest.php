<?php

namespace VaidasRuskys\DatabaseTranslator\Tests\Translator;

use PHPUnit\Framework\TestCase;
use VaidasRuskys\DatabaseTranslator\Translation\Repository\RepositoryInterface;
use VaidasRuskys\DatabaseTranslator\Translation\Translator;

class TranslatorTest extends TestCase
{
    /** @var Translator */
    private $translator;

    /** @var RepositoryInterface|\PHPUnit\Framework\MockObject\MockObject */
    private $translationRepository;

    public function getTestTransData()
    {
        $data = [];

        // #0
        $data[] = [
            'transParams' => [
                'id' => 'debug.id',
                'parameters' => [],
                'domain' => null,
                'locale' => null,
            ],
            'repoParams' => [
                'id' => 'debug.id',
                'domain' => 'default',
                'locale' => 'en_US',
                'returnValue' => 'debug.value',
            ],
            'expected' => 'debug.value',
        ];

        return $data;
    }

    /**
     * @covers VaidasRuskys\DatabaseTranslator\Translation\Translator
     * @dataProvider getTestTransData
     * @param $transParams
     * @param $repoParams
     * @param $expected
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function testTrans($transParams, $repoParams, $expected)
    {
        $this->translationRepository
            ->expects(self::once())
            ->method('get')
            ->with($repoParams['id'], $repoParams['domain'], $repoParams['locale'])
            ->willReturn($repoParams['returnValue']);

        $this->assertEquals(
            $expected,
            $this->translator->trans(
                $transParams['id'], $transParams['parameters'], $transParams['domain'], $transParams['locale']
            )
        );
    }

    public function setUp(): void
    {
        $this->translationRepository = $this->createMock(RepositoryInterface::class);

        $this->translator = new Translator($this->translationRepository);
    }
}
