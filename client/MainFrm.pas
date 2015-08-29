unit MainFrm;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, StdCtrls, IdBaseComponent, IdComponent, IdTCPConnection,
  IdTCPClient, IdHTTP, DB, ADODB, PerlRegEx, DateUtils;

type
  TMainForm = class(TForm)
    btnConnectServer: TButton;
    chkLog: TCheckBox;
    mmo1: TMemo;
    edt_server_url: TEdit;
    btnSaveini: TButton;
    IdHTTP1: TIdHTTP;
    btn1: TButton;
    btn2: TButton;
    btn3: TButton;
    btn4: TButton;
    btn5: TButton;
    btn0: TButton;
    ADOQuery1: TADOQuery;
    ADOConn: TADOConnection;
    PerlRegEx1: TPerlRegEx;
    Edit1: TEdit;
    Edit2: TEdit;
    Button2: TButton;
    Button3: TButton;
    Button4: TButton;
    btn_sync: TButton;
    btn11: TButton;
    btn12: TButton;
    btn13: TButton;
    btn14: TButton;
    btn15: TButton;
    btn51: TButton;
    btn52: TButton;
    procedure FormCreate(Sender: TObject);
    procedure btnConnectServerClick(Sender: TObject);
    procedure btnSaveiniClick(Sender: TObject);
    procedure btn0Click(Sender: TObject);
    procedure btn1Click(Sender: TObject);
    procedure btn2Click(Sender: TObject);
    procedure btn3Click(Sender: TObject);
    procedure Button2Click(Sender: TObject);
    procedure Button3Click(Sender: TObject);
    procedure Button4Click(Sender: TObject);
    procedure btn_syncClick(Sender: TObject);
    procedure btn11Click(Sender: TObject);
    procedure btn12Click(Sender: TObject);
    procedure btn13Click(Sender: TObject);
    procedure btn14Click(Sender: TObject);
    procedure btn15Click(Sender: TObject);
    procedure btn4Click(Sender: TObject);
    procedure btn5Click(Sender: TObject);
    procedure btn51Click(Sender: TObject);
    procedure btn52Click(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  MainForm: TMainForm;

  //�����·��
  str_server_url: string;

  //��ȡ���������
  str_get_url: string;

  //�Ƿ�д����־
  ischkLog: string;

  //�ַ����������
  strConnStr: string;

  //���ݿ����
  ReCount: Integer;

  //
  str_Content: string;

  //����SID
  Max_SID: Integer;

  //ProgressBar Position
  int_position: Integer;

  //Sql��ѯ�ַ���
  str_sqlR, str_sqlL, str_sql: string;

  //�ͻ��˵�sid�� �ͻ��˵�modifytime, ����˵�modifytime
  str_client_id, str_client_modifytime, str_server_modifytime: string;

  //�ָ��õ�Regex
  RegexSplit_sid: TPerlRegEx;
  RegexSplit_client_modifytime: TPerlRegEx;
  RegexSplit_server_modifytime: TPerlRegEx;

  //�ָ��
  str_split_sid: TStringList;
  str_split_client_modifytime: TStringList;
  str_split_server_modifytime: TStringList;
  int_split_sid_count: Integer;

  //ͬ��ID
  //�ͻ���ͬ��������˵�id
  str_client_server: string;
  //�����ͬ�����ͻ��˵�id
  str_server_client: string;

  //
  int_CompareDateTime: Integer;
  str_CompareDateTime: string;

  //sql�ַ���
  strlst_sql: TStringList;
implementation

uses ClientFunction, CalendarFrm, ProgressFrm;

{$R *.dfm}

procedure TMainForm.FormCreate(Sender: TObject);
begin
  //ϵͳ������Ĭ������
  begin
    //��ʼ���ؼ�
    mmo1.Clear;

    //��ȡini
    try
      //////////////////////
      // //
      //////////////////////
      //����˽ӿ�·��
      edt_server_url.Text := GetIni('edt_server_url');
      str_server_url := edt_server_url.Text;

      //����վ
      //edtWebSite.Text := GetIni('edtWebSite');


      //�Ƿ�д����־
      ischkLog := GetIni('chkLog');
      if (ischkLog = '1') then
        chkLog.Checked := True;

      //////////////
      //���ݿ�����//
      //////////////
      {
      Edt_DBIP.Text := GetIni('DBIP');
      Edt_DBUser.Text := GetIni('DBUser');
      Edt_DBPassword.Text := GetIni('DBPassword');
      Edt_DBDatabase.Text := GetIni('DBDatabase');
      }
      {
      //�ϴ�����
      Edt_Website.Text := GetIni('Website');
      Edt_PicFolder.Text := GetIni('PicFolder');
      }
    except
      Log('��ȡ�����ļ� setting.ini ʧ�ܣ�');
      Application.MessageBox('��ȡ�����ļ� setting.ini ʧ�ܣ�', '��ȡ�����ļ�', MB_OK + MB_ICONEXCLAMATION + MB_APPLMODAL);
    end;
  end;

end;

procedure TMainForm.btnConnectServerClick(Sender: TObject);
var
  //��ȡ����
  str_Content: string;
begin
  //���ӷ���˽ӿ�
  //����Ϊ��http://localhost/client.php

  str_server_url := edt_server_url.Text;

  //��ȡ���������
  try
    str_Content := IdHTTP1.Get(str_server_url + '?checkconnect=true');
    mmo1.Clear;
    mmo1.Text := str_Content;
    if (str_Content = 'true') then
    begin
      Application.MessageBox('���ӷ������ɹ���', '���ӷ�����', MB_OK + MB_ICONEXCLAMATION + MB_APPLMODAL);
    end
    else
    begin
      Application.MessageBox('���ӷ�����ʧ�ܣ��������ã�', '���ӷ�����', MB_OK + MB_ICONEXCLAMATION + MB_APPLMODAL);
    end;

  except
    Application.MessageBox('������ļ������ڣ��������ã�', '���ӷ�����', MB_OK + MB_ICONEXCLAMATION + MB_APPLMODAL);

  end;





  //��ȡini����

end;

procedure TMainForm.btnSaveiniClick(Sender: TObject);
begin
  try
    ////////////////
    //ץȡ��ַ����//
    ////////////////
    //��ַ����
    SaveIni(edt_server_url.Text, 'edt_server_url');

    //SaveIni(edtWebSite.Text, 'edtWebSite');

    //�Ƿ��¼��־
    if (chkLog.Checked) then
      SaveIni('1', 'chkLog')
    else
      SaveIni('0', 'chkLog');

    //////////////
    //���ݿⲿ��//
    //////////////
    {
    SaveIni(Edt_DBUser.Text, 'DBUser');
    SaveIni(Edt_DBPassword.Text, 'DBPassword');
    SaveIni(Edt_DBIP.Text, 'DBIP');
    SaveIni(Edt_DBDatabase.Text, 'DBDatabase');
     }

    Log('Ini���ñ���ɹ���');
    Application.MessageBox('Ini���ñ���ɹ���', '���������ļ�', MB_OK + MB_ICONEXCLAMATION + MB_APPLMODAL);
  except
    Log('����ʧ�ܣ������ļ� setting.ini �Ƿ��д');
    Application.MessageBox('���������ļ� setting.ini ʧ�ܣ������ļ� setting.ini �Ƿ��д', '���������ļ�', MB_OK + MB_ICONEXCLAMATION + MB_APPLMODAL);

  end;
end;

procedure TMainForm.btn0Click(Sender: TObject);
begin
  //0���������ݿ�
  try
    if not ADOConn.Connected then
      ADOConn.ConnectionString := 'Provider=Microsoft.Jet.OLEDB.4.0;Data Source=' + ExtractFilepath(Application.ExeName) + '\mgw.mdb;Persist Security Info=False';
    ADOConn.Open;
    Log('���ݿ����ӳɹ���');
    mmo1.Text := '���ݿ����ӳɹ���' + #13 + #10 + mmo1.Text;
    
  except
    Log('���ݿ�����ʧ�ܣ�');
    mmo1.Text := '���ݿ�����ʧ�ܣ�' + #13 + #10 + mmo1.Text;
    Application.MessageBox('���ݿ�����ʧ�ܣ�', '���ݿ�����', MB_OK + MB_ICONHAND + MB_DEFBUTTON1 + MB_APPLMODAL);
  end;
end;

procedure TMainForm.btn1Click(Sender: TObject);
begin
  //�������ݿ�
  btn0.click;
  //1��ͬ��SID��Ϊ0�ļ�¼

  //1.1����ȡ����SID��Ϊ0���б�
  btn11.click;

  //1.2����ȡ�������Ӧ���
  btn12.click;

  //1.3���Ƚ�str_client_modify �� str_server_modify
  btn13.click;

  //1.4�������ͬ���ͻ���
  btn14.click;

  //1.5���ͻ���ͬ�������
  btn15.click;
end;

procedure TMainForm.btn2Click(Sender: TObject);
begin
  //2����ȡ����SID
  ADOQuery1.Close;
  ADOQuery1.SQL.Text := 'SELECT MAX([sid]) as [max_sid] FROM [mgw_calendar] WHERE [sid]<>0';
  ADOQuery1.Open;
  Max_SID := ADOQuery1.FieldByName('max_sid').AsInteger;
  ADOQuery1.Close;

  mmo1.Text := '����SIDΪ��' + IntToStr(Max_SID) + #13 + #10 + mmo1.Text;
end;

procedure TMainForm.btn3Click(Sender: TObject);
var
  str_get_url: string;
begin
  //3����ȡ����˴������SID��ID������

  //�����·��
  str_get_url := str_server_url + '?sid=' + IntToStr(Max_SID);
  try
    str_Content := IdHTTP1.Get(str_get_url);
    Log('��ȡ' + str_get_url + '���ݳɹ���');
  except
    Log('��ȡ' + str_get_url + '����ʧ�ܣ�');
    Application.MessageBox('��ȡ���������ʧ�ܣ���������������ã�', '��ȡ���������', MB_OK + MB_ICONHAND + MB_DEFBUTTON1 + MB_APPLMODAL);
  end;

  SyncServer(str_Content);
end;

procedure TMainForm.Button2Click(Sender: TObject);
begin
  CalendarForm.Button1.Click;
  CalendarForm.ShowModal;
end;

procedure TMainForm.Button3Click(Sender: TObject);
begin
  //
  ProgressForm.Show;

  //ShowProgress(10);
end;

procedure TMainForm.Button4Click(Sender: TObject);

begin
  //




end;

procedure TMainForm.btn_syncClick(Sender: TObject);
begin
  //0���������ݿ�
  btn0.click;


  //2����ȡ����SID
  btn2.click;


  //3����ȡ����˴������SID��ID������
  btn3.click;


end;

procedure TMainForm.btn11Click(Sender: TObject);
var
  i:Integer;
begin
  //1.1����ȡ����SID��Ϊ0���б�
  str_client_id := '';
  //-------------------0--------1
  str_sql := 'SELECT [sid], [modifytime] FROM [mgw_calendar] WHERE [sid]<>0';
  ADOQuery1.Close;
  ADOQuery1.SQL.Text := str_sql;
  ADOQuery1.Open;
  if ((not ADOQuery1.Eof) or (not ADOQuery1.Bof)) then
  begin
    ReCount := ADOQuery1.recordcount;
    try
      for i := 1 to ReCount do
      begin
        if (str_client_id = '') then
        begin
          str_client_id := ADOQuery1.Fields[0].AsString;
          str_client_modifytime := ADOQuery1.Fields[1].AsString;
        end
        else
        begin
          str_client_id := str_client_id + ',' + ADOQuery1.Fields[0].AsString;
          str_client_modifytime := str_client_modifytime + ',' + ADOQuery1.Fields[1].AsString;
        end;
        ADOQuery1.Next;
      end;
      mmo1.Text := mmo1.Text + #13 + #10 + str_client_id;
      mmo1.Text := mmo1.Text + #13 + #10 + '---------------';
      mmo1.Text := mmo1.Text + #13 + #10 + str_client_modifytime;

    except
      Application.MessageBox('���ݿ��ѯʧ�ܣ�', '���ݿ�����', MB_OK + MB_ICONHAND + MB_DEFBUTTON1 + MB_APPLMODAL);
    end;
  end
  else
  begin
    Application.MessageBox('������SID��Ϊ0�ļ�¼��', '���ݿ�����', MB_OK + MB_ICONHAND + MB_DEFBUTTON1 + MB_APPLMODAL);
  end;
  ADOQuery1.Close;
end;

procedure TMainForm.btn12Click(Sender: TObject);
begin
  //1.2����ȡ�������Ӧ���
  try
    str_server_modifytime := IdHTTP1.Get(str_server_url + '?modifyid=' + str_client_id);
    mmo1.Text := mmo1.Text + #13 + #10 + str_server_modifytime;
  except
    Application.MessageBox('��ȡ���������ʧ�ܣ�', '��ȡ���������', MB_OK + MB_ICONHAND + MB_DEFBUTTON1 + MB_APPLMODAL);
  end;
end;

procedure TMainForm.btn13Click(Sender: TObject);
var
  i:Integer;
begin
  //1.3���Ƚ�str_client_modify �� str_server_modify
  str_split_sid := TStringList.Create;
  str_split_client_modifytime := TStringList.Create;
  str_split_server_modifytime := TStringList.Create;
  try
    RegexSplit_sid := TPerlRegEx.Create(nil);
    RegexSplit_sid.RegEx := ',';
    RegexSplit_sid.Subject := str_client_id;
    RegexSplit_sid.Split(str_split_sid, 0);

    RegexSplit_client_modifytime := TPerlRegEx.Create(nil);
    RegexSplit_client_modifytime.RegEx := ',';
    RegexSplit_client_modifytime.Subject := str_client_modifytime;
    RegexSplit_client_modifytime.Split(str_split_client_modifytime, 0);

    RegexSplit_server_modifytime := TPerlRegEx.Create(nil);
    RegexSplit_server_modifytime.RegEx := ',';
    RegexSplit_server_modifytime.Subject := str_server_modifytime;
    RegexSplit_server_modifytime.Split(str_split_server_modifytime, 0);

    int_split_sid_count := str_split_sid.Count;

    str_client_server := '';
    str_server_client := '';
    for i := 0 to int_split_sid_count - 1 do
    begin
      int_CompareDateTime := CompareDateTime(StrToDateTime(str_split_client_modifytime[i]), StrToDateTime(str_split_server_modifytime[i]));
      str_CompareDateTime := '�ͻ��˵��ڷ����=';
      if (int_CompareDateTime = -1) then
      begin
        str_CompareDateTime := '�ͻ���С�ڷ����<';
        if (str_client_server = '') then
          str_client_server := str_split_sid[i]
        else
          str_client_server := str_client_server + ',' + str_split_sid[i];
      end
      else
        if (int_CompareDateTime = 1) then
        begin
          str_CompareDateTime := '�ͻ��˴��ڷ����>';
          if (str_server_client = '') then
            str_server_client := str_split_sid[i]
          else
            str_server_client := str_server_client + ',' + str_split_sid[i];
        end;

      mmo1.Text := '��ţ�' + str_split_sid[i] + '���ͻ���ʱ�䣺' + str_split_client_modifytime[i] + '�������ʱ�䣺' + str_split_server_modifytime[i] + '��' + str_CompareDateTime + #13 + #10 + mmo1.Text;

      Application.ProcessMessages;
    end;
  except
    Application.MessageBox('����ʧ�ܣ�', '���ݿ�����', MB_OK + MB_ICONHAND + MB_DEFBUTTON1 + MB_APPLMODAL);
  end;
end;

procedure TMainForm.btn14Click(Sender: TObject);
begin
  //1.4�������ͬ���ͻ���
  if (str_client_server <> '') then
  begin
    try
      str_get_url := str_server_url + '?server_client_id=' + str_client_server;
      str_Content := IdHTTP1.Get(str_get_url);
      //      mmo1.Text := str_get_url + #13 + #10 + mmo1.Text;
      //      mmo1.Text := str_Content + #13 + #10 + mmo1.Text;
    except

    end;
    if (str_Content <> '') then
      SyncServer(str_Content)
    else
      Application.MessageBox('��������Ҫ���£�', '1�����ͬ���ͻ���-MGW', MB_OK + MB_ICONASTERISK + MB_DEFBUTTON1 + MB_APPLMODAL);
  end
  else
    Application.MessageBox('��������Ҫ���£�', '�����ͬ���ͻ���-MGW', MB_OK + MB_ICONASTERISK + MB_DEFBUTTON1 + MB_APPLMODAL);

end;

procedure TMainForm.btn15Click(Sender: TObject);
var
  i:Integer;
begin
  //1.5���ͻ���ͬ�������
  if (str_server_client <> '') then
  begin
    strlst_sql := TStringList.Create;
    //--------------------0--------1----------2---------3-------------4------------5---------6
    str_sql := 'SELECT [userid], [title], [import], [createtime], [modifytime], [content], [sid] FROM [mgw_calendar] WHERE [sid] in (' + str_server_client + ')';
    ADOQuery1.Close;
    ADOQuery1.SQL.Text := str_sql;
    ADOQuery1.Open;
    if ((not ADOQuery1.Eof) or (not ADOQuery1.Bof)) then
    begin
      ReCount := ADOQuery1.recordcount;
      for i := 0 to ReCount - 1 do
      begin
        str_sql := 'UPDATE `mgw_calendar` SET ';

        //�����û�
        str_sql := str_sql + '`userid`=';
        str_sql := str_sql + ADOQuery1.Fields[0].AsString + ',';

        //����
        str_sql := str_sql + '`title`=';
        str_sql := str_sql + '''' + ADOQuery1.Fields[1].AsString + ''',';

        //�ؼ���
        str_sql := str_sql + '`import`=';
        str_sql := str_sql + ADOQuery1.Fields[2].AsString + ',';

        //�ύʱ��
        str_sql := str_sql + '`createtime`=';
        str_sql := str_sql + '''' + ADOQuery1.Fields[3].AsString + ''',';

        //�޸�ʱ��
        str_sql := str_sql + '`modifytime`=';
        str_sql := str_sql + '''' + ADOQuery1.Fields[4].AsString + ''',';

        //����
        str_sql := str_sql + '`content` = ';
        str_sql := str_sql + '''' + ADOQuery1.Fields[5].AsString + '''';

        str_sql := str_sql + ' WHERE `id`=' + ADOQuery1.Fields[6].AsString;
        str_sql := str_sql + ';';

        strlst_sql.Add('SqlStr[]=' + str_sql);
        mmo1.Text := str_sql + #13 + #10 + mmo1.Text;
        Log(str_sql);

        ADOQuery1.Next;
        Application.ProcessMessages;
        //mmo1.Text := str_sql + #13 + #10 + mmo1.Text;
      end;

      try
        IdHTTP1.Post(str_server_url, strlst_sql);
        Log('�ύ��' + str_server_url + '���ݳɹ���');
      except
        Log('�ύ��' + str_server_url + '����ʧ�ܣ�');
        Application.MessageBox('�ύ���ݵ������ʧ�ܣ���������������ã�', '��ȡ���������', MB_OK + MB_ICONHAND + MB_DEFBUTTON1 + MB_APPLMODAL);
      end;

    end
    else
      Application.MessageBox('�ͻ���û�бȷ���˸��µ����ݣ�����������Ҫ���£�', '�ͻ���ͬ�������-MGW', MB_OK + MB_ICONASTERISK + MB_DEFBUTTON1 + MB_APPLMODAL);
    ADOQuery1.Close;
  end
  else
    Application.MessageBox('�ͻ���û�бȷ���˸��µ����ݣ�����������Ҫ���£�', '�ͻ���ͬ�������-MGW', MB_OK + MB_ICONASTERISK + MB_DEFBUTTON1 + MB_APPLMODAL);

end;

procedure TMainForm.btn4Click(Sender: TObject);
var
  i:Integer;
begin
  //4���ύ�������ӵļ�¼
  strlst_sql := TStringList.Create;
  strlst_sql.Clear;
  //--------------------0--------1----------2---------3-------------4------------5---------6
  str_sql := 'SELECT [userid], [title], [import], [createtime], [modifytime], [content], [sid] FROM [mgw_calendar] WHERE [sid]=0';
  ADOQuery1.Close;
  ADOQuery1.SQL.Text := str_sql;
  ADOQuery1.Open;
  if ((not ADOQuery1.Eof) or (not ADOQuery1.Bof)) then
  begin
    ReCount := ADOQuery1.recordcount;
    for i := 0 to ReCount - 1 do
    begin
      str_sqlL := 'insert into `mgw_calendar` (';
      str_sqlR := 'values (';

      //�����û�
      str_sqlL := str_sql + '`userid`,';
      str_sqlR := str_sql + ADOQuery1.Fields[0].AsString + ',';

      //����
      str_sqlL := str_sql + '`title`,';
      str_sqlR := str_sql + '''' + ADOQuery1.Fields[1].AsString + ''',';

      //�ؼ���
      str_sqlL := str_sql + '`import`,';
      str_sqlR := str_sql + ADOQuery1.Fields[2].AsString + ',';

      //�ύʱ��
      str_sqlL := str_sql + '`createtime`,';
      str_sqlR := str_sql + '''' + ADOQuery1.Fields[3].AsString + ''',';

      //�޸�ʱ��
      str_sqlL := str_sql + '`modifytime`,';
      str_sqlR := str_sql + '''' + ADOQuery1.Fields[4].AsString + ''',';

      //����
      str_sqlL := str_sql + '`content`)';
      str_sqlR := str_sql + '''' + ADOQuery1.Fields[5].AsString + ''');';

      strlst_sql.Add('SqlStr[]=' + str_sqlL + str_sqlR);
      mmo1.Text := str_sql + #13 + #10 + mmo1.Text;
      Log(str_sql);

      ADOQuery1.Next;
      Application.ProcessMessages;
      //mmo1.Text := str_sql + #13 + #10 + mmo1.Text;
    end;

    try
      IdHTTP1.Post(str_server_url, strlst_sql);
      Log('�ύ��' + str_server_url + '���ݳɹ���');
    except
      Log('�ύ��' + str_server_url + '����ʧ�ܣ�');
      Application.MessageBox('�ύ���ݵ������ʧ�ܣ���������������ã�', '��ȡ���������', MB_OK + MB_ICONHAND + MB_DEFBUTTON1 + MB_APPLMODAL);
    end;

  end

end;

procedure TMainForm.btn5Click(Sender: TObject);
begin
  //5��ͬ��SIDΪ0�ļ�¼

  //5.1����ȡSIDΪ0�ļ�¼
//  btn51.Click;

  //5.2����ȡ�������Ӧ���
//  btn52.Click;

end;

procedure TMainForm.btn51Click(Sender: TObject);
var
  i:Integer;
begin
  //5.1����ȡSIDΪ0�ļ�¼
  str_client_id := '';
  //-------------------0--------1
  str_sql := 'SELECT [sid], [id] FROM [mgw_calendar] WHERE [sid]=0';
  ADOQuery1.Close;
  ADOQuery1.SQL.Text := str_sql;
  ADOQuery1.Open;
  if ((not ADOQuery1.Eof) or (not ADOQuery1.Bof)) then
  begin
    ReCount := ADOQuery1.recordcount;
    try
      for i := 1 to ReCount do
      begin
        if (str_client_id = '') then
        begin
          str_client_id := ADOQuery1.Fields[0].AsString;
          str_client_modifytime := ADOQuery1.Fields[1].AsString;
        end
        else
        begin
          str_client_id := str_client_id + ',' + ADOQuery1.Fields[0].AsString;
          str_client_modifytime := str_client_modifytime + ',' + ADOQuery1.Fields[1].AsString;
        end;
        ADOQuery1.Next;
      end;
      mmo1.Text := mmo1.Text + #13 + #10 + str_client_id;
      mmo1.Text := mmo1.Text + #13 + #10 + '---------------';
      mmo1.Text := mmo1.Text + #13 + #10 + str_client_modifytime;

    except
      Application.MessageBox('���ݿ��ѯʧ�ܣ�', '���ݿ�����', MB_OK + MB_ICONHAND + MB_DEFBUTTON1 + MB_APPLMODAL);
    end;
  end
  else
  begin
    Application.MessageBox('������SIDΪ0�ļ�¼��', '���ݿ�����', MB_OK + MB_ICONHAND + MB_DEFBUTTON1 + MB_APPLMODAL);
  end;
  ADOQuery1.Close;
end;

procedure TMainForm.btn52Click(Sender: TObject);
begin
  //5.2����ȡ�������Ӧ���
  try
    str_server_modifytime := IdHTTP1.Get(str_server_url + '?modifyid=' + str_client_id);
    mmo1.Text := mmo1.Text + #13 + #10 + str_server_modifytime;
  except
    Application.MessageBox('��ȡ���������ʧ�ܣ�', '��ȡ���������', MB_OK + MB_ICONHAND + MB_DEFBUTTON1 + MB_APPLMODAL);
  end;
end;

end.
