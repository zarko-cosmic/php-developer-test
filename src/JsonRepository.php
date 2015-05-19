<?php

namespace LittleThings;

interface JsonRepository
{
    /**
     * Reads Json file and returns array
     *
     * @return array
     **/
    public function readJson();

    /**
     * Writes data back to Json file
     *
     * @param array $data
     * @return void
     **/
    public function writeJson(array $data);
}