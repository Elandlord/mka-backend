<?php

namespace App\Models;

class Model
{
    public function getVars () {
        return call_user_func('get_object_vars', $this);
    }
}