unit AddCalendarFrm;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, DB, ExtDlgs, Menus, ImgList, StdCtrls, ComCtrls, Spin, ToolWin,
  ExtCtrls, OleCtrls, DHTMLEDLib_TLB;

type
  TAddCalendarForm = class(TForm)
    GroupBox1: TGroupBox;
    DHTML_content: TDHTMLSafe;
    Panel1: TPanel;
    Panel3: TPanel;
    Btn_Close: TButton;
    btn_add: TButton;
    Panel2: TPanel;
    Label1: TLabel;
    Label2: TLabel;
    Label3: TLabel;
    Edt_title: TEdit;
    ToolBar1: TToolBar;
    ToolButton3: TToolButton;
    ToolButton4: TToolButton;
    ToolButton5: TToolButton;
    ToolButton6: TToolButton;
    ToolButton7: TToolButton;
    ToolButton8: TToolButton;
    ToolButton9: TToolButton;
    ToolButton10: TToolButton;
    ToolButton11: TToolButton;
    ToolButton12: TToolButton;
    ToolButton13: TToolButton;
    ToolButton14: TToolButton;
    ToolButton15: TToolButton;
    ToolButton16: TToolButton;
    ToolButton17: TToolButton;
    ToolButton18: TToolButton;
    ToolButton19: TToolButton;
    ToolButton20: TToolButton;
    ToolButton21: TToolButton;
    ToolButton22: TToolButton;
    ToolButton25: TToolButton;
    ToolButton26: TToolButton;
    ToolButton27: TToolButton;
    ToolButton2: TToolButton;
    ToolButton23: TToolButton;
    ToolButton24: TToolButton;
    cbb_import: TComboBox;
    ImageList1: TImageList;
    ColorDialog1: TColorDialog;
    PopupMenu3: TPopupMenu;
    N1rkke1: TMenuItem;
    N1x11: TMenuItem;
    N1x21: TMenuItem;
    N1x31: TMenuItem;
    N1x41: TMenuItem;
    N1x51: TMenuItem;
    N2rkker1: TMenuItem;
    N2x11: TMenuItem;
    N2x21: TMenuItem;
    N2x31: TMenuItem;
    N2x41: TMenuItem;
    N2x51: TMenuItem;
    N3rkker1: TMenuItem;
    N3x11: TMenuItem;
    N3x21: TMenuItem;
    N3x31: TMenuItem;
    N3x41: TMenuItem;
    N3x51: TMenuItem;
    N4rkker1: TMenuItem;
    N4x11: TMenuItem;
    N4x21: TMenuItem;
    N4x31: TMenuItem;
    N4x41: TMenuItem;
    N4x51: TMenuItem;
    N5rkker1: TMenuItem;
    N5x11: TMenuItem;
    N5x21: TMenuItem;
    N5x31: TMenuItem;
    N5x41: TMenuItem;
    N5x51: TMenuItem;
    N4: TMenuItem;
    Indstrkke1: TMenuItem;
    Indstkolonne1: TMenuItem;
    Indstcelle1: TMenuItem;
    Delcelle1: TMenuItem;
    N5: TMenuItem;
    Sletrkke1: TMenuItem;
    Sletkolonne1: TMenuItem;
    Sletcelle1: TMenuItem;
    ImageList2: TImageList;
    OpenPictureDialog1: TOpenPictureDialog;
    DataSource1: TDataSource;
    lbl_id: TLabel;
    Memo1: TMemo;
    Timer1: TTimer;
    btn_edt: TButton;
    procedure Btn_CloseClick(Sender: TObject);
    procedure btn_addClick(Sender: TObject);
    procedure ToolButton4Click(Sender: TObject);
    procedure ToolButton3Click(Sender: TObject);
    procedure ToolButton5Click(Sender: TObject);
    procedure ToolButton6Click(Sender: TObject);
    procedure ToolButton8Click(Sender: TObject);
    procedure ToolButton9Click(Sender: TObject);
    procedure ToolButton10Click(Sender: TObject);
    procedure ToolButton12Click(Sender: TObject);
    procedure ToolButton13Click(Sender: TObject);
    procedure ToolButton15Click(Sender: TObject);
    procedure ToolButton16Click(Sender: TObject);
    procedure ToolButton18Click(Sender: TObject);
    procedure ToolButton19Click(Sender: TObject);
    procedure ToolButton20Click(Sender: TObject);
    procedure ToolButton22Click(Sender: TObject);
    procedure ToolButton26Click(Sender: TObject);
    procedure ToolButton2Click(Sender: TObject);
    procedure ToolButton23Click(Sender: TObject);
    procedure ToolButton24Click(Sender: TObject);
    procedure Indstrkke1Click(Sender: TObject);
    procedure Indstkolonne1Click(Sender: TObject);
    procedure Indstcelle1Click(Sender: TObject);
    procedure Delcelle1Click(Sender: TObject);
    procedure Sletrkke1Click(Sender: TObject);
    procedure Sletkolonne1Click(Sender: TObject);
    procedure Sletcelle1Click(Sender: TObject);
    procedure N1x11Click(Sender: TObject);
    procedure N1x21Click(Sender: TObject);
    procedure N1x31Click(Sender: TObject);
    procedure N1x41Click(Sender: TObject);
    procedure N1x51Click(Sender: TObject);
    procedure N2x11Click(Sender: TObject);
    procedure N2x21Click(Sender: TObject);
    procedure N2x31Click(Sender: TObject);
    procedure N2x41Click(Sender: TObject);
    procedure N2x51Click(Sender: TObject);
    procedure N3x11Click(Sender: TObject);
    procedure N3x21Click(Sender: TObject);
    procedure N3x31Click(Sender: TObject);
    procedure N3x41Click(Sender: TObject);
    procedure N3x51Click(Sender: TObject);
    procedure N4x11Click(Sender: TObject);
    procedure N4x21Click(Sender: TObject);
    procedure N4x31Click(Sender: TObject);
    procedure N4x41Click(Sender: TObject);
    procedure N4x51Click(Sender: TObject);
    procedure N5x11Click(Sender: TObject);
    procedure N5x21Click(Sender: TObject);
    procedure N5x31Click(Sender: TObject);
    procedure N5x41Click(Sender: TObject);
    procedure N5x51Click(Sender: TObject);
    procedure DHTML_contentDisplayChanged(Sender: TObject);
    procedure PopupMenu3Popup(Sender: TObject);
    procedure Timer1Timer(Sender: TObject);
    procedure FormCreate(Sender: TObject);
    procedure btn_edtClick(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  AddCalendarForm: TAddCalendarForm;
  str_TablePre: string;

implementation

uses ClientFunction, MainFrm, InsertTableFrm, CalendarFrm;

{$R *.dfm}

procedure TAddCalendarForm.Btn_CloseClick(Sender: TObject);
begin
  Close;
end;

procedure TAddCalendarForm.btn_addClick(Sender: TObject);
var
  About_content: Ansistring;
  SqlL, SqlR: string;

  {
  //需要替换的图片
  PicStringList: TStringList;

  //原文件名（全）， 缓存文件名（全），服务端名（相对）
  FileName_Old, FileName_Cache, FileName_Server: string;

  i: integer;
  }

  //可否提交
  CanInsert: boolean;
begin
  CanInsert := true;

  //内容
  About_content := DHTML_content.DOM.body.outerHTML;
  About_content := StringReplace(About_content, '<BODY><P>', '',
    [rfReplaceAll]);
  About_content := StringReplace(About_content, '</P></BODY>', '',
    [rfReplaceAll]);
  About_content := StringReplace(About_content, '<BODY>', '',
    [rfReplaceAll]);
  About_content := StringReplace(About_content, '</BODY>', '',
    [rfReplaceAll]);
  About_content := StringReplace(About_content, 'src="', 'SRC="',
    [rfReplaceAll]);

  if (About_content = '') then
  begin
    CanInsert := false;
    MessageBox(handle, '特别标题或内容不能为空！', pchar(caption),
      mb_IconInformation);
  end;

  if CanInsert then
  begin

    //插入图片 ,该版本暂不实现
    {
    PicStringList := TStringList.Create;
    PicStringList := CatchPic(About_content, PicStringList);

    Log('复制图片文件到缓存并上传');
    Log('共有' + inttostr(PicStringList.Count) + '张图片需要上传！');
    for i := 0 to PicStringList.Count - 1 do
      begin
        FileName_Old := PicStringList.Strings[i];
        FileName_Cache := CopyToCache(FileName_Old, i);
        FileName_Server := UpLoadFile(FileName_Cache);
        About_content := StringReplace(About_content, FileName_Old,
          ClientSettingForm.Edt_Website.Text + '/' + FileName_Server,
          [rfReplaceAll]);
      end;
    PicStringList.Free;
    }
    //添加一个Calendar
    SqlL := 'insert into [mgw_calendar] (';
    SqlR := 'values (';

    //所属用户
    SqlL := SqlL + 'userid,';
    SqlR := SqlR + '''' + IntToStr(1) + ''',';

    //标题
    SqlL := SqlL + '[title],';
    SqlR := SqlR + '''' + Edt_title.Text + ''',';

    //关键度
    SqlL := SqlL + '[import], ';
    SqlR := SqlR + '''' + cbb_import.Items.Strings[cbb_import.ItemIndex] + ''',';

    //提交时间
    SqlL := SqlL + '[createtime], ';
    SqlR := SqlR + '''' + FormatDateTime('yyyy-mm-dd hh:mm:ss', Now) +
      ''',';

    //修改时间
    SqlL := SqlL + '[modifytime], ';
    SqlR := SqlR + '''' + FormatDateTime('yyyy-mm-dd hh:mm:ss', Now) +
      ''',';

    //内容
    SqlL := SqlL + '[content])';
    SqlR := SqlR + '''' + About_content + ''');';

    Log('工作计划管理 >> 工作计划添加提交SQL语句：' + SqlL + SqlR);
    try
      MainForm.btn0.Click;
      MainForm.ADOQuery1.Close;
      MainForm.ADOQuery1.SQL.Text := SqlL + SqlR;
      MainForm.ADOQuery1.ExecSQL;
      Log('文章提交成功！提交的SQL语句为：' + SqlL + SqlR);
      MessageBox(handle, '工作计划管理 >> 工作计划添加提交成功！', pchar(caption), mb_IconInformation);
      CalendarForm.Button1.Click;
      AddCalendarForm.Close;

    except
      Log('工作计划管理 >> 工作计划添加失败！');
    end;

  end;
end;

procedure TAddCalendarForm.ToolButton4Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_BOLD, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton3Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_FONT, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton5Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_ITALIC, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton6Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_UNDERLINE, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton8Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_JUSTIFYLEFT, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton9Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_JUSTIFYCENTER, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton10Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_JUSTIFYRIGHT, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton12Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_INDENT, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton13Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_OUTDENT, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton15Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_ORDERLIST, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton16Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_UNORDERLIST, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton18Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_DELETE, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton19Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_UNDO, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton20Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_REDO, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton22Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_FINDTEXT, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton26Click(Sender: TObject);
begin
  InsertTableForm.ShowModal;
end;

procedure TAddCalendarForm.ToolButton2Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_IMAGE, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton23Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_HYPERLINK, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.ToolButton24Click(Sender: TObject);
var
  i: integer;
  Range: OleVariant;
begin
  Range := DHTML_content.DOM.selection.createRange;
  if OpenPictureDialog1.Execute then
  begin
    for i := 0 to OpenPictureDialog1.Files.Count - 1 do
    begin
      Range.pasteHTML('<IMG alt="" hspace=0 SRC="' +
        OpenPictureDialog1.Files.Strings[i] +
        '" align=baseline border=0>');
    end;
  end;
end;

procedure TAddCalendarForm.Indstrkke1Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_INSERTROW, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.Indstkolonne1Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_INSERTCOL, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.Indstcelle1Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_INSERTCELL, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.Delcelle1Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_SPLITCELL, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.Sletrkke1Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_DELETEROWS, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.Sletkolonne1Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_DELETECOLS, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.Sletcelle1Click(Sender: TObject);
begin
  DHTML_content.ExecCommand(DECMD_DELETECELLS, OLECMDEXECOPT_DODEFAULT);
end;

procedure TAddCalendarForm.N1x11Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '1';
  InsertTableForm.SpinEdit2.Text := '1';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N1x21Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '1';
  InsertTableForm.SpinEdit2.Text := '2';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N1x31Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '1';
  InsertTableForm.SpinEdit2.Text := '3';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N1x41Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '1';
  InsertTableForm.SpinEdit2.Text := '4';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N1x51Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '1';
  InsertTableForm.SpinEdit2.Text := '5';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N2x11Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '2';
  InsertTableForm.SpinEdit2.Text := '1';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N2x21Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '2';
  InsertTableForm.SpinEdit2.Text := '2';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N2x31Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '2';
  InsertTableForm.SpinEdit2.Text := '3';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N2x41Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '2';
  InsertTableForm.SpinEdit2.Text := '4';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N2x51Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '2';
  InsertTableForm.SpinEdit2.Text := '5';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N3x11Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '3';
  InsertTableForm.SpinEdit2.Text := '1';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N3x21Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '3';
  InsertTableForm.SpinEdit2.Text := '2';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N3x31Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '3';
  InsertTableForm.SpinEdit2.Text := '3';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N3x41Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '3';
  InsertTableForm.SpinEdit2.Text := '4';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N3x51Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '3';
  InsertTableForm.SpinEdit2.Text := '5';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N4x11Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '4';
  InsertTableForm.SpinEdit2.Text := '1';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N4x21Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '4';
  InsertTableForm.SpinEdit2.Text := '2';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N4x31Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '4';
  InsertTableForm.SpinEdit2.Text := '3';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N4x41Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '4';
  InsertTableForm.SpinEdit2.Text := '4';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N4x51Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '4';
  InsertTableForm.SpinEdit2.Text := '5';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N5x11Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '5';
  InsertTableForm.SpinEdit2.Text := '1';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N5x21Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '5';
  InsertTableForm.SpinEdit2.Text := '2';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N5x31Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '5';
  InsertTableForm.SpinEdit2.Text := '3';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N5x41Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '5';
  InsertTableForm.SpinEdit2.Text := '4';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.N5x51Click(Sender: TObject);
begin
  InsertTableForm.SpinEdit1.Text := '5';
  InsertTableForm.SpinEdit2.Text := '5';
  InsertTableForm.SpeedButton8.Click;
end;

procedure TAddCalendarForm.DHTML_contentDisplayChanged(Sender: TObject);
var
  state: DHTMLEDITCMDF;
begin
  state := DHTML_content.QueryStatus(DECMD_BOLD);
  if state = DECMDF_LATCHED then
    ToolButton4.Down := true
  else
    ToolButton4.Down := false;

  state := DHTML_content.QueryStatus(DECMD_ITALIC);
  if state = DECMDF_LATCHED then
    ToolButton5.Down := true
  else
    ToolButton5.Down := false;

  state := DHTML_content.QueryStatus(DECMD_UNDERLINE);
  if state = DECMDF_LATCHED then
    ToolButton6.Down := true
  else
    ToolButton6.Down := false;

  state := DHTML_content.QueryStatus(DECMD_JUSTIFYLEFT);
  if state = DECMDF_LATCHED then
    ToolButton8.Down := true
  else
    ToolButton8.Down := false;

  state := DHTML_content.QueryStatus(DECMD_JUSTIFYCENTER);
  if state = DECMDF_LATCHED then
    ToolButton9.Down := true
  else
    ToolButton9.Down := false;

  state := DHTML_content.QueryStatus(DECMD_JUSTIFYRIGHT);
  if state = DECMDF_LATCHED then
    ToolButton10.Down := true
  else
    ToolButton10.Down := false;

  state := DHTML_content.QueryStatus(DECMD_ORDERLIST);
  if state = DECMDF_LATCHED then
    ToolButton15.Down := true
  else
    ToolButton15.Down := false;

  state := DHTML_content.QueryStatus(DECMD_UNORDERLIST);
  if state = DECMDF_LATCHED then
    ToolButton16.Down := true
  else
    ToolButton16.Down := false;

end;

procedure TAddCalendarForm.PopupMenu3Popup(Sender: TObject);
var
  state: DHTMLEDITCMDF;
begin
  state := DHTML_content.QueryStatus(DECMD_INSERTROW);
  if state >= DECMDF_ENABLED then
  begin
    Indstrkke1.Visible := true;
    Indstkolonne1.Visible := true;
    Indstcelle1.Visible := true;
    Delcelle1.Visible := true;
    Sletrkke1.Visible := true;
    Sletkolonne1.Visible := true;
    Sletcelle1.Visible := true;
    N1rkke1.Visible := false;
    N2rkker1.Visible := false;
    N3rkker1.Visible := false;
    N4rkker1.Visible := false;
    N5rkker1.Visible := false;
  end
  else
  begin
    Indstrkke1.Visible := false;
    Indstkolonne1.Visible := false;
    Indstcelle1.Visible := false;
    Delcelle1.Visible := false;
    Sletrkke1.Visible := false;
    Sletkolonne1.Visible := false;
    Sletcelle1.Visible := false;
    N1rkke1.Visible := true;
    N2rkker1.Visible := true;
    N3rkker1.Visible := true;
    N4rkker1.Visible := true;
    N5rkker1.Visible := true;
  end;
end;

procedure TAddCalendarForm.Timer1Timer(Sender: TObject);
begin
  DHTML_content.DOM.body.innerHTML := Memo1.Text;
  Timer1.Enabled := false;
end;

procedure TAddCalendarForm.FormCreate(Sender: TObject);
begin
  lbl_id.Hide;
  Memo1.Hide;

  //按钮位置
  btn_edt.Left := btn_add.Left;
end;

procedure TAddCalendarForm.btn_edtClick(Sender: TObject);
var
  About_content: Ansistring;
  SqlL, SqlR: string;

  {
  //需要替换的图片
  PicStringList: TStringList;

  //原文件名（全）， 缓存文件名（全），服务端名（相对）
  FileName_Old, FileName_Cache, FileName_Server: string;

  i: integer;
  }

  //可否提交
  CanInsert: boolean;
begin
  CanInsert := true;

  //内容
  About_content := DHTML_content.DOM.body.outerHTML;
  About_content := StringReplace(About_content, '<BODY><P>', '',
    [rfReplaceAll]);
  About_content := StringReplace(About_content, '</P></BODY>', '',
    [rfReplaceAll]);
  About_content := StringReplace(About_content, '<BODY>', '',
    [rfReplaceAll]);
  About_content := StringReplace(About_content, '</BODY>', '',
    [rfReplaceAll]);
  About_content := StringReplace(About_content, 'src="', 'SRC="',
    [rfReplaceAll]);

  if (About_content = '') then
  begin
    CanInsert := false;
    MessageBox(handle, '特别标题或内容不能为空！', pchar(caption),
      mb_IconInformation);
  end;

  if CanInsert then
  begin

    //插入图片 ,该版本暂不实现
    {
    PicStringList := TStringList.Create;
    PicStringList := CatchPic(About_content, PicStringList);

    Log('复制图片文件到缓存并上传');
    Log('共有' + inttostr(PicStringList.Count) + '张图片需要上传！');
    for i := 0 to PicStringList.Count - 1 do
      begin
        FileName_Old := PicStringList.Strings[i];
        FileName_Cache := CopyToCache(FileName_Old, i);
        FileName_Server := UpLoadFile(FileName_Cache);
        About_content := StringReplace(About_content, FileName_Old,
          ClientSettingForm.Edt_Website.Text + '/' + FileName_Server,
          [rfReplaceAll]);
      end;
    PicStringList.Free;
    }
    //编辑一个Calendar
    SqlL := 'UPDATE [mgw_calendar] SET';

    //标题
    SqlL := SqlL + '[title]=';
    SqlL := SqlL + '''' + Edt_title.Text + ''',';

    //关键度
    SqlL := SqlL + '[import]=';
    SqlL := SqlL + '''' + cbb_import.Items.Strings[cbb_import.ItemIndex] + ''',';

    //修改时间
    SqlL := SqlL + '[modifytime]=';
    SqlL := SqlL + '''' + FormatDateTime('yyyy-mm-dd hh:mm:ss', Now) + ''',';

    //内容
    SqlL := SqlL + '[content]=';
    SqlL := SqlL + '''' + About_content + '''';

    //id
    SqlL := SqlL + ' WHERE [id]=' + lbl_id.caption;


    Log('工作计划管理 >> 工作计划修改提交SQL语句：' + SqlL + SqlR);
    try
      MainForm.btn0.Click;
      MainForm.ADOQuery1.Close;
      MainForm.ADOQuery1.SQL.Text := SqlL + SqlR;
      MainForm.ADOQuery1.ExecSQL;
      Log('文章修改成功！提交的SQL语句为：' + SqlL + SqlR);
      MessageBox(handle, '工作计划管理 >> 工作计划修改提交成功！', pchar(caption), mb_IconInformation);
      CalendarForm.Button1.Click;
      AddCalendarForm.Close;

    except
      Log('工作计划管理 >> 工作计划修改失败！');
    end;

  end;
end;

end.

