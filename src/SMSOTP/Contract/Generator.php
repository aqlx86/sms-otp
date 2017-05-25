<?php

namespace SMSOTP\Contract;

interface Generator
{
    public function generate($length = 5) : string;
}
