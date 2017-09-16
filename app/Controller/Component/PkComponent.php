<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP uploadComponent
 * @author pravesh
 */
class PkComponent extends Component {

    public $components = array();
    public $uses = array('Hashtag');

//    public function initialize($controller) {
//        parent::initialize($controller);
//    }
//    public function startup($controller) {
//        parent::startup($controller);
//    }
//    public function beforeRender($controller) {
//        
//    }
//
//    public function shutDown($controller) {
//        
//    }
//
//    public function beforeRedirect($controller, $url, $status = null, $exit = true) {
//        
//    }
    public function DeleteIV($file) {
        if ($file != '') {
            App::uses('S3', 'Vendor');
            $bucket = Configure::read('S3.bucket');
            $s3 = new S3(Configure::read('S3.awsAccessKey'), Configure::read('S3.awsSecretKey'));
            try {
                $s3->deleteObject($bucket, baseName($file));
                $returnArr['status'] = 'success';
                $returnArr['message'] = 'deleted successfully..';
            } catch (Exception $ex) {
                $returnArr['message'] = 'Error occurred while photo uploading..';
                $returnArr['status'] = 'failure';
            }
        }
        // print_R($returnArr);
    }

    public function uploadImage1($file, $name, $type = 'profile') {

        if (isset($file['name'])) {
            $sFileName = $name;
            $aImageTypes = array("image/gif", "image/jpeg", "image/jpg", "image/png");
            $sPath = "img/{$type}";
            if (in_array(strtolower($file['type']), $aImageTypes)) {
                $priv = 0777;
                if (!file_exists($sPath)) {
                    mkdir($sPath, $priv, true) ? true : false; // creates profilepic directory with write permission.
                }
                $save = $sPath . "/" . $sFileName;
                $tempfilename = $file['tmp_name'];
                App::uses('S3', 'Vendor');
                $bucket = Configure::read('S3.bucket');
                $s3 = new S3(Configure::read('S3.awsAccessKey'), Configure::read('S3.awsSecretKey'));
//$s3->putBucket($bucket, S3::ACL_PUBLIC_READ);
                try {
                    $s3->putObjectFile($tempfilename, $bucket, $sFileName, S3::ACL_PUBLIC_READ);
                    $msg = "S3 Upload Successful.";
                    $file_name = 'http://' . $bucket . '.s3-us-west-2.amazonaws.com/' . $sFileName;
                    $returnArr['url'] = $file_name;
                    $returnArr['status'] = 'success';
                } catch (Exception $ex) {
                    $returnArr['message'] = 'Error occurred while photo uploading..';
                    $returnArr['status'] = 'failure';
                }
            } else {
                $returnArr['message'] = 'Image is not valid format';
                $returnArr['status'] = 'failure';
            }
        } else {
            $returnArr['message'] = 'File data not found.';
            $returnArr['status'] = 'failure';
        }
        return $returnArr;
    }

    public function uploadVideo($file, $name, $type = 'profile') {
        if (isset($file['name'])) {
            $sFileName = $name;
            $aImageTypes = array("video/mov", "video/mp4", "audio/mp3", "audio/wma", "video/quicktime", "application/octet-stream", 'audio/force-download');
            $sPath = "img/{$type}";
            if (in_array(strtolower($file['type']), $aImageTypes)) {
                $priv = 0777;
                if (!file_exists($sPath)) {
                    mkdir($sPath, $priv, true) ? true : false; // creates profilepic directory with write permission.
                }
                $save = $sPath . "/" . $sFileName;
                $tempfilename = $file['tmp_name'];
                App::uses('S3', 'Vendor');

                $bucket = Configure::read('S3.bucket');
                $s3 = new S3(Configure::read('S3.awsAccessKey'), Configure::read('S3.awsSecretKey'));
                $s3->putBucket($bucket, S3::ACL_PUBLIC_READ);
                try {
                    $s3->putObjectFile($tempfilename, $bucket, $sFileName, S3::ACL_PUBLIC_READ);
                    $msg = "S3 Upload Successful.";
                    $file_name = 'http://' . $bucket . '.s3-us-west-2.amazonaws.com/' . $sFileName;
                    $returnArr['url'] = $file_name;
                    $returnArr['status'] = 'success';
                } catch (Exception $ex) {
                    $returnArr['message'] = 'Error occurred while photo uploading..';
                    $returnArr['status'] = 'failure';
                }
//                if (move_uploaded_file($file['tmp_name'], $save)) {
//                    //$returnArr['url'] = Router::url("/" . $save, true);
//                    $returnArr['url'] = $save;
//                    $returnArr['status'] = 'success';
//                } else {
//                    $returnArr['message'] = 'Error occurred while file uploading..';
//                    $returnArr['status'] = 'failure';
//                }
            } else {
                $returnArr['message'] = 'file is not valid format';
                $returnArr['status'] = 'failure';
            }
        } else {
            $returnArr['message'] = 'File data not found.';
            $returnArr['status'] = 'failure';
        }
        return $returnArr;
    }

    public function uploadImageBase64($data = '', $name, $type = 'profile') {

        if (isset($data) && $data != '') {
            list($imgtype, $data) = explode(';', $data);
            list(, $imgtype) = explode(':', $imgtype);

            if ($imgtype == 'image/png') {
                $name = $name . ".png";
            } elseif ($imgtype == 'image/jpeg' || $imgtype == 'image/jpg') {
                $name = $name . ".jpg";
            } else {
                $name = $name . ".gif";
            }
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);
            $sPath = "img/{$type}";
            $priv = 0777;
            if (!file_exists($sPath)) {
                mkdir($sPath, $priv, true) ? true : false; // creates profilepic directory with write permission.
            }
            $save = $sPath . "/" . $name;
            
            file_put_contents($save, $data);

            $returnArr['url'] = $save;
            $returnArr['status'] = 'success';
        } else {
            $returnArr['message'] = 'File data not found.';
            $returnArr['status'] = 'failure';
        }
        return $returnArr;

       
    }

    public function uploadImage($file, $name, $type = 'profile') {
        if (isset($file['name'])) {
            $sFileName = $name;
            $aImageTypes = array("image/gif", "image/jpeg", "image/jpg", "image/png");
            $sPath = "img/{$type}";
            if (in_array(strtolower($file['type']), $aImageTypes)) {
                $priv = 0777;
                if (!file_exists($sPath)) {
                    mkdir($sPath, $priv, true) ? true : false; // creates profilepic directory with write permission.
                }
                $save = $sPath . "/" . $sFileName;
                if (move_uploaded_file($file['tmp_name'], $save)) {
//$returnArr['url'] = Router::url("/" . $save, true);
                    $returnArr['url'] = $save;
                    $returnArr['status'] = 'success';
                } else {
                    $returnArr['message'] = 'Error occurred while photo uploading..';
                    $returnArr['status'] = 'failure';
                }
            } else {
                $returnArr['message'] = 'Image is not valid format';
                $returnArr['status'] = 'failure';
            }
        } else {
            $returnArr['message'] = 'File data not found.';
            $returnArr['status'] = 'failure';
        }
        return $returnArr;
    }

    public function uploadVideo2($file, $name, $type = 'profile') {
        if (isset($file['name'])) {
            $sFileName = $name;
            $aImageTypes = array("video/mov", "video/mp4", "audio/mp3", "audio/wma", "video/quicktime", "application/octet-stream", 'audio/force-download');
            $sPath = "img/{$type}";
            if (in_array(strtolower($file['type']), $aImageTypes)) {
                $priv = 0777;
                if (!file_exists($sPath)) {
                    mkdir($sPath, $priv, true) ? true : false; // creates profilepic directory with write permission.
                }
                $save = $sPath . "/" . $sFileName;
                if (move_uploaded_file($file['tmp_name'], $save)) {
//$returnArr['url'] = Router::url("/" . $save, true);
                    $returnArr['url'] = $save;
                    $returnArr['status'] = 'success';
                } else {
                    $returnArr['message'] = 'Error occurred while file uploading..';
                    $returnArr['status'] = 'failure';
                }
            } else {
                $returnArr['message'] = 'file is not valid format';
                $returnArr['status'] = 'failure';
            }
        } else {
            $returnArr['message'] = 'File data not found.';
            $returnArr['status'] = 'failure';
        }
        return $returnArr;
    }

    function deleteMedia($type = 0, $name = "", $thumb = "") {
        App::uses('S3', 'Vendor');
        $bucket = Configure::read('S3.bucket');
        $s3 = new S3(Configure::read('S3.awsAccessKey'), Configure::read('S3.awsSecretKey'));
        //  $s3->putBucket($bucket, S3::ACL_PUBLIC_READ);
        if ($name != '') {
            try {
                $s3->deleteObject($bucket, baseName($name));
                return true;
            } catch (Exception $ex) {
                return false;
            }
        }
        if ($thumb != '') {
            try {
                $s3->deleteObject($bucket, baseName($thumb));
                return true;
            } catch (Exception $ex) {
                return false;
            }
        }
    }

    function deleteMedia2($type = 0, $name = "", $thumb = "") {
        if ($name != '') {
            unlink($name);
        }
        if ($thumb != '') {
            unlink($thumb);
        }
    }

    public function sendSMS($message, $to = "+919690194941", $test = true) {
        App::import('Vendor', 'Twilio/Services/Twilio');
        //$test = false;

        try {
            if ($test) {
//INDIA
                $sid = "AC50c4c6e15ce676c7fecf747ee39731c7"; /* Twilio id get it from Twilio account */
                $token = "f292b49c57812fb300743baf2c625150"; /* Twilio token get it from Twilio account */
                $client = new Services_Twilio($sid, $token);
                $sms = $client->account->messages->create(array(
                    'To' => $to,
                    'From' => "+15005550006",
                    'Body' => $message,
                ));
            } else {
//USA   
                $Email = new CakeEmail();
                $Email->config('gmail');
                $Email->subject($to + ' Mobile varification for SecurityHorse');
                $Email->viewVars(array('message' => $message));
                $Email->template('mobile', 'default')
                        ->emailFormat('html')
                        ->to(array("vikas@developingnow.com"))
                        ->from(array('admin@securityhorse.com' => 'Security Horse'))
                        ->send();

                $sid = "AC50c4c6e15ce676c7fecf747ee39731c7"; /* Twilio id get it from Twilio account */
                $token = "f292b49c57812fb300743baf2c625150"; /* Twilio token get it from Twilio account */
                $client = new Services_Twilio($sid, $token);
                $sms = $client->account->messages->create(array(
                    // 'To' => "+12012590492",
                    'To' => $to,
                    'From' => "+18623731892",
                    'Body' => $message,
                ));
                // pr($sms);exit;
            }
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    static function timeAgoInWords($timestamp, $user_id = 0) {
        $User = ClassRegistry::init('User');
        //  $u = $User->find('first', array('conditions' => array('User.id' => $user_id), 'recursive' => -1, 'fields' => array('user_timezone')));
        //  if (isset($u['User']['user_timezone']) && $u['User']['user_timezone'] != '') {
        //     $timezone = $u['User']['user_timezone'];
        //  } else {
        $timezone = 'EST';
        // }
        //  print_R($timestamp);exit;
        $tz = new DateTimeZone($timezone);
        $datetime1 = new DateTime("now");
        $datetime1->setTimezone($tz);
        $datetime2 = new DateTime($timestamp);
        $datetime2->setTimezone($tz);

        $diff = date_diff($datetime1, $datetime2);
        // print_R($diff);exit;
        $timemsg = '';

        if (floor($diff->d / 9) > 0) {
            $timemsg = date('M d, Y', strtotime($timestamp));
        } else if ($diff->d > 0) {
            $timemsg = $diff->d . ' day' . ($diff->d > 1 ? "s" : '');
        } else if ($diff->h > 0) {
            $timemsg = $diff->h . ' hour' . ($diff->h > 1 ? "s" : '');
        } else if ($diff->i > 0) {
            $timemsg = $diff->i . ' min' . ($diff->i > 1 ? "s" : '');
        } else if ($diff->s > 0) {
            $timemsg = $diff->s . ' sec' . ($diff->s > 1 ? "s" : '');
            // $timemsg= "just now";
        }
        if ($timemsg == "") {
            $timemsg = "1 sec";
            // $timemsg= "just now";
        }
        if (floor($diff->d / 9) > 0) {
            $timemsg = $timemsg . ' ';
        } else
            $timemsg = $timemsg . ' ago';
        return $timemsg;
    }

    function getHashtags($msg) {
//filter the hastag
        $tags = array();
        $Hashtag = ClassRegistry::init('Hashtag');
        preg_match_all('/(^|[^a-z0-9_])#([a-z0-9_]+)/i', $msg, $matched_hashtag);
        $hashtag = '';
//if hashtag found

        if (!empty($matched_hashtag[0])) {
//fetch hastag from the array
            foreach ($matched_hashtag[0] as $matched) {
//append every hastag to a string
//remove the # by preg_replace function
                $hashtag[] = '#' . strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '', $matched)));
//append and , after every hashtag
            }
        }
        if (!empty($hashtag)) {
            $hashs = array_unique($hashtag);

            foreach ($hashs as $h) {

                $hresult = $Hashtag->find('first', array('conditions' => array('Hashtag.hashtag' => $h), 'recursive' => -1));
// $log = $Hashtag->getDataSource()->getLog(false, false);
// debug($log);
// print_R($hresult);
//  exit;
                if ($hresult) {
                    $tags[] = ($hresult['Hashtag']['id']);
                } else {
                    $result = $Hashtag->save(array('hashtag' => $h));
                    $tags[] = $result['Hashtag']['id'];
                }
            }
        }
        return $tags;
//remove , from the last hashtag
    }

    function getLocations($msg, $city = "", $state = "", $country = "") {
//filter the hastag
        $Location = ClassRegistry::init('Location');
        preg_match_all('/(^|[^a-z0-9_])#([a-z0-9_]+)/i', $msg, $matched_hashtag);
        $hashtag = '';
//if hashtag found
        $hresult = $Location->find('first', array('conditions' => array('Location.name' => $msg), 'recursive' => -1));

        if ($hresult) {
            $result = $Location->save(array('name' => $msg, 'city' => $city, 'state' => $state, 'country' => $country, 'id' => $hresult['Location']['id']));
            $tags = ($hresult['Location']['id']);
        } else {
            $result = $Location->save(array('name' => $msg, 'city' => $city, 'state' => $state, 'country' => $country));
            $tags = $result['Location']['id'];
        }

        return $tags;
//remove , from the last hashtag
    }

    static function url($file) {
        if (strpos($file, 'http://') === false) {
            if ($file != '') {
                return Router::url("/" . $file, true);
            } else {

                return "";
            }
        } else {
            $file = str_replace("http://vytl.s3-us-west-2.amazonaws.com", "http://d5urzfn1jhdy1.cloudfront.net", $file);
            return $file;
        }
    }

}
