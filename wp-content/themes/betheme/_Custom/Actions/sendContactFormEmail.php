<?php
$ch = curl_init();
$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "nkmelnikov@hotmail.com",
                'Name' => "Nikita"
            ],
            'To' => [
                [
                    'Email' => "nkt.millers@gmail.com",
                    'Name' => "Nikita"
                ]
            ],
            'Subject' => "Greetings from Mailjet.",
            'TextPart' => "My first Mailjet email",
            'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
            'CustomID' => "AppGettingStartedTest"
        ]
    ]
];

curl_setopt($ch, CURLOPT_URL, 'https://api.mailjet.com/v3.1/send');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
curl_setopt($ch, CURLOPT_USERPWD, 'e7433eaf9351bdee0380d68017330711' . ':' . 'd7c2bc48072f2257b1247d12ef8d9202');

$headers = array();
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
echo 'Success';
curl_close($ch);
