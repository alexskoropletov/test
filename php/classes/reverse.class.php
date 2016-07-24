<?php

namespace Skoropletov;

class Reverse extends Parser
{

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $urlContent;

    /**
     * @var array
     */
    protected $accordance;

    /**
     * Parser constructor.
     * @param null $url
     */
    public function __construct($url = null)
    {
        if (trim($url)) {
            $this->setUrl($url);
        }
    }

    /**
     * Replace values with key, instead of replacing key with values
     * @throws \Exception
     */
    public function changeUrlContent() {
        $changed = false;
        foreach ($this->accordance as $key => $values) {
            $values = implode("", $values);
            if (strstr($key, $values) !== false) {
                throw new \Exception("Endless key-value replacement possible");
            }
            if (strstr($this->urlContent, $values) !== false) {
                $this->urlContent = str_replace($values, $key, $this->urlContent);
                $changed = true;
            }
        }
        if ($changed) {
            $this->changeUrlContent();
        }
    }
}