<?php

namespace Farhanisty\Vetran\Facades\Route;

class URLComparatorImpl implements URLComparator
{
    private ?InputParameter $inputParameter = null;

    public function compare(SimpleUrl $currentUrl, SimpleUrl $attemptUrl): bool
    {
        $current = explode('/', $currentUrl->getUrl());

        $attempt = explode('/', $attemptUrl->getUrl());

        if (count($current) != count($attempt)) {
            return false;
        }

        $inputParameter = new InputParameter();

        for ($i = 0; $i < count($current); $i++) {
            if (str_starts_with($current[$i], ':')) {
                $key = substr($current[$i], 1);
                $inputParameter->set($key, $attempt[$i]);
                continue;
            }
            if ($current[$i] != $attempt[$i]) {
                return false;
            }
        }

        $this->inputParameter = $inputParameter;

        return true;
    }

    public function getInputParameter(): ?InputParameter
    {
        return $this->inputParameter;
    }
}
