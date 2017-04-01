<html>
<body>

<style>
		body,html {
			width:100%;
			height:100%;
			padding:0%;
			margin:0%;
			}
		@font-face {
	font-family: Chunk;
	src: url("Chunkfive.otf") format("opentype");
	}
</style>
</body>
<head>
<div style="width:100%;height:12%;position:fixed;float:top;background-color:#2B2B2B">


<p style="position:relative;font-family:Chunk;color:white;font-size:30px;float:left">Email:</p>
<span style="position:relative;font-family:Chunk;color:#DE1B1B;font-size:30px;"></span>
 <a  href="">   <img src="icon.png" style="width:5%;height:100%;float:right;margin-right:40px" ></img> <a>
	
</div>
<div style="width:50%;height:45%;position:relative;float:top;background-color:#E9E581;float:left;margin-top:6%">
<a href="" ><p style="position:relative;text-align:center;font-family:Chunk;color:#DE1B1B;font-size:20px;">My Scripts</p></a>

</div>



<div style="width:50%;height:45%;position:relative;float:top;background-color:#DE1B1B;float:left;margin-top:6%">
<a href="" ><p style="position:relative;text-align:center;font-family:Chunk;color:#2B2B2B;font-size:20px;">Upload Scripts</p></a>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <p style="font-family:Chunk;color:#2B2B2B;font-size:20px;">Select Pdf to upload:</p>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Pdf" name="submit">
</form>

</div>
</div>
<div style="width:50%;height:43%;position:relative;float:top;background-color:#DE1B1B;float:left;clear:left;">
<a href="" ><p style="position:relative;text-align:center;font-family:Chunk;color:#2B2B2B;font-size:20px;">My Videos</p></a>


</div>
<div style="width:50%;height:43%;position:relative;float:top;background-color:#E9E581;float:left;">

<a href="" ><p style="position:relative;text-align:center;font-family:Chunk;color:#DE1B1B;font-size:20px;">Upload Videos</p></a>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <p style="font-family:Chunk;color:#2B2B2B;font-size:20px;">Select Video to upload:</p>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload VIdeo" name="submit">
</form>

</div>

</head>
</html>

