<?php

namespace AvalancheDevelopment\Approach\Builder;

interface BuilderInterface
{

    public function __invoke(array $data);
}
