<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" type = "img/png" href = "tutorial.png">
		<link rel="stylesheet" type="text/css" href="styleEditor.css">
	</head>
	<body>
		<div id="content">
        
		<?php 
            $lesson = $_GET["lesson"];
            $lang = $_GET["lang"];
            echo '<script>';
            echo 'var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4)
                         if (xhttp.status == 200) {
                            document.getElementById("content").innerHTML = xhttp.responseText;
                            load();
                        } else {
                            alert("AJAX Error");
                        }
                }
                xhttp.open("GET", "Editors/'.$lang.'/'.$lang.$lesson.'.html", true); //xhttp.open("GET", "Editors/python/python1.html", true);
                xhttp.send();';
            echo '</script>';
		?>
        </div>
        <div id="output">
        </div>
		<script type="text/javascript">
			var text, lines, cont, refreshlines;
            //alert("Check");
			function load() {
				var text = document.getElementById("text");
				var lines = document.getElementById("divlines");
				var cont = document.getElementById("container");
                refreshlines = function() {
                    var nLines = text.value.split("\n").length;
                    lines.innerHTML = ""
                    for (i=1; i<=nLines; i++) {
                        lines.innerHTML = lines.innerHTML + i + "." + "<br />";
                    }
                    lines.style.top = -(text.scrollTop) + "px";
                }
                refreshlines();
                text.onscroll = function () {
                    lines.style.top = -(text.scrollTop) + "px";
                    return true;
                }
                text.onkeyup = function (e) {
                    
                    refreshlines();
                    //console.log("rl");
                    return true;
                }
                
                
                <?php
                   
                    
                    if($lesson < 5)
                    {
                    echo 'correct = function() {
                            alert("Correct");
                            document.querySelector("#s").innerHTML = "Next Lesson";
                            document.querySelector("#s").onclick = function() {
                                window.location="editor.php?lang='.$lang.'&lesson='.($lesson+1).'";
                            }
                            /*var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4)
                                     if (xhttp.status == 200) {
                                        document.getElementById("content").innerHTML = xhttp.responseText;
                                        load();
                                    } else {
                                        alert("AJAX Error");
                                    }
                            }
                            xhttp.open("GET", "Editors/'.$lang.'/'.$lang.($lesson+1).'.html", true); 
                            xhttp.send();*/
                        };';
                    }
                    else
                    {
                        echo 'correct = function() {
                            alert("Correct");
                            document.querySelector("#s").innerHTML = "Finish";
                            document.querySelector("#s").onclick = function() {
                                // Cong
                               // alert("Correct");
                                window.location= "Congrats.html"
                            }
                        }
                        ';
                    }

                    echo '
                    document.querySelector("#s").onclick = function() {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (xhttp.readyState == 4)
                                if (xhttp.status == 200) {
                                    document.getElementById("output").innerHTML=unescape(xhttp.responseText);';
                                    
                    if ($lesson == 1)
                    {
                        echo 'if(unescape(xhttp.responseText) == "Hello\r\n" || unescape(xhttp.responseText) == "Hello") {
                                correct();
                            }else
                                 alert("Oops! something went wrong here.")';
                    }
 
                    else if($lesson == 2)
                    {
                       echo 'var b = unescape(xhttp.responseText);';
                        if($lang == "python")
                        {
                        echo 'var a = b.split("\n");';
                            echo 'if(a[0] == 3 && a[1] == 2 && a[2] == "False")
                                correct();
                               else
                                 alert("Oops! something went wrong here.")';
                        }
                        else if($lang == "c")
                        {
                             echo 'if( parseInt(b) == 360 )
                                    correct()
                                    else
                                    alert("Oops! something went wrong here.")';
                        }
                        else
                        {
                            echo 'var a = b.split("\n");';
                            echo 'if(parseInt(a) == 36)
                                    correct()
                                    else
                                     alert("Oops! something went wrong here.")';
                        }
                    }
            
                   else if($lesson == 3)
                    {
                        echo 'var b = unescape(xhttp.responseText);';
                        echo 'var e = unescape(xhttp.responseText).split("\n");';
                        echo 'var arr = ["2","4","6","8","10"];';
                       echo 'function fn()
                             {    
                                for(var i in arr)
                                    {
                                      if(e[i]!=arr[i])
                                        return false;
                                    }
                                    return true;
                             }'; 
                       
                       
                           echo'
                           console.log(b,e);
                           if(b == "246810" || fn() )
                            {
                                correct();
                            }
                                else
                                alert("Oops! something went wrong here.");   ';
                       
      
   
                    }
                    else if($lesson == 4)
                    {
                     echo 'var b = unescape(xhttp.responseText);';
                        echo 'var e = unescape(xhttp.responseText).split("\n");';
                        echo 'var arr = ["10","9","8","7","6","5","4","3","2","1"];';
                        echo 'function fn()
                             {    
                                for(var i in arr)
                                    {
                                      if(e[i]!=arr[i])
                                        return false;
                                    }
                                    return true;
                             }';
                       
                           echo'console.log(e,arr);
                           if(b == "10987654321" || fn())
                            {
                                correct();
                            }
                            else
                              alert("Oops! something went wrong here.")';
                       
                      
                    }
                    else if($lesson == 5)
                    {
                        echo 'var b = unescape(xhttp.responseText);';
                        echo 'var arr = ["0","Odd","odd"];';
                        echo 'function fn()
                             {    
                                for(var i in arr)
                                    {
                                      if( b.indexOf(arr[i]) > -1 )
                                        return true;
                                    }
                                    return false;
                             }
                           if(fn())
                            {
                                correct();
                                window.location.url = "Congrats.html"
                            }
                            else
                              alert("Oops! something went wrong here.")';
                    }
                    
                  echo '}
                        else 
                            alert("Error");
                        }
                        xhttp.open("GET", "compile.php?lang='.$_GET["lang"].'&name="+escape(text.value), true);
                        xhttp.send();
                    }';
             
                    ?>
            }
		</script>
    </body>
</html>
