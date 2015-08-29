unit ClientFunction;

interface

uses IniFiles, SysUtils, StrUtils, Classes, Windows, ShlObj, PerlRegEx, Forms;

procedure SaveIni(Datatext, header: string);
function GetIni(header: string): string;
procedure Log(LogStr: string);


//�滻ͼƬ
function CatchPic(OldStr: Ansistring; PicStringList: TStringList): TStringList;

{
//�����ļ�������
function CopyToCache(FileName_Client: string; i: integer): string;

//�ϴ��ļ���������
function UploadFile(FileName_Cache: string):string;
}

//����ַ�������
function CheckString(CheckStr: string; MaxLen: Integer): string;

//ѡ���ļ���
//function BrowseDir(const OwnerHandle: HWND; const Caption: string; const Root: WideString): string;

//////////////////////////////////
//���ã������滻�ַ���          //
//������strSource   Դ�ַ���    //
//������regex       �������ʽ  //
//���ߣ�Zerolone                //
//����ʱ�䣺2007-06-30          //
//////////////////////////////////
//function MRegeReplace(strSource: string; strlstRegex: TStringList; strlstReplace: TStringList): string;

//////////////////////////////////
//���ã���ʾһ�����ȴ���        //
//������Title      ����         //
//������Position   ����ֵ       //
//������Count      ����ֵ       //
//���ߣ�Zerolone                //
//����ʱ�䣺2008-05-25          //
//////////////////////////////////
procedure ShowProgress(Title: string; Position: Integer; Count: Integer);

////////////////////////////////////
//���ã�ͬ�������                //
//������str_Content      ͬ������ //
//���ߣ�Zerolone                  //
//����ʱ�䣺2008��5��25��23:17:19 //
////////////////////////////////////
procedure SyncServer(str_Content: string);

////////////////////////////////////
//���ã���ʾһ��Calendar          //
//������id      ���              //
//���ߣ�Zerolone                  //
//����ʱ�䣺2008��5��26��14:13:19 //
////////////////////////////////////
procedure ShowCalendar(id: Integer);

////////////////////////////////////
//���ã��޸�һ��Calendar          //
//������id      ���              //
//���ߣ�Zerolone                  //
//����ʱ�䣺2008��5��26��14:13:19 //
////////////////////////////////////
procedure EditCalendar(id: Integer);


implementation

uses MainFrm, ProgressFrm, ShowCalendarFrm, AddCalendarFrm,

  //ShowMessage�õ�
  Dialogs;

{
var
  FPath: string;
}

procedure SaveIni(Datatext, header: string);
var
  ServerIni: TIniFile;
begin
  ServerIni := TIniFile.Create(ExtractFilePath(ParamStr(0)) + 'setting.ini');
  ServerIni.WriteString('Catch', header, Datatext);
  ServerIni.UpdateFile;
  ServerIni.Free;
end;

function GetIni(header: string): string;
var
  ServerName: string;
  ServerIni: TIniFile;
begin
  ServerIni := TIniFile.Create(ExtractFilePath(ParamStr(0)) + 'setting.ini');
  ServerName := ServerIni.ReadString('Catch', header, header);

  ServerIni.Free;
  result := ServerName;
end;

procedure Log(LogStr: string);
var
  F: textfile;
  FileName: string;
begin
  if (MainForm.chkLog.Checked) then
  begin
    FileName := 'Log.log';

    assignfile(F, FileName);
    //    if FileExists(FileName) then
    Append(F);
    //    else
    //      ReWrite(F);

    Writeln(F, FormatDateTime('yyyy-mm-dd hh:mm:ss', now) + '|' + LogStr);
    closefile(F);
  end;
end;


function CatchPic(OldStr: Ansistring; PicStringList: TStringList): TStringList;
var
  OldStrLen, CutStringLen, s: Integer;
  CutString: string;
begin
  //����<IMG
  OldStrLen := Length(OldStr) + 1;
  CutString := '<IMG';
  CutStringLen := Length(CutString);
  s := pos(CutString, OldStr);
  if s = 0 then
    result := PicStringList
  else
  begin
    OldStr := RightStr(OldStr, OldStrLen - s - CutStringLen);

    //����src="
    OldStrLen := Length(OldStr) + 1;
    CutString := 'SRC="';
    CutStringLen := Length(CutString);
    s := pos(CutString, OldStr);
    if s = 0 then
      result := PicStringList
    else
    begin
      OldStr := RightStr(OldStr, OldStrLen - s - CutStringLen);

      //����ͼƬ "
      OldStrLen := Length(OldStr) + 1;
      CutString := '"';
      CutStringLen := Length(CutString);
      s := pos(CutString, OldStr);
      if s = 0 then
        result := PicStringList
      else
      begin
        {
          if ImgList = '' then
            ImgList := LeftStr(OldStr, s - 1)
          else
            begin
              ImgList := ImgList + '|' + LeftStr(OldStr, s - 1);
            end;
            }
        PicStringList.Add(LeftStr(OldStr, s - 1));
        OldStr := RightStr(OldStr, OldStrLen - s - CutStringLen);
        result := CatchPic(OldStr, PicStringList);
      end;
    end;
  end;
end;

{
function CopyToCache(FileName_Client: string; i: integer): string;
var
  FileName_Cache, FileExt_Cache: string;
begin
  try
    if FileExists(FileName_Client) then
      begin
        FileName_Cache := FormatDateTime('yyyymmddhhmmss', now);
        FileName_Cache := FileName_Cache + IntToStr(i);
        FileExt_Cache := StringReplace(ExtractFileExt(FileName_Client), '.', '', [rfReplaceAll]);
        FileName_Cache := FileName_Cache + '.' + FileExt_Cache;
        FileName_Cache := ClientSettingForm.Edt_CacheFolder.Text + '\' + FileExt_Cache + '\' + FileName_Cache;

        Log('���ƣ�' + FileName_Client + '������' + FileName_Cache);

        if CopyFile(Pchar(FileName_Client), PChar(FileName_Cache), true) then
          Log('�ɹ���')
        else
          Log('ʧ�ܣ�');
        result := FileName_Cache;

      end
    else
      Log('�ļ������ڣ�' + FileName_Client);
  except
    Log('���� ' + FileName_Client + '��' + FileName_Cache + 'ʧ�ܣ�');
  end;
end;


function UploadFile(FileName_Cache: string):string;
var
  FileName_Server, FileExt_Server: string;
begin
  ClientSettingForm.Btn_Connect.Click;

  try
    FileExt_Server := StringReplace(ExtractFileExt(FileName_Cache), '.', '', [rfReplaceAll]);
    FileName_Server := ClientSettingForm.Edt_PicFolder.Text + '/' + FileExt_Server + '/' + ExtractFileName(FileName_Cache);

    ClientSettingForm.IdFTP1.Put(FileName_Cache, FileName_Server, false);
    Log('�ϴ� ' + FileName_Cache + '��' + FileName_Server + '�ɹ���');
    result := FileName_Server;
  except
    Log('�ϴ� ' + FileName_Cache + '��' + FileName_Server + 'ʧ�ܣ�');
  end;

end;
}


function CheckString(CheckStr: string; MaxLen: Integer): string;
var CheckStrLen: Integer;
begin
  CheckStrLen := Length(CheckStr);
  if CheckStrLen > MaxLen then
    result := LeftStr(CheckStr, MaxLen)
  else
    result := CheckStr;
end;

{
//��ƽ̨Ŀ¼���

function BrowseCallBackProc(HWND: HWND; uMsg: UINT; lParam: Cardinal; lpData: Cardinal): integer; stdcall;
begin
  if uMsg = BFFM_INITIALIZED then
    result := SendMessage(HWND, BFFM_SETSELECTION, Ord(TRUE), Longint(PChar(FPath)))
  else
    result := 1
end;

{
function BrowseDir(const OwnerHandle: HWND; const Caption: string; const Root: WideString): string;
var
  BI: BROWSEINFO;
  IDLt: pointer;
begin
  fillchar(BI, sizeof(BROWSEINFO), 0);
  BI.hWndOwner := OwnerHandle;
  BI.iImage := 0;
  BI.lParam := 1;
  BI.lpfn := nil;
  BI.lpszTitle := PAnsiChar(Caption);
  BI.ulFlags := BIF_RETURNONLYFSDIRS;
  FPath := Root;
  BI.lpfn := @BrowseCallBackProc;
  BI.lParam := BFFM_INITIALIZED;
  IDLt := SHBrowseForFolder(BI);
  if Assigned(IDLt) then
  begin
    setlength(result, MAX_PATH);
    SHGetPathFromIDList(IDLt, PChar(result));
  end;
end;
}
          {
function MRegeReplace(strSource: string; strlstRegex: TStringList; strlstReplace: TStringList): string;
var
  LenRegex, i: Integer;
  strTmp: string;
begin
  LenRegex := strlstRegex.Count;
  strTmp := strSource;
  RegexReplace := TPerlRegEx.Create(nil);
  for i := 0 to LenRegex - 1 do
  begin
    RegexReplace.Regex := strlstRegex.Strings[i];
    RegexReplace.Replacement := strlstReplace.Strings[i];
    RegexReplace.Subject := strTmp;
    RegexReplace.ReplaceAll;
    strTmp := RegexReplace.Subject;
  end;
  {
    RegexReplace := TPerlRegEx.Create(nil);
    RegexReplace.Regex := '<div class="tagad">[\s\S]*?</div>';
    RegexReplace.Replacement := '';
    RegexReplace.Subject := strTmp;
    RegexReplace.ReplaceAll;
    strTmp := RegexReplace.Subject;
  }
{
  result := strTmp;
end;
}


procedure ShowProgress(Title: string; Position: Integer; Count: Integer);
var
  str_msg: string;
begin
  if (Title <> '') then
    ProgressForm.Caption := Title;

  ProgressForm.Show;
  ProgressForm.ProgressBar1.Position := ProgressForm.ProgressBar1.Position + Position;
  ProgressForm.Label1.Caption := IntToStr(ProgressForm.ProgressBar1.Position);

  if (Position = 100) then
  begin
    str_msg := '��ȡ��������ݳɹ�����' + PAnsiChar(IntToStr(Count)) + '����¼��';
    Application.MessageBox(PChar(str_msg), 'MGW���³ɹ���', MB_OK + MB_ICONASTERISK + MB_DEFBUTTON1 + MB_APPLMODAL);
    ProgressForm.Hide;
  end;
end;

procedure SyncServer(str_Content: string);
var
  //�ָ��õ�Regex
  RegexSplit: TPerlRegEx;

  //�ָ��
  str_split: TStringList;
  int_split_count: Integer;

  //
  i: Integer;
begin
  //�ָ�str_Content;
  str_split := TStringList.Create;
  try
    RegexSplit := TPerlRegEx.Create(nil);
    RegexSplit.RegEx := '@split_str_for_mgw@';
    RegexSplit.Subject := str_Content;
    RegexSplit.Split(str_split, 0);

    int_split_count := str_split.Count;

    //��ʼ��ProgressBar
    ShowProgress('ͬ�����������-MGW', -100, 0);

    //����ProgressBar�� Position
    int_position := 100 div (int_split_count - 1);
    for i := 0 to int_split_count - 2 do
    begin
      //�ύ���ݿ�
      MainForm.ADOQuery1.Close;
      MainForm.ADOQuery1.SQL.Text := str_split.Strings[i];
      MainForm.ADOQuery1.ExecSQL;

      ShowProgress('', int_position, 0);
      Application.ProcessMessages;
    end;
    ShowProgress('', 100, int_split_count - 1);
  except
    Application.MessageBox('����ʧ�ܣ�', '���ݿ�����', MB_OK + MB_ICONHAND + MB_DEFBUTTON1 + MB_APPLMODAL);
  end;
end;


procedure ShowCalendar(id: Integer);
begin
  //�������ݿ�
  MainForm.btn0.Click;
  //-------------------0------1--------2-----------3-------------4------------5
  str_sql := 'SELECT [id], [title], [import], [createtime], [modifytime], [content]  FROM [mgw_calendar] WHERE [id]=' + IntToStr(id);
  MainForm.ADOQuery1.Close;
  MainForm.ADOQuery1.SQL.Text := str_sql;
  MainForm.ADOQuery1.Open;
  if ((not MainForm.ADOQuery1.Eof) or (not MainForm.ADOQuery1.Bof)) then
  begin
    try
      ShowCalendarForm.lbl_id.Caption := IntToStr(id);
      ShowCalendarForm.lbl_title.Caption := MainForm.ADOQuery1.Fields[1].AsString;
      ShowCalendarForm.lbl_import.Caption := MainForm.ADOQuery1.Fields[2].AsString;
      ShowCalendarForm.lbl_createtime.Caption := MainForm.ADOQuery1.Fields[3].AsString;
      ShowCalendarForm.lbl_modifytime.Caption := MainForm.ADOQuery1.Fields[4].AsString;
      //ShowCalendarForm.DHTMLEdit1.DOM.body.innerHTML:=MainForm.ADOQuery1.Fields[5].AsString;
      ShowCalendarForm.Memo1.Text:=MainForm.ADOQuery1.Fields[5].AsString;
      ShowCalendarForm.Timer1.Enabled:=True;
    except
      Application.MessageBox('���ݿ��ѯʧ�ܣ�', '���ݿ�����', MB_OK + MB_ICONHAND + MB_DEFBUTTON1 + MB_APPLMODAL);
    end;
  end;

  ShowCalendarForm.Color := RGB(255, 238, 238);
  ShowCalendarForm.ShowModal;
end;


procedure EditCalendar(id: Integer);
begin
  //�������ݿ�
  MainForm.btn0.Click;
  //-------------------0------1--------2----------3
  str_sql := 'SELECT [id], [title], [import], [content]  FROM [mgw_calendar] WHERE [id]=' + IntToStr(id);
  MainForm.ADOQuery1.Close;
  MainForm.ADOQuery1.SQL.Text := str_sql;
  MainForm.ADOQuery1.Open;
  if ((not MainForm.ADOQuery1.Eof) or (not MainForm.ADOQuery1.Bof)) then
  begin
    try
      AddCalendarForm.lbl_id.Caption := IntToStr(id);
      AddCalendarForm.Edt_title.Text := MainForm.ADOQuery1.Fields[1].AsString;
      AddCalendarForm.cbb_import.ItemIndex:= MainForm.ADOQuery1.Fields[2].AsInteger-1;
      //ShowCalendarForm.DHTMLEdit1.DOM.body.innerHTML:=MainForm.ADOQuery1.Fields[3].AsString;
      AddCalendarForm.Memo1.Text:=MainForm.ADOQuery1.Fields[3].AsString;
      AddCalendarForm.Memo1.Text:=AddCalendarForm.Memo1.Text + '<hr color="#999999" size=1>�༭ʱ�䣺'+FormatDateTime('yyyy-mm-dd hh:mm:ss', Now);
      AddCalendarForm.Timer1.Enabled:=True;
      AddCalendarForm.btn_add.Hide;
      AddCalendarForm.btn_edt.Show;
      AddCalendarForm.Caption:=' �����ƻ����� >> �����ƻ��޸�';
      AddCalendarForm.ShowModal;
    except
      Application.MessageBox('���ݿ��ѯʧ�ܣ�', '���ݿ�����', MB_OK + MB_ICONHAND + MB_DEFBUTTON1 + MB_APPLMODAL);
    end;
  end
  else
      Application.MessageBox('�����ݲ����ڣ��볢���������ݣ�', '���ݿ��ѯ', MB_OK + MB_ICONHAND + MB_DEFBUTTON1 + MB_APPLMODAL);

end;
end.
