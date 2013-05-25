<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class UseAmazonS3 {
/*
현재까지의 문제점
1. 버킷을 새로 만들면 recursive directory 까지 처리가능하지만, 기 생성된 버킷에는 오류가 난다. : 해결함 https://github.com/tpyo/amazon-s3-php-class/issues/28
2. 1의 성공 케이스에도 디렉터를 보존한채 이미지 업로드 할 수 있는 방안 마련할 것 : 해결함

디렉터리를 보존하는 방법은 알아냈지만, 그 URL은 기존과 동일 즉, URL상에서 디렉터리가 구분되지는 않는다. : 해결함

1의 실패시 에러 메시지
PHP Fatal error:  Uncaught exception 'cURL_Multi_Exception' with message 'cURL resource: Resource id #18; cURL error:  (cURL error code 35). See http://curl.haxx.se/libcurl/c/libcurl-errors.html for an explanation of error codes.' in 
/home/semtleie/repository/AWSSDKforPH/lib/requestcore/requestcore.class.php:924
Stack trace:
#0 /home/semtleie/repository/AWSSDKforPH/utilities/batchrequest.class.php(122): RequestCore->send_multi_request(Array, Array)
#1 /home/semtleie/repository/AWSSDKforPH/sdk.class.php(1156): CFBatchRequest->send()
#2 /home/semtleie/repository/AWSSDKforPH/_samples/upload_new.php(153): CFRuntime->send()
#3 /home/semtleie/repository/AWSSDKforPH/_samples/upload_new.php(114): UseAmazonS3->upload_files()
#4 /home/semtleie/repository/AWSSDKforPH/_samples/upload_new.php(43): UseAmazonS3->__construct('/home/semtleie/...')
#5 {main}
  thrown in /home/semtleie/repository/AWSSDKforPH/lib/requestcore/requestcore.class.php on line 924

Fatal error: Uncaught exception 'cURL_Multi_Exception' with message 'cURL resource: Resource id #18; cURL error:  (cURL error code 35). See http://curl.haxx.se/libcurl/c/libcurl-errors.html for an explanation of error codes.' in 
/home/semtleie/repository/AWSSDKforPH/lib/r777equestcore/requestcore.class.php:924
Stack trace:
#0 /home/semtleie/repository/AWSSDKforPH/utilities/batchrequest.class.php(122): RequestCore->send_multi_request(Array, Array)
#1 /home/semtleie/repository/AWSSDKforPH/sdk.class.php(1156): CFBatchRequest->send()
#2 /home/semtleie/repository/AWSSDKforPH/_samples/upload_new.php(153): CFRuntime->send()
#3 /home/semtleie/repository/AWSSDKforPH/_samples/upload_new.php(114): UseAmazonS3->upload_files()
#4 /home/semtleie/repository/AWSSDKforPH/_samples/upload_new.php(43): UseAmazonS3->__construct('/home/semtleie/...')
#5 {main}
  thrown in /home/semtleie/repository/AWSSDKforPH/lib/requestcore/requestcore.class.php on line 924


group_cnt : 2000 개씩 끊어서 업로드 하도록 수정
한글화일명일때 에러 발생, 정규식으로 예외처리

**/
	protected $s3;
	protected $bucket = 'static.kr.adlatte.com';
	protected $region;
	protected $upload_dir;
	protected $upload_opt = array();
	protected $individual_filenames = array();
	protected $total_num = 0;
	protected $group_cnt = 2000;
	protected $group_num = 0;
	protected $check_cnt = 0;

	public function __construct($bucket=NULL, $region=NULL) {
		$this->bucket = ($bucket) ? $bucket : $this->bucket;
		$this->region = ($region) ? $region : AmazonS3::REGION_TOKYO;
	}

	public static function single_upload(array $upload_opt=array(), $bucket=NULL, $region=NULL) {
		$amz = new UseAmazonS3($bucket, $region);
		return $amz->single_up($upload_opt);
	}

	public static function multi_uploads(array $upload_opt=array(), $bucket=NULL, $region=NULL) {
		$amz = new UseAmazonS3($bucket, $region);
		return $amz->multi_up($upload_opt);
	}

	public function single_up(array $upload_opt=array()) {
		$is_bucket_exists = $this->init_s3_bucket($this->region);
		if($is_bucket_exists) {
			$filename = $upload_opt['filename'];
			$file = $upload_opt['file'];
			$type = $upload_opt['type'];
			// $return_type = isset($upload_opt['return_type']) ? $upload_opt['return_type'] : false;

			// Prepare to upload the file to our new S3 bucket. Add this request to a queue that we won't execute quite yet.
			$this->s3->batch()->create_object($this->bucket, $filename, array(
				'fileUpload' => $file
				, 'contentType' => $type
				, 'acl' => AmazonS3::ACL_PUBLIC
			)); // $filename => save file name, $file=>full path of upload file
			// create_mpu_object 고려할 것

			// Execute our queue of batched requests. This may take a few seconds to a few minutes depending on the size of the files and how fast your upload speeds are.
			$file_upload_response = $this->s3->batch()->send();
			// return $this->s3->batch()->send();

			$image_ext_arr = array(
				'image/jpeg'=>'jpg'
				, 'image/png'=>'png'
				, 'image/gif'=>'gif'
			);

			if($file_upload_response->areOK()) {
				$headers = $this->s3->get_object_headers($this->bucket, $filename);
				// echo $headers->header['_info']['url'];
				// echo "\t".$headers->header['_info']['http_code']. PHP_EOL;

				if($headers->header['_info']['http_code'] == 200) {
					// return ($return_type == 'info') ? $headers->header['_info'] : $headers->header['_info']['url'];

					if($headers->header['_info']['content_type'] == 'application/octet-stream') {
						$contentType = '';
						if( preg_match("/$\.jpg/i", $filename) ) {
							$contentType = "image/jpeg";
						} else if( preg_match("/$\.png/i", $filename) ) {
							$contentType = "image/png";
						} else if( preg_match("/$\.gif/i", $filename) ) {
							$contentType = "image/gif";
						}

						if($contentType != '') $this->s3->change_content_type($this->bucket, $filename, $contentType);
					}

					return $headers->header['_info']['url'];
				}
			}


		} else {
			$this->print_exit(array('code'=>'9999', 'message'=>'bucket 이 없어서 업로드 할 수 없습니다.'));
		}
	}

	public function multi_up(array $upload_opt=array()) {
		$this->upload_opt = $upload_opt;
		$upload_base_dir = realpath($this->upload_opt['base']);
		if($upload_base_dir !== FALSE) {
			$this->upload_opt['base'] = $upload_base_dir . DIRECTORY_SEPARATOR;
			$this->upload_opt['base'] = rtrim($this->upload_opt['base'], DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
		}
		$this->upload_dir = $this->upload_opt['base'].$this->upload_opt['upload'];

		$is_bucket_exists = $this->init_s3_bucket($this->region);
		if($is_bucket_exists) {
			$this->upload_files();

		} else {
			$this->print_exit(array('code'=>'9999', 'message'=>'bucket 이 없어서 업로드 할 수 없습니다.'));
		}
	}

	protected function init_s3_bucket($region) {
		// Instantiate the AmazonS3 class
		$this->s3 = new AmazonS3();
		$this->s3->set_region($region); // 매우 중요

		$is_bucket_exists = $this->check_bucket_exists();
		if(! $is_bucket_exists) {
			$is_created = $this->create_bucket();

			if($is_created) {
				$is_bucket_exists = $this->check_bucket_exists();

				// Since AWS follows an "eventual consistency" model, sleep and poll until the bucket is available.
				while(! $is_bucket_exists) {
					// Not yet? Sleep for 1 second, then check again
					sleep(1);
					$is_bucket_exists = $this->check_bucket_exists();
				}
			} else {
				$this->print_exit(array('code'=>'9999', 'message'=>'bucket을 만들 수 없습니다. \''.$this->bucket.'\'은 이미 존재하는 bucket입니다.'));
			}
		}

		return $is_bucket_exists;
	}

	// Callback used by filter_file_list()
	protected function file_path($file) {
		return array(
			'type'=>is_dir($file) ? 'dir' : (is_link($file) ? 'link' : 'file')
			, 'path'=>realpath($file)
		);
	}

	protected function print_exit($arr) {
		exit( json_encode($arr) );
	}

	protected function get_file_list($dir) {
		$list_of_files = $this->filter_file_list(glob($dir));

		$i=0;
		foreach($list_of_files as $file) {
			if($file['type'] == 'file') {
				$filename = explode(DIRECTORY_SEPARATOR, $file['path']);
				$filename = array_pop($filename);
				$this->individual_filenames[$this->group_num][] = array('filename'=>$filename, 'path'=>$file['path']);
				$this->total_num++;

			} else if($file['type'] == 'link') {
				continue;

			} else {
				$this->get_file_list($file['path'] . DIRECTORY_SEPARATOR . "*");
			}

			if($this->total_num%$this->group_cnt == 0) {
				$this->group_num++;
			}
		}
	}

	protected function upload_group_files($group_files) {
		foreach($group_files as $item) {
			$file = $item['path'];
			$filename = str_replace($this->upload_opt['base'], "", $item['path']); // $this->upload_opt['base']에 마지막 / 포함되어야 함

			$temp = preg_replace("/(\d|\w|\.|-|_|\/|\[|\]|\(|\))/", "", $file);
			if( $temp != '') {
				echo "reg error ".$file."==>".$temp."\n";
				continue;
			}

			if(! is_file($file) ) {
				echo "cannot read ".$file."\n";
				continue;
			}

			// Prepare to upload the file to our new S3 bucket. Add this request to a queue that we won't execute quite yet.
			$this->s3->batch()->create_object($this->bucket, $filename, array(
				'fileUpload' => $file
				, 'acl' => AmazonS3::ACL_PUBLIC
			)); // $filename => save file name, $file=>full path of upload file
			// create_mpu_object 고려할 것
		}

		// Execute our queue of batched requests. This may take a few seconds to a few minutes depending on the size of the files and how fast your upload speeds are.
		$file_upload_response = $this->s3->batch()->send();

		if($file_upload_response->areOK()) {
			foreach($group_files as $item) {
				$file = $item['path'];
				$filename = str_replace($this->upload_opt['base'], "", $item['path']); // $this->upload_opt['base']에 마지막 / 포함되어야 함
				// $headers = $this->s3->get_object_headers($this->bucket, $filename);

				echo $this->check_cnt++."\t";
				// echo $headers->header['_info']['url'];
				// echo "\t".$headers->header['_info']['http_code']. PHP_EOL;
				echo PHP_EOL;
			}
		}
	}

	protected function upload_files() {
		$this->get_file_list($this->upload_dir);

		$cnt = count($this->individual_filenames);
		for($i=0; $i<$cnt; $i++) {
			$this->upload_group_files($this->individual_filenames[$i]);
		}
	}

/*%******************************************************************************************%*/
// HELPER FUNCTIONS

	protected function check_bucket_exists() {
		return $this->s3->if_bucket_exists($this->bucket); // 1 or nil
	}

	protected function create_bucket() {
		$create_bucket_response = $this->s3->create_bucket($this->bucket, $this->region);
		return $create_bucket_response->isOK();
	}

	// Filters the list for only files
	protected function filter_file_list($arr) {
		return array_values(array_filter(array_map(array($this, 'file_path'), $arr)));
	}

/*
$this->s3->get_object_headers($bucket, $filename) 의 retrun array


CFResponse::__set_state(array(
   'header' => 
  array (
    'x-amz-id-2' => 'vAWNqD7I0R3rchxZOQ/FMT2l7JqqwMvMvmfTs5XMvYKnfHTSQE+aqc2ZWNMzlRdG',
    'x-amz-request-id' => '0A9BF8C2D11311D4',
    'date' => 'Wed, 19 Dec 2012 03:15:31 GMT',
    'last-modified' => 'Wed, 19 Dec 2012 03:15:29 GMT',
    'etag' => '"3a17e13ce570ba2e7e2c5a5f3fc56b10"',
    'accept-ranges' => 'bytes',
    'content-type' => 'image/jpeg',			'content_type' => 'application/octet-stream'
    'content-length' => '297823',
    'server' => 'AmazonS3',
    '_info' => 
    array (
      'url' => 'https://s3-ap-northeast-1.amazonaws.com/statickr3.adlatte.com/test_files/img_ad_detail/3884_3.JPG',
      'content_type' => 'image/jpeg',
      'http_code' => 200,
      'header_size' => 348,
      'request_size' => 808,
      'filetime' => 1355886929,
      'ssl_verify_result' => 0,
      'redirect_count' => 0,
      'total_time' => 0.167941,
      'namelookup_time' => 3.8E-5,
      'connect_time' => 0.034634,
      'pretransfer_time' => 0.084384,
      'size_upload' => 0,
      'size_download' => 0,
      'speed_download' => 0,
      'speed_upload' => 0,
      'download_content_length' => 297823,
      'upload_content_length' => 0,
      'starttransfer_time' => 0.167875,
      'redirect_time' => 0,
      'certinfo' => 
      array (
      ),
      'redirect_url' => '',
      'method' => 'HEAD',
    ),
    'x-aws-request-url' => 'https://s3-ap-northeast-1.amazonaws.com/statickr3.adlatte.com/test_files/img_ad_detail/3884_3.JPG',
    'x-aws-redirects' => 0,
    'x-aws-stringtosign' => 'HEAD

application/x-www-form-urlencoded
Wed, 19 Dec 2012 03:15:30 GMT
/statickr3.adlatte.com/test_files/img_ad_detail/3884_3.JPG',
    'x-aws-requestheaders' => 
    array (
      'Content-Type' => 'application/x-www-form-urlencoded',
      'Date' => 'Wed, 19 Dec 2012 03:15:30 GMT',
      'Authorization' => 'AWS AKIAJIQ3FLH2GO2JSQEA:HL+mvTzDSBfdoGeTvOK4bQvP9z0=',
      'Expect' => '',
    ),
  ),
   'body' => false,
   'status' => 200,
))



*/
}
?>