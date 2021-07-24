<?php


namespace App\Verify;


interface Service
{
    /**
     * Start a phone verification process using an external service
     *
     * @param $phone_number
     * @param $channel
     * @return Result
     */
    public function startVerification($phonename, $channel);


    /**
     * Check verification code using an external service
     *
     * @param $phone_number
     * @param $code
     * @return Result
     */
    public function checkVerification($phonename, $code);

}
