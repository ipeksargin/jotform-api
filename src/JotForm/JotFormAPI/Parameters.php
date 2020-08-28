<?php

namespace JotForm\JotFormAPI;

class Parameters
{
    public function toArray()
    {
        return json_encode(get_object_vars($this));
    }
}
