//��д����		�� 20040908
//��д��			�� 
//�޸���			�� Zerolone
//����				�� �������֮����ʾ�߿� ����XP��ťЧ��
//����				�� obj ���� state ״̬ 0Ϊ���� 1Ϊ�Ƴ�
function hl_menu(obj,state)
{
	switch (state)
	{
		case 0:
			obj.className="menuover"
			break;
		case 1:
			obj.className="menu"
			break;
	}
} 

//��д����		�� 20050106
//��д��			�� Zerolone
//����				�� ��ť����¼�, ��ת��ָ��Url
//����				�� ��ַ, ��ת��ʽ
function GoToUrl(Url, Code)
{
	if(Code==0)
		{
			window.open(Url, "_self");
		}
	else
		{
			window.open(Url, "_blank");
		}
}


//��д����		�� 20040908
//��д��			�� 
//�޸���			�� Zerolone
//����				�� ��ť����¼�, ��չ�������˵�
//����				�� ���ID		
function extendnode(TableName)
{
	var TheImg;
	TheImg		= eval("img_" + TableName);
	TableName	= eval(TableName);

	if(TableName.style.display == "none")
	{
		TableName.style.display = "";
		TheImg.src							= "images/unwrap.gif";
	}
	else
	{
		TableName.style.display = "none";
		TheImg.src							= "images/shrink.gif";
	}
}


//��д����		�� 20040908
//��д��			�� 
//�޸���			�� Zerolone
//����				�� ��ť����¼�, ��ʾ���ұߴ��ڵ�һ��TabSheet
//����				�� 
function fnClick()
{
	var oEl = event.srcElement;
	window.top.Frame_Right.AddWin(oEl.href,oEl.innerText);
}

function ffClick(Url, Text)
{
	window.top.Frame_Right.AddWin(Url,Text);
}


//��д����			�� 20061026
//��д��			�� 
//�޸���			�� Zerolone
//����				�� ѡ������ѡ��
//����				�� 
function selectalldel(){
	for(var i=0;i<document.form1.elements.length;i++){
		var e = document.all.form1.elements[i];
		if(e.name == "del[]"){
			e.checked = true;
			}
		}
}

//��д����		�� 20061026
//��д��			�� 
//�޸���			�� Zerolone
//����				�� ѡ������ѡ��
//����				�� 
function selectallissue(){
	for(var i=0;i<document.form1.elements.length;i++){
		var e = document.all.form1.elements[i];
		if(e.name == "issue[]"){
			e.checked = true;
			}
		}
}

//��д����		�� 20061110
//��д��			�� 
//�޸���			�� Zerolone
//����				�� ѡ������ѡ��
//����				�� 
function subStrr(str,len)
{
	var strlength=0;
	var newstr = "";
	for (var i=0;i<str.length;i++)
	{
		if(str.charCodeAt(i)>=1000)
			strlength += 2;
		else
			strlength += 1;
		if(strlength > len)
		{
			newstr += "...";
			break;
		}
		else
		{
			newstr += str.substr(i,1);
		}
	}
	return newstr;
}