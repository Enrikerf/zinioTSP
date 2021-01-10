<?php


namespace App\Application\Port\in\solveTSP;


class SolveTSPResponse
{

    private int $responseCode;
    private array $message;

    /**
     * SolveTSPResponse constructor.
     * @param int $responseCode
     * @param array $message
     */
    public function __construct(int $responseCode, array $message)
    {
        $this->responseCode = $responseCode;
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getResponseCode(): int
    {
        return $this->responseCode;
    }

    /**
     * @return array
     */
    public function getMessage(): array
    {
        return $this->message;
    }




}