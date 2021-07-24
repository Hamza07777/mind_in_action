<?php


namespace App\Services\Twilio;


use App\Verify\Result;
use App\Verify\Service;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;


class Verification implements Service
{

    /**
     * @var Client
     */
    private $client;


    /**
     * @var string
     */
    private $verification_sid;


    /**
     * Verification constructor.
     * @param $client
     * @param string|null $verification_sid
     * @throws \Twilio\Exceptions\ConfigurationException
     */
    public function __construct($client = null, string $verification_sid = null)
    {

        if ($client === null) {
            $sid = "ACc2f48cbc9890be69d26eb91762c8da22";
            $token = "8199d7e3d8ec946cb351b73f89602703";
            $client = new Client($sid, $token);
        }
        $this->client = $client;
        $this->verification_sid = $verification_sid ?: "VA3a509fb7fc0e98aa1d3e925464ef4b78";
    }


    /**
     * Start a phone verification process using Twilio Verify V2 API
     *
     * @param $phone_number
     * @param $channel
     * @return Result
     */
    public function startVerification($phonename, $channel)
    {
        try {
            $verification = $this->client->verify->v2->services($this->verification_sid)
                ->verifications
                ->create($phonename, $channel);
            return new Result($verification->sid);
        } catch (TwilioException $exception) {
            return new Result(["Verification failed to start: {$exception->getMessage()}"]);
        }

    }

    /**
     * Check verification code using Twilio Verify V2 API
     *
     * @param $phone_number
     * @param $code
     * @return Result
     */
    public function checkVerification($phonename, $code)
    {
        try {
            $verification_check = $this->client->verify->v2->services($this->verification_sid)
                ->verificationChecks
                ->create($code, ['to' => $phonename]);
            if($verification_check->status === 'approved') {
                return new Result($verification_check->sid);
            }
            return new Result(['Verification check failed: Invalid code.']);
        } catch (TwilioException $exception) {
            return new Result(["Verification check failed: {$exception->getMessage()}"]);
        }
    }
}
