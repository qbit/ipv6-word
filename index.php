<html>
<head>
</head>
<body>
	<h3>IPv6 to Enlish converter</h3>
	<p><strong>Example Address:</strong> babe:f432:42aa:8271:eee6:1076:dead:beef</p>
	<p><strong>Example Sentence:</strong> periodontist spend dejects indebted sloven axon rubberizes pity</p>
	<label for="ipv6Address">IPv6 Address
	<input type="text" name="ipv6Address" id="ipv6Address" size="50" value=""/>
	</label><br />

	<label for="sentence">English Sentence
	<input type="text" name="sentence" id="sentence" size="50" value=""/>
	</label>
	<br /><button onclick="convert()">Convert</button>
	<script type="text/javascript">
	function convert(){
		var lines;
		var txtFile = new XMLHttpRequest();
		
		txtFile.open("GET", "http://localhost/ipv6word/2of12inf.txt", true);
		txtFile.onreadystatechange = function(){
			if (txtFile.readyState === 4){
				if (txtFile.status === 200){
					allText = txtFile.responseText; 
					words = txtFile.responseText.split("\n");
					//console.log(lines);

					var addressBox = document.getElementsByName('ipv6Address')[0].value;
					var sentenceBox = document.getElementsByName('sentence')[0].value;
					if(addressBox === ""){
						convertToIp(sentenceBox, words);
					}else{
						convertToSentence(addressBox, words);
					}

				}
			}
		}
		txtFile.send(null);
	}


	function convertToSentence(input, words){
		var numbers = input.split(":");
		var sentence = "";
		for (var i = 0; i < numbers.length; ++i) {
			numbers[i] = parseInt(numbers[i], 16);
			sentence += words[numbers[i]];

			//Add the space
			if(i < numbers.length - 1){
				sentence += " ";
			}
		}

		document.getElementsByName('sentence')[0].value = sentence;
	}


	function convertToIp(input, words){
		var numbers = input.split(" ");
		console.log(numbers);
		console.log(words);
		var sentence = "";
		for (var i = 0; i < numbers.length; ++i) {
			console.log(numbers[i]);
			//I have no idea why this doesn't work
			sentence += words.indexOf(numbers[i]).toString(16);
			//Add the colon
			if(i < numbers.length - 1){
				sentence += ":";
			}
		}
		document.getElementsByName('ipv6Address')[0].value = sentence;
	}




	
	</script>
</body>
</html>

