/*
'-----------------------------------------------
'����: -----------------------------------------
'����:20041010----------------------------------
'����:������----------------------------------
'����:------------------------------------------
'-----------------------------------------------
*/
function fortable()
{

  var arr = showModalDialog("table.htm", "", "dialogWidth:250px; dialogHeight:200px; status:1;help:0");
  if (arr != null){
  var tmp=arr.split("*");
  row=tmp[0];
  col=tmp[1];
  var string;
  string="<table style='WIDTH: "+tmp[2]+"px;' border="+tmp[3]+" bgcolor="+tmp[6]+" cellspacing="+tmp[5]+" cellpadding="+tmp[4]+">";
  for(i=1;i<=row;i++){
  string=string+"<tr>";
  for(j=1;j<=col;j++){
  string=string+"<td>&nbsp;</td>";
  }
  string=string+"</tr>";
  }
  string=string+"</table>";
  content=monolith_article_body.document.body.innerHTML;
  content=content+string;
  monolith_article_body.document.body.innerHTML=content;
  }
  else monolith_article_body.focus();
}

/*
'-----------------------------------------------
'����:Zerolone----------------------------------
'����:20041010----------------------------------
'����:�����ý��--------------------------------
'����:------------------------------------------
'-----------------------------------------------
*/
function Allmedia()
{
  var arr = showModalDialog("Media.htm", "", "dialogWidth:500px; dialogHeight:200px; status:1;help:0");

  if (arr != null){
  var ss;
  ss=arr.split("*")
  Code	= ss[0];
  path	= ss[1];
  row	= ss[2];
  col	= ss[3];
  
   var string;
   if (Code=="Flash")
	{
	   string="<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0' width="+row+" height="+col+"><param name='movie' value="+path+"><param name='quality' value='high'></object>";
	   monolith_article_body.document.body.innerHTML += string;
	}
   else if (Code=="MediaPlayer")
	{
	   string="<object classid='clsid:22D6F312-B0F6-11D0-94AB-0080C74C7E95' width="+row+" height="+col+"><param name=Filename value="+path+"><param name='BufferingTime' value='5'><param name='AutoSize' value='-1'><param name='AnimationAtStart' value='-1'><param name='AllowChangeDisplaySize' value='-1'><param name='ShowPositionControls' value='0'><param name='TransparentAtStart' value='1'><param name='ShowStatusBar' value='1'></object>";
	   monolith_article_body.document.body.innerHTML += string;
	}
   else if (Code=="RealPlayer")
	{
	   string="<object classid='clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA' width="+row+" height="+col+"><param name='CONTROLS' value='ImageWindow'><param name='CONSOLE' value='Clip1'><param name='AUTOSTART' value='-1'><param name=src value="+path+"></object><br><object classid='clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA'  width="+row+" height=60><param name='CONTROLS' value='ControlPanel,StatusBar'><param name='CONSOLE' value='Clip1'></object>";
	   monolith_article_body.document.body.innerHTML += string;
	}
 }
 else monolith_article_body.focus();
}

/*
'-----------------------------------------------
'����: -----------------------------------------
'����:20041010----------------------------------
'����:����ͼƬ���ϴ�ͼƬ�������Ѿ��ϴ�ͼƬ------
'����:------------------------------------------
'-----------------------------------------------
*/
function pic()
{
  var arr = showModalDialog("insertpic.php", "", "dialogWidth:510px; dialogHeight:192px; status:1;help:0");
  
  if (arr != null)
	  {
	  var ss;
	  ss=arr.split("*");
	  isrc		= ss[0];
	  ialt		= ss[1];
	  iborder	= ss[2];
	  ialign	= ss[3];
	  istyle	= ss[4];
	  
	  if (isrc=="UpLoadPic")
	  {
	    monolith_article_body.document.body.innerHTML=monolith_article_body.document.body.innerHTML + ialt;
	  }
	  else
	  {
		  var str1;
		  str1="<img src='"+isrc+"' alt='"+ialt+"'"
		  str1=str1+" border='"+iborder+"' align='"+ialign+"' style='"+istyle+"'"
		  str1=str1+">"
		  monolith_article_body.document.body.innerHTML+=str1;
	  }
		}
  else monolith_article_body.focus();
}

function cleanHtml()
{
  var fonts = monolith_article_body.document.body.all.tags("FONT");
  var curr;
  for (var i = fonts.length - 1; i >= 0; i--) {
    curr = fonts[i];
    if (curr.style.backgroundColor == "#ffffff") curr.outerHTML	= curr.innerHTML;
  }
}

function Page()
{
  var str1;
  str1="[---��ҳ---]";
  monolith_article_body.document.body.innerHTML+=str1;
}


function help()
{
    var helpmess;
    helpmess="---------------��д����---------------\r\n\r\n"+
         "1.�벻Ҫ������Σ���ԵĽű���\r\n\r\n"+
         "2.���Ҫ��дԴ���룬��ѡ��\r\n\r\n"+
         "���鿴HTMLԴ������д.\r\n\r\n"+
         "3.��Ҫ���Լ�����,���ܿ�Ч��.\r\n\r\n"+
         "4.�����дjs��������Ҫ�������д.\r\n\r\n";
    alert(helpmess);
}

function insertcode()
{
	var str1;
	str1='<table align="center" border="1" width="90%" bgcolor="#EFEFEF" bordercolor="#BDBABD" cellspacing="0" cellpadding="0"><tr><td><table border="0" width="100%" cellspacing="5" cellpadding="5"><tr><td width="10"></td><td>[�����������]</td></tr></table></td></tr></table>';
	frames.monolith_article_body.focus();//ʹ id Ϊobj�Ķ����Ϊ��ǰ������� ,����ѡ������
	frames.monolith_article_body.document.selection.createRange().pasteHTML(str1) ;
}

function insertnote()
{
	var str1;
	str1='<table align="center" border="1" width="90%" bgcolor="#FFFBE7" bordercolor="#BDBABD" cellspacing="0" cellpadding="0"><tr><td><table border="0" width="100%" cellspacing="5" cellpadding="5"><tr><td width="26" valign="top"><img src="images/note.png" alt="ע��"></td><td>[��������ע������]</td></tr></table></td></tr></table>';
	frames.monolith_article_body.focus();
	frames.monolith_article_body.document.selection.createRange().pasteHTML(str1) ; 
}

function insertimportant()
{
	var str1;
	str1='<table align="center" border="1" width="90%" bgcolor="#FFFBE7" bordercolor="#BDBABD" cellspacing="0" cellpadding="0"><tr><td><table border="0" width="100%" cellspacing="5" cellpadding="5"><tr><td width="26" valign="top"><img src="images/important.png" alt="��Ҫ"></td><td>[����������Ҫ����]</td></tr></table></td></tr></table>';
	frames.monolith_article_body.focus();
	frames.monolith_article_body.document.selection.createRange().pasteHTML(str1) ; 
}

function inserttip()
{
	var str1;
	str1='<table align="center" border="1" width="90%" bgcolor="#FFFBE7" bordercolor="#D6D3B5" cellspacing="0" cellpadding="0"><tr><td><table border="0" width="100%" cellspacing="5" cellpadding="5"><tr><td width="26" valign="top"><img src="images/tip.png" alt="��ʾ"></td><td>[����������ʾ����]</td></tr></table></td></tr></table>';
	frames.monolith_article_body.focus();
	frames.monolith_article_body.document.selection.createRange().pasteHTML(str1) ; 
}

function insertwarning()
{
	var str1;
	str1='<table align="center" border="1" width="90%" bgcolor="#FFFBE7" bordercolor="#D6D3B5" cellspacing="0" cellpadding="0"><tr><td><table border="0" width="100%" cellspacing="5" cellpadding="5"><tr><td width="26" valign="top"><img src="images/warning.png" alt="��ʾ"></td><td>[�������뾯������]</td></tr></table></td></tr></table>';
	frames.monolith_article_body.focus();
	frames.monolith_article_body.document.selection.createRange().pasteHTML(str1) ; 
}

function insertcaution()
{
	var str1;
	str1='<table align="center" border="1" width="90%" bgcolor="#FFFBE7" bordercolor="#D6D3B5" cellspacing="0" cellpadding="0"><tr><td><table border="0" width="100%" cellspacing="5" cellpadding="5"><tr><td width="26" valign="top"><img src="images/caution.png" alt="��ʾ"></td><td>[����С����ʾ����]</td></tr></table></td></tr></table>';
	frames.monolith_article_body.focus();
	frames.monolith_article_body.document.selection.createRange().pasteHTML(str1) ; 
}



//Function to format text in the text box
function formattext(command, option){
  	frames.monolith_article_body.document.execCommand(command, true, option);
  	frames.monolith_article_body.focus();
}

/*
'-----------------------------------------------
'����:Discuz��----------------------------------
'����:------------------------------------------
'����:���д���----------------------------------
'����:------------------------------------------
'-----------------------------------------------
*/
function runCode(obj) {
	var winname = window.open('', "_blank", '');
	winname.document.open('text/html', 'replace');
	winname.document.writeln(obj.value.replace(/t extarea/g, "textarea"));
	winname.document.close();
}


function setMode(newMode)
{
  bTextMode = newMode;
  var cont;
  if (bTextMode) {
    cleanHtml();
    cleanHtml();

    cont=frames.monolith_article_body.document.body.innerHTML;
    frames.monolith_article_body.document.body.innerText=cont;
  } else {
    cont=frames.monolith_article_body.document.body.innerText;
    frames.monolith_article_body.document.body.innerHTML=cont;
  }
  frames.monolith_article_body.focus();
}