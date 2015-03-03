<?php
ob_start();
session_start();
$r=getenv('REMOTE_ADDR');
$_SESSION['ip']=$r;
$conn=mysql_connect('localhost','root','yomahesh9094') or die("connection failed");
$db=mysql_select_db('buzzer',$conn)or die("could not select database");
$n=mysql_query("select * from quiz where IPAddress= '$r' ");
$e=mysql_num_rows($n);
if($e==0)
{
    header('location: team.php');
} 
if($e>0) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
  
</head>
<body>
<div class='main'>
<h1 align="center"> Welcome User</h1>
 <p style="text-align: center">Click Start and begin speaking</p>
<canvas id="canvas" width="800" height="256" ></canvas>
<p id="controls">
    <div id="t"> </div>
   
        </div>
</body>
</html>
<?php } ?>
 <!-- <input type="button" id="start_button" value="Start">
  &nbsp; &nbsp;
  <input type="button" id="stop_button" value="Stop">
</p>
 <!-- ----------------------------------------------------- -->

<style>

    #canvas {
        margin-left: auto;
        margin-right: auto;
        display: block;
        background-color: black;
    }
    #controls {
        text-align: center;
    }
    #start_button, #stop_button {
        font-size: 16pt;
    }
</style>

<!-- ----------------------------------------------------- -->

 <script type = "text/javascript" >
    history.pushState(null, null, 'index.php');
    window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'index.php');
    });
    </script>
    <script>
    var context = new AudioContext();
    function start() { 
     var request = new XMLHttpRequest();
      request.open("GET", "buzz1.mp3", true);
       request.responseType = "arraybuffer"; 
        request.onload = function() 
        { 
            var data = request.response;  
            audioRouting(data); }; 
         request.send(); 
     }

     function audioRouting(data) {
    source = context.createBufferSource(); // Create sound source
    context.decodeAudioData(data, function(buffer){ // Create source buffer from raw binary
    source.buffer = buffer; // Add buffered data to object
    source.connect(context.destination); // Connect sound source to output
    playSound(source); // Pass the object to the play function
    });
}

function playSound() {
    source.start(context.currentTime); // play the source immediately
}
    



     
    </script>
<script type="text/javascript">
window.onbeforeunload = function() {
        return "Are u sure you want to reload this page";
    }


    // Hack to handle vendor prefixes
    navigator.getUserMedia = ( navigator.getUserMedia ||
                               navigator.webkitGetUserMedia ||
                               navigator.mozGetUserMedia ||
                               navigator.msGetUserMedia);

    window.requestAnimFrame = (function(){
      return  window.requestAnimationFrame       ||
              window.webkitRequestAnimationFrame ||
              window.mozRequestAnimationFrame    ||
              function(callback, element){
                window.setTimeout(callback, 1000 / 60);
              };
    })();

    window.AudioContext = (function(){
        return  window.webkitAudioContext || window.AudioContext || window.mozAudioContext;
    })();

    // Global Variables for Audio
    var audioContext;
    var analyserNode;
    var javascriptNode;
    var sampleSize = 1024;  // number of samples to collect before analyzing
                            // decreasing this gives a faster sonogram, increasing it slows it down
    var amplitudeArray;     // array to hold frequency data
    var audioStream;

    // Global Variables for Drawing
    var column = 0;
    var canvasWidth  = 800;
    var canvasHeight = 256;
    var ctx;
    var ctx1;
    var value=0;
    

    $(document).ready(function() {

        ctx = $("#canvas").get()[0].getContext("2d");
        ctx1 = $("#canvas").get()[0].getContext("2d");

        try {
            audioContext = new AudioContext();
        } catch(e) {
            alert('Web Audio API is not supported in this browser');
        }

        // When the Start button is clicked, finish setting up the audio nodes, and start
        // processing audio streaming in from the input device
        
            clearCanvas();

            // get the input audio stream and set up the nodes
            
                navigator.getUserMedia(
                  { video: false,
                    audio: true},
                  setupAudioNodes,
                  onError);
            
        


        // Stop the audio processing
       
    });

    function setupAudioNodes(stream) {
        // create the media stream from the audio input source (microphone)
        sourceNode = audioContext.createMediaStreamSource(stream);
        audioStream = stream;

        analyserNode   = audioContext.createAnalyser();
        javascriptNode = audioContext.createScriptProcessor(sampleSize, 1, 1);

        // Create the array for the data values
        amplitudeArray = new Uint8Array(analyserNode.frequencyBinCount);

        // setup the event handler that is triggered every time enough samples have been collected
        // trigger the audio analysis and draw one column in the display based on the results
        javascriptNode.onaudioprocess = function () {

            amplitudeArray = new Uint8Array(analyserNode.frequencyBinCount);
            analyserNode.getByteTimeDomainData(amplitudeArray);

            // draw one column of the display
            requestAnimFrame(drawTimeDomain);
        }

        
        sourceNode.connect(analyserNode);
        analyserNode.connect(javascriptNode);
        javascriptNode.connect(audioContext.destination);
    }

    function onError(e) {
        console.log(e);
    }

    function drawTimeDomain() {
        var minValue = 9999999;
        var maxValue = 0;
        var v=0;
        for (var i = 0; i < amplitudeArray.length; i++) {
            var value = amplitudeArray[i] / 256;
            v+=value;
            if(value > maxValue) {
                maxValue = value;
            } else if(value < minValue) {
                minValue = value;
            }
        }
		if(maxValue>=0.9){
        
var y_lo = canvasHeight - (canvasHeight * minValue) - 1;
        var y_hi = canvasHeight - (canvasHeight * maxValue) - 1;
            ctx.fillStyle = 'red';
        
        ctx.fillRect(160,160, 10, (y_hi-y_lo)/2);
       start();
         
     
    
         

			
			/* alert("threshold value increased to above  0.9 You reached "+maxValue+"..Redirecting..."); */ 
			redirect();
           /* setInterval(function() { window.location.href = 'team.php'; },2000); */
             
		}

        var y_lo = canvasHeight - (canvasHeight * minValue) - 1;
        var y_hi = canvasHeight - (canvasHeight * maxValue) - 1;
	
        ctx.fillStyle = 'green';
		
        ctx.fillRect(160,160, 10, (y_hi-y_lo)/2);
        
       setInterval(function() { clearCanvas(); },2000);

		
         
        // loop around the canvas when we reach the end
        
    
	
}
    function clearCanvas() {
        column = 0;
        ctx.clearRect(0, 0, canvasWidth, canvasHeight);
        ctx.strokeStyle = '#f00';
        var y = (canvasHeight / 2) + 0.5;
        ctx.moveTo(0, y);
        ctx.lineTo(canvasWidth-1, y);
        ctx.stroke();
    }

    function redirect()
    {
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("t").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "d.php", true);
        xmlhttp.send();
    }

</script>

