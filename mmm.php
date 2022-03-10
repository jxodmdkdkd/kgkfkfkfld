<?php if (!file_exists('madeline.php')) { copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php'); } include 'madeline.php';

try {

$settings = new danog\MadelineProto\Settings;

$settings->setAppInfo((new danog\MadelineProto\Settings\AppInfo)

    ->setApiId(6866441)

    ->setApiHash('118436e499d813c4cf463490367f0899'));

    

    $MadelineProto = new API('session',$settings);

    $sentCode = $MadelineProto->phone_login(readline("Phone  : "));

    $authorization = $MadelineProto->complete_phone_login(readline("cod   : "));                  

    if ($authorization['_'] === 'account.needSignup') {

        $MadelineProto->complete_signup('Source_Home','Source_Home');

    }

    elseif ($authorization['_'] === 'account.password') {

        $authorization = $MadelineProto->complete_2fa_login(readline("pass  : "));

        print_r($authorization);

    }

    else{              

        print_r($authorization);

    }                                

} catch (\danog\MadelineProto\RPCErrorException $e) {

    echo "";

    print $e->getmessage();        

    exit();             

}

$MadelineProto->async(true);

while(1)

$MadelineProto->messages->sendMessage(['peer' => '@UUUO1944', 'message' =>"شلونكم قي"]);
