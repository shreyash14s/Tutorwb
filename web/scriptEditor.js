var empty, text;
empty = true;
text = document.getElementById("text");

/*
var lineObjOffsetTop = 2;

function createTextAreaWithLines(id)
{
  var el = document.createElement('DIV');
  var ta = document.getElementById(id);
  ta.parentNode.insertBefore(el,ta);
  el.appendChild(ta);
  
  el.className='textAreaWithLines';
  el.style.width = (ta.offsetWidth + 30) + 'px';
  ta.style.position = 'absolute';
  ta.style.left = '30px';
  el.style.height = (ta.offsetHeight + 2) + 'px';
  el.style.overflow='hidden';
  el.style.position = 'relative';
  el.style.width = (ta.offsetWidth + 30) + 'px';
  var lineObj = document.createElement('DIV');
  lineObj.style.position = 'absolute';
  lineObj.style.top = lineObjOffsetTop + 'px';
  lineObj.style.left = '0px';
  lineObj.style.width = '27px';
  el.insertBefore(lineObj,ta);
  lineObj.style.textAlign = 'right';
  lineObj.className='lineObj';
  var string = '';
  for(var no=1;no<200;no++){
	 if(string.length>0)string = string + '<br>';
	 string = string + no;
  }
  
  ta.onkeydown = function() { positionLineObj(lineObj,ta); };
  ta.onmousedown = function() { positionLineObj(lineObj,ta); };
  ta.onscroll = function() { positionLineObj(lineObj,ta); };
  ta.onblur = function() { positionLineObj(lineObj,ta); };
  ta.onfocus = function() { positionLineObj(lineObj,ta); };
  ta.onmouseover = function() { positionLineObj(lineObj,ta); };
  lineObj.innerHTML = string;
  
}

function positionLineObj(obj,ta)
{
  obj.style.top = (ta.scrollTop * -1 + lineObjOffsetTop + 4) + 'px';    
}
//createTextAreaWithLines('text')
*/
var lines = document.getElementById("divlines");
var txtArea = document.getElementById("text");
var cont = document.getElementById("container");
window.onload = function() {
    refreshlines();
    txtArea.onscroll = function () {
        lines.style.top = -(txtArea.scrollTop) + "px";
        return true;
    }
    txtArea.onkeyup = function () {
        refreshlines();
        return true;
    }
}

function refreshlines() {
    var nLines = txtArea.value.split("\n").length;
    lines.innerHTML = ""
    for (i=1; i<=nLines; i++) {
        lines.innerHTML = lines.innerHTML + i + "." + "<br />";
    }
    lines.style.top = -(txtArea.scrollTop) + "px";
}


