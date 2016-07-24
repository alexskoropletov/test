<?php
namespace Skoropletov;

use Skoropletov\Reverse;

class Parser
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
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @throws \Exception
     */
    public function parseUrlContent()
    {
        if (!trim($this->url)) {
            throw new \Exception('Empty URL');
        }

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            $this->urlContent = curl_exec($ch);
            curl_close($ch);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param array $accordance
     * @throws \Exception
     */
    public function setAccordanceArray($accordance = []) {
        if (is_array($accordance)) {
            foreach ($accordance as $key => $values) {
                if (is_array($values)) {
                    foreach ($values as $value) {
                        $this->setAccordance($key, $value);
                    }
                } else {
                    $this->setAccordance($key, $values);
                }
            }
        } else {
            throw new \Exception('Array expected as parameter');
        }
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function setAccordance($key, $value) {
        if (!is_array($value)) {
            if (!isset($this->accordance[$key])) {
                $this->accordance[$key] = [$value];
            } else {
                $this->accordance[$key][] = $value;
            }
        } else {
            foreach ($value as $subValue) {
                $this->setAccordance($key, $subValue);
            }
        }
    }

    /**
     * @throws \Exception
     */
    public function changeUrlContent() {
        $changed = false;
        foreach ($this->accordance as $key => $values) {
            $values = implode("", $values);
            if (strstr($values, $key) !== false) {
                throw new \Exception("Endless key-value re1placement possible");
            }
            if (strstr($this->urlContent, $key) !== false) {
                $this->urlContent = str_replace($key, $values, $this->urlContent);
                $changed = true;
            }
        }
        if ($changed) {
            $this->changeUrlContent();
        }
    }

    /**
     * Display content
     */
    public function showUrlContent() {
        echo $this->urlContent;
    }

    /**
     * @return string
     */
    public function getUrlContent() {
        return $this->urlContent;
    }

    /**
     * @param string $content
     */
    public function setUrlContent($content) {
        $this->urlContent = $content;
    }

    public function reverse() {
        $reverse = new Reverse;
        $reverse->setAccordanceArray($this->accordance);
        $reverse->setUrlContent($this->getUrlContent());
        $reverse->changeUrlContent();
        $this->setUrlContent($reverse->getUrlContent());
    }
}