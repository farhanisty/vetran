<?php

namespace Farhanisty\Vetran\Facades\Route;

interface URLComparator
{
    public function compare(SimpleUrl $firstUrl, SimpleUrl $secondUrl): bool;
    public function getInputParameter(): ?InputParameter;
}
