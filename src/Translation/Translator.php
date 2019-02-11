<?php

namespace VaidasRuskys\DatabaseTranslator\Translation;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Psr\SimpleCache\CacheInterface;
use Symfony\Component\Cache\Simple\NullCache;
use Symfony\Component\Translation\TranslatorInterface;
use VaidasRuskys\DatabaseTranslator\Translation\Repository\RepositoryInterface;

class Translator implements TranslatorInterface
{
    /** @var RepositoryInterface */
    private $translationRepository;

    /** @var LoggerInterface */
    private $logger;

    /** @var CacheInterface */
    private $cache;

    /**
     * Translator constructor.
     * @param RepositoryInterface $translationRepository
     */
    public function __construct(RepositoryInterface $translationRepository)
    {
        $this->translationRepository = $translationRepository;
        $this->logger = new NullLogger();
        $this->cache = new NullCache();
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @param CacheInterface $cache
     */
    public function setCache(CacheInterface $cache): void
    {
        $this->cache = $cache;
    }

    /**
     * @param string $id
     * @param array $parameters
     * @param null $domain
     * @param null $locale
     * @return mixed|string|null
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function trans($id, array $parameters = array(), $domain = null, $locale = null)
    {
        $locale = $locale ?? 'en_US';
        $domain = $domain ?? 'default';

        if ($this->cache->has($this->getCacheKey($id, $domain, $locale))) {
           return  $this->cache->get($this->getCacheKey($id, $domain, $locale));
        }

        $translation =  $this->translationRepository->get($id, $domain, $locale);

        if (null == $translation) {
            $this->logger->error('Translation not found', [$id, $parameters, $domain, $locale]);
        }

        return $translation;
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

    /**
     * @param string $id
     * @param string $domain
     * @param string $locale
     * @return string
     */
    private function getCacheKey(string $id, string $domain, string $locale): string
    {
        return sprintf('%s_%s_%s', $id, $domain, $locale);
    }
}