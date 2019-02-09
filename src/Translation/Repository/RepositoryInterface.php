<?php

namespace VaidasRuskys\DatabaseTranslator\Translation\Repository;

interface RepositoryInterface
{
    public function get(string $id, string $domain, string $locale);
}