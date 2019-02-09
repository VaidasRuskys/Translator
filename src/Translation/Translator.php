<?php

namespace VaidasRuskys\DatabaseTranslator\Translation;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Symfony\Component\Translation\TranslatorInterface;
use VaidasRuskys\DatabaseTranslator\Translation\Repository\RepositoryInterface;

class Translator implements TranslatorInterface
{
    /** @var RepositoryInterface */
    private $translationRepository;

    /** @var LoggerInterface */
    private $logger;

    /**
     * Translator constructor.
     * @param RepositoryInterface $translationRepository
     */
    public function __construct(RepositoryInterface $translationRepository)
    {
        $this->translationRepository = $translationRepository;
        $this->logger = new NullLogger();
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    public function trans($id, array $parameters = array(), $domain = null, $locale = null)
    {
        $locale = $locale ?? 'en_US';

        return $this->translationRepository->get($id, $domain ?? 'default', $locale);
    }

    public function transChoice($id, $number, array $parameters = array(), $domain = null, $locale = null)
    {
        // TODO: Implement transChoice() method.
    }

    public function setLocale($locale)
    {
        // TODO: Implement setLocale() method.
    }

    public function getLocale()
    {
        // TODO: Implement getLocale() method.
    }
}