<?php

namespace JotForm\JotFormAPI;

class PropertyDetails
{
    private $thankUrl;
    private $activeRedirect;
    private $formWidth;
    private $labelWidth;
    private $styles;

    /**
     * PropertyDetails constructor.
     * @param $thankUrl
     * @param $activeRedirect
     * @param $formWidth
     * @param $labelWidth
     * @param $styles
     */
    public function __construct(
        string $thankUrl,
        string $activeRedirect,
        string $formWidth,
        string $labelWidth,
        string $styles
    ) {
        $this->thankUrl = $thankUrl;
        $this->activeRedirect = $activeRedirect;
        $this->formWidth = $formWidth;
        $this->labelWidth = $labelWidth;
        $this->styles = $styles;
    }

    public function toArray()
    {
        return $params = array("thankUrl" => $this->thankUrl, "activeRedirect"=>"thankurl",
            "formWidth" =>$this->formWidth, "labelWidth" => $this->labelWidth, "styles" =>$this->styles);
    }
}
