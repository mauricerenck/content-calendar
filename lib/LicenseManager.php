<?php

namespace mauricerenck\ContentCalendar;

use Kirby\Http\Remote;

class LicenseManager
{
    private string $licenseKey;
    private int $digistoreProductId;

    public function __construct(private string $instanceId)
    {
        $this->licenseKey = option("mauricerenck.content-calendar.licenseKey", null);
        $this->digistoreProductId = 733924;
    }

    public function isActivated()
    {
        if (is_null($this->licenseKey) || empty($this->licenseKey)) {
            return false;
        }

        $apiCache = kirby()->cache('mauricerenck.content-calendar');
        $apiCacheData = $apiCache->get('license');

        if ($apiCacheData !== null) {
            return $apiCacheData === 'FULL_PLAN';
        }

        $licenseValidationResponse = Remote::post('https://licenses.mauricerenck.de/validate', [
            'data' => [
                'key' => $this->licenseKey,
                'productId' => $this->digistoreProductId,
            ],
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);

        if ($licenseValidationResponse->code() >= 500) {
            return false;
        }

        if ($licenseValidationResponse->code() !== 200) {
            $apiCache->set('license', 'FREE_PLAN', 1440); // cache is set in minutes => 24 hours
            return false;
        }

        $apiData = $licenseValidationResponse->json();
        $licenseValid = isset($apiData['valid'])
            ? $apiData['valid']
            : false;

        if ($licenseValid === null || $licenseValid === false) {
            $apiCache->set('license', 'FREE_PLAN', 1440); // cache is set in minutes => 24 hours
            return false;
        }

        $apiCache->set('license', 'FULL_PLAN', 1440); // cache is set in minutes => 24 hours

        return true;
    }
}
