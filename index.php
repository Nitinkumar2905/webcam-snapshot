<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam</title>
</head>

<style>
    .container{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>

<body onload="configure();">
    <div class="container">
        <div id="my_camera"></div>

        <div id="results" style="visibility:hidden; position:absolute;"></div>
        <br>
        <button type="button" onclick="saveSnap();">Save</button>
        <br>
        <a href="image.php"><button type="button">Go to image database page &#x2192;</button></a>
    </div>

    <script type="text/javascript" src="assets/webcam.min.js"></script>
    <script>
        function configure() {
            Webcam.set({
                width: 480,
                height: 360,
                image_format: 'jpeg',
                jpeg_quality: 90
            });

            Webcam.attach('#my_camera')
        }

        function saveSnap(){
            Webcam.snap(function(data_uri){
                document.getElementById('results').innerHTML = 
                '<img id="webcam" src="'+data_uri+'">';
            });

            Webcam.reset();

            var base64image = document.getElementById('webcam').src;
            Webcam.upload(base64image,'function.php',function(code,text){
                alert('saved successfully')
                document.location.href = "image.php"
            });

        }
    </script>
</body>

</html>