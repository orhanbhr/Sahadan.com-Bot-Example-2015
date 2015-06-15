<?php

	class BotX {

		// PHP Version : 5.6 >

		private $data;
		private $matches = [];

		private function connect()
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_URL, "http://www.sahadan.com/AjaxHandlers/ProgramDataHandler.ashx?type=6&sortValue=DATE&week=15047&day=15.06.2015&sort=-1&sortDir=-1&groupId=-1&np=1&sport=1");
			curl_setopt($ch, CURLOPT_REFERER, "http://www.sahadan.com/genis_ekran_iddaa_programi/");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 20);
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2431.0 Safari/537.36");
			$this->data = curl_exec($ch);
			curl_close($ch);
			return $this->data;
		}

		public function matches()
		{
			preg_match_all("#\[(.*?),(.*?),\{tId:(.*?)\},(.*?)\]#Ssie", $this->connect(), $maclar);
			foreach ($maclar[1] as $mackey => $mac) {
				preg_match_all("#'(.*?)',(.*?),'(.*?)','(.*?)',(.*?),'(.*?)','(.*?)','(.*?)','(.*?)','(.*?)','(.*?)','(.*?)','(.*?)','(.*?)','(.*?)','(.*?)','(.*?)','(.*?)','(.*?)','(.*?)','(.*?)','(.*?)','(.*?)','(.*?)'#Ssie", $maclar[2][$mackey], $ilkalan);
				#echo "<pre>"; print_r($maclar[4][$mackey]);
				// Kalan Oranlar $maclar[4][$mackey] bu değişken üzerinden parçalanabilir.
				$this->matches[$mackey] = [
					"evsahibi" => @trim($ilkalan[1][0]),
					"misafir" => @trim($ilkalan[3][0]),
					"tarih" => @trim($ilkalan[7][0])." ".@trim($ilkalan[6][0]),
					"kod" => @trim($ilkalan[10][0]),
					"mbs" => @trim($ilkalan[13][0]),
					"ms1" => $this->odd_checker(@trim($ilkalan[16][0])),
					"ms0" => $this->odd_checker(@trim($ilkalan[17][0])),
					"ms2" => $this->odd_checker(@trim($ilkalan[18][0])),
					"cs1" => $this->odd_checker(@trim($ilkalan[19][0])),
					"cs0" => $this->odd_checker(@trim($ilkalan[20][0])),
					"cs2" => $this->odd_checker(@trim($ilkalan[21][0])),
					"a25" => $this->odd_checker(@trim($ilkalan[22][0])),
					"u25" => $this->odd_checker(@trim($ilkalan[23][0]))
				];
			}
			return $this->matches;
		}

		private function odd_checker($odd)
		{
			if ($odd == ".00" || $odd == "0") {
				return "-";
			} else {
				return $odd;
			}
		}

	}

?>
