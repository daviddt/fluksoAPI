<?

class Flukso {

        private $sensorid, $token, $interval, $unit;
        private $url='https://api.flukso.net/sensor/';
       
        public function __construct($u_sensorid, $u_token, $u_interval, $u_unit) {
                $this->sensorid = $u_sensorid;
                $this->token = $u_token;
                if (empty($u_interval)) {
                        $this->interval = 'hour';
                } else {
                        $this->interval = $u_interval;
                }      
                if (empty($u_unit)) {
                        $this->unit = 'watt';
                } else {
                        $this->unit = $u_unit;
                }
                $this->getdata();
        }
 
        private function getdata() {

                $header=array();
                $header[]="Accept: application/json";
                $header[]="X-Version: 1.0";
                $header[]='X-Token: '.$this->token;
 
                $request=$this->url.$this->sensorid;
                $request.='?interval='.$this->interval.'&unit='.$this->unit;
               
                $ch=curl_init();
                curl_setopt($ch,CURLOPT_URL,$request);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                $this->data=curl_exec($ch);
                curl_close($ch);
               
        }
        public function __toString() {
                return $this->data;
        }

}


if(isset($_GET['sensorid']) && !empty($_GET['sensorid'])){
    if(isset($_GET['token']) && !empty($_GET['token'])){

    	$fluksodata = new Flukso($_GET["sensorid"], $_GET["token"], $_GET["interval"], $token = $_GET["unit"]);
    	echo ($fluksodata); // dit is al json
	   
	} else {
	    echo "Geef een token op als parameters aan de URL!";
	}
} else {
    echo "Geef een sensor id op als parameters aan de URL!";
}



 
