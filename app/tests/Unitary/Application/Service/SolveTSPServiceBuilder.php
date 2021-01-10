<?php


namespace App\Tests\Unitary\Application\Service;


use App\Application\Port\out\Persistence\LoadCitiesPort;
use App\Application\Service\SolveTSPService;

class SolveTSPServiceBuilder
{
    private LoadCitiesPort $loadCitiesPort;
    public static function getBuilder(): SolveTSPServiceBuilder
    {
        return new SolveTSPServiceBuilder();
    }

    public function LoadCitiesPort(LoadCitiesPort $loadCitiesPort): SolveTSPServiceBuilder
    {
        $this->loadCitiesPort = $loadCitiesPort;
        return $this;
    }

    public function build(): SolveTSPService
    {
        return new SolveTSPService($this->loadCitiesPort);
    }
}