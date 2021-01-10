<?php


namespace App\Tests\Unitary\Application\Service;


use App\Application\Model\ResponseCode;
use App\Tests\Unitary\Application\Port\out\Persistence\LoadCitiesPortBuilder;
use PHPUnit\Framework\TestCase;

class SolveTSPServiceTest extends TestCase
{
    public function testOnCalculatorErrorReturnResponseWithNotOkCodeAndErrorsArrayInMessage(){
        $solveTSPService = SolveTSPServiceBuilder::getBuilder()
            ->LoadCitiesPort(LoadCitiesPortBuilder::getMockWithReturnNull())
            ->build();
        $this->assertEquals(ResponseCode::NOT_OK,$solveTSPService->solve()->getResponseCode());
        $this->assertIsArray($solveTSPService->solve()->getMessage());
    }

    public function testOnCalculatorSuccessReturnResponseWithCodeOkAndCitiesArray(){
        $solveTSPService = SolveTSPServiceBuilder::getBuilder()
            ->LoadCitiesPort(LoadCitiesPortBuilder::getMockWithReturnDefaultCities())
            ->build();
        $this->assertEquals(ResponseCode::OK,$solveTSPService->solve()->getResponseCode());
        $this->assertIsArray($solveTSPService->solve()->getMessage());
    }

}