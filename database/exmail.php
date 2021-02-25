<?php
namespace awsx;
require '../vendor/autoload.php';

use Aws\Ses\SesClient;
use Aws\Exception\AwsException;

class exmail
{
    function eemail($email,$subject,$message)
    {
        $client = new SesClient(
                    ['version' => '2010-12-01',
                     'region' => 'us-west-2',
                     'credentials' => [
                     'key' => "AWS_SES_KEY",
                     'secret' => "AWS_SES_SECRET"
                                      ]]);
        $sender_email = 'EMAIL_HERE';
        $recipient_email =$email;
        $configuration_set = 'Config';


        $char_set = 'UTF-8';
try
    {
        $result = $client->sendEmail(['Destination' => [
                                      'ToAddresses' => $recipient_email,],
                                      'ReplyToAddresses' => [$sender_email],
                                      'Source' => $sender_email,
                                      'Message' =>
                                          ['Body' =>
                                          ['Html' =>
                                          ['charset' => $char_set,
                                           'Data' => $message,],
                                           'Text' => [
                                           'Charset' => $char_set,
                                           'Data' => $subject,],],

                                            'Subject' => ['Charset' => $char_set,
                                            'Data' => $subject,
                                                ],
                                                ],
                                                ]

                                      );
                            $messageId = $result['MessageID'];
                            echo ('email sent');
    }
catch (AwsException $e)
    {
    echo $e->getMessage();
    echo("error" . $e->getAwsErrorMessage() . '\n');
    echo '\n';
    }}}