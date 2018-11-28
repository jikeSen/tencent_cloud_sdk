<?php
/**
 * Created by PhpStorm.
 * User: sen
 * Date: 2018/11/27
 * Time: 22:43
 */
require_once "./vendor/autoload.php";

$sign = "eJxNjVFvgjAURv8Lr1uW3tYq7I0IGg2IZmM6X5oKrbuSAWs7wrLsv48QzfZ6Ts73fXvPydODLIrms3bCfbXKe-SIdz9iLFXtUKMyA7xgpayqr0q2LZZCOsFM*a*wZSVGNTCYEAJTxsj0KlXfolFCajcOAuecEnJLO2UsNvUgKAEOlBHyJx2*qzGZMEb9WRDc-vA84DR*na928zCH02UTHxqle7PgTZOczklXRAXseeDfLatF5fzsowC7W72FmzU7sGwNepbVKPVS9gxTC9RFeecfj9k*T7dbE8YvaeT9-AL4YFgR";

//签名
try {
    $api = new \TencentCloud\Sign\TLSSigAPI();
    $api->SetAppid('1400163306');
    $private = file_get_contents(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'private_key');
    $api->SetPrivateKey($private);
    $public = file_get_contents(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'public_key');
    $api->SetPublicKey($public);
    $sig    = $api->genSig('jikesen');
    $result = $api->verifySig($sig, 'jikesen', $init_time, $expire_time, $error_msg);
    var_dump($sig);
    var_dump($result);
    var_dump($init_time);
    var_dump($expire_time);
    var_dump($error_msg);

} catch (Exception $e) {
    echo $e->getMessage();
}
