unit CalendarFrm;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, ExtCtrls, StdCtrls, jpeg, DB, ADODB, Buttons;

type
  TCalendarForm = class(TForm)
    Shape1: TShape;
    Label1: TLabel;
    img_done_undone_1: TImage;
    img_delete_undone_1: TImage;
    img_edit_undone_1: TImage;
    img_done_undone_2: TImage;
    img_delete_undone_2: TImage;
    img_edit_undone_2: TImage;
    img_delete_undone_3: TImage;
    img_done_undone_3: TImage;
    img_edit_undone_4: TImage;
    img_edit_undone_3: TImage;
    img_delete_undone_4: TImage;
    img_done_undone_4: TImage;
    img_done_undone_5: TImage;
    img_delete_undone_5: TImage;
    img_edit_undone_5: TImage;
    img_done_undone_6: TImage;
    img_delete_undone_6: TImage;
    img_edit_undone_6: TImage;
    img_delete_undone_7: TImage;
    img_done_undone_7: TImage;
    img_edit_undone_7: TImage;
    img_edit_undone_8: TImage;
    img_delete_undone_8: TImage;
    img_done_undone_8: TImage;
    img_done_undone_10: TImage;
    img_done_undone_9: TImage;
    img_delete_undone_9: TImage;
    img_delete_undone_10: TImage;
    img_edit_undone_10: TImage;
    img_edit_undone_9: TImage;
    lbl_undone_1: TLabel;
    lbl_undone_2: TLabel;
    lbl_undone_3: TLabel;
    lbl_undone_4: TLabel;
    lbl_undone_5: TLabel;
    lbl_undone_6: TLabel;
    lbl_undone_7: TLabel;
    lbl_undone_8: TLabel;
    lbl_undone_9: TLabel;
    lbl_undone_10: TLabel;
    ADOQuery1: TADOQuery;
    Button1: TButton;
    lbl_import_undone_1: TLabel;
    lbl_import_undone_2: TLabel;
    lbl_import_undone_3: TLabel;
    lbl_import_undone_4: TLabel;
    lbl_import_undone_5: TLabel;
    lbl_import_undone_6: TLabel;
    lbl_import_undone_7: TLabel;
    lbl_import_undone_8: TLabel;
    lbl_import_undone_9: TLabel;
    lbl_import_undone_10: TLabel;
    btn_calendar_add: TSpeedButton;
    btn_calendar_more: TSpeedButton;
    procedure FormCreate(Sender: TObject);
    procedure Button1Click(Sender: TObject);

    //lbl移动方式
    procedure lbl_MouseEnter(Sender: TObject);
    procedure lbl_MouseLeave(Sender: TObject);

    //点击Label显示Calendar
    procedure lbl_Click(Sender: TObject);
    procedure btn_calendar_addClick(Sender: TObject);

    //编辑图片标记
    procedure edit_Click(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  CalendarForm: TCalendarForm;

  //Label，Image控件数组
  img_edit_undone: array[1..10] of TImage;
  img_delete_undone: array[1..10] of TImage;
  img_done_undone: array[1..10] of TImage;

  lbl_undone: array[1..10] of TLabel;
  lbl_import_undone: array[1..10] of TLabel;

  //查询字符串
  strSql: string;

  //数据库记录数
  ReCount: Integer;



implementation

uses MainFrm, ClientFunction, AddCalendarFrm;

{$R *.dfm}

procedure TCalendarForm.FormCreate(Sender: TObject);
var
  i: Integer;
begin
  CalendarForm.Color := RGB(255, 255, 255);

  //初始化面板
  Shape1.Pen.Color := RGB(204, 204, 204);
  Shape1.Brush.Color := RGB(255, 238, 238);

  //将label对象付给label数组
  lbl_undone[1] := lbl_undone_1;
  lbl_undone[2] := lbl_undone_2;
  lbl_undone[3] := lbl_undone_3;
  lbl_undone[4] := lbl_undone_4;
  lbl_undone[5] := lbl_undone_5;
  lbl_undone[6] := lbl_undone_6;
  lbl_undone[7] := lbl_undone_7;
  lbl_undone[8] := lbl_undone_8;
  lbl_undone[9] := lbl_undone_9;
  lbl_undone[10] := lbl_undone_10;

  //
  lbl_import_undone[1] := lbl_import_undone_1;
  lbl_import_undone[2] := lbl_import_undone_2;
  lbl_import_undone[3] := lbl_import_undone_3;
  lbl_import_undone[4] := lbl_import_undone_4;
  lbl_import_undone[5] := lbl_import_undone_5;
  lbl_import_undone[6] := lbl_import_undone_6;
  lbl_import_undone[7] := lbl_import_undone_7;
  lbl_import_undone[8] := lbl_import_undone_8;
  lbl_import_undone[9] := lbl_import_undone_9;
  lbl_import_undone[10] := lbl_import_undone_10;


  //
  img_edit_undone[1] := img_edit_undone_1;
  img_edit_undone[2] := img_edit_undone_2;
  img_edit_undone[3] := img_edit_undone_3;
  img_edit_undone[4] := img_edit_undone_4;
  img_edit_undone[5] := img_edit_undone_5;
  img_edit_undone[6] := img_edit_undone_6;
  img_edit_undone[7] := img_edit_undone_7;
  img_edit_undone[8] := img_edit_undone_8;
  img_edit_undone[9] := img_edit_undone_9;
  img_edit_undone[10] := img_edit_undone_10;

  //
  img_delete_undone[1] := img_delete_undone_1;
  img_delete_undone[2] := img_delete_undone_2;
  img_delete_undone[3] := img_delete_undone_3;
  img_delete_undone[4] := img_delete_undone_4;
  img_delete_undone[5] := img_delete_undone_5;
  img_delete_undone[6] := img_delete_undone_6;
  img_delete_undone[7] := img_delete_undone_7;
  img_delete_undone[8] := img_delete_undone_8;
  img_delete_undone[9] := img_delete_undone_9;
  img_delete_undone[10] := img_delete_undone_10;

  //
  img_done_undone[1] := img_done_undone_1;
  img_done_undone[2] := img_done_undone_2;
  img_done_undone[3] := img_done_undone_3;
  img_done_undone[4] := img_done_undone_4;
  img_done_undone[5] := img_done_undone_5;
  img_done_undone[6] := img_done_undone_6;
  img_done_undone[7] := img_done_undone_7;
  img_done_undone[8] := img_done_undone_8;
  img_done_undone[9] := img_done_undone_9;
  img_done_undone[10] := img_done_undone_10;

  for i := 1 to 10 do
  begin
    //属性
    lbl_undone[i].Left := 105;
    lbl_undone[i].Width := 370;
    lbl_undone[i].AutoSize := false;
    lbl_undone[i].Transparent := true;
    lbl_undone[i].Font.Color := RGB(25, 5, 82);
    lbl_undone[i].Hide;

    //方法

    lbl_import_undone[i].Width := 30;
    lbl_import_undone[i].AutoSize := false;
    lbl_import_undone[i].Transparent := true;
    lbl_import_undone[i].Hide;

    img_edit_undone[i].AutoSize := true;
    img_edit_undone[i].Transparent := true;
    img_edit_undone[i].Hide;
    img_edit_undone[i].Left := 85;

    img_delete_undone[i].AutoSize := true;
    img_delete_undone[i].Transparent := true;
    img_delete_undone[i].Hide;

    img_done_undone[i].AutoSize := true;
    img_done_undone[i].Transparent := true;
    img_done_undone[i].Hide;

  end;

end;

procedure TCalendarForm.Button1Click(Sender: TObject);
var
  i: Integer;
begin
  //连接数据库
  MainForm.btn0Click(Self);
  ADOQuery1.Connection := MainForm.ADOConn;

  //获取记录数
//  strSql := 'SELECT Top 9 * FROM [monolithpro_product] WHERE [cateid]=' + userid;
  strSql := 'SELECT Top 10 * FROM [mgw_calendar]';
  strSql := strSql + ' WHERE [isdone]=0';
  strSql := strSql + ' ORDER BY [import] DESC , [createtime] ASC';
  //存储调试信息
  Log(strSql);

  ADOQuery1.SQL.Text := strSql;
  ADOQuery1.Open;
  ReCount := ADOQuery1.recordcount;

  try
    for i := 1 to ReCount do
    begin
      //intId := ADOQuery1.FieldByName('id').AsInteger;
      //strCount := ADOQuery1.FieldByName('count').AsString;

      lbl_undone[i].Caption := ADOQuery1.FieldByName('title').AsString;
      lbl_undone[i].Tag := ADOQuery1.FieldByName('id').AsInteger;
      lbl_undone[i].Show;

      lbl_import_undone[i].Caption := '【' + ADOQuery1.FieldByName('import').AsString + '】';
      lbl_import_undone[i].Show;

      case ADOQuery1.FieldByName('import').AsInteger of
        1: lbl_import_undone[i].Font.Color := RGB(0, 0, 0);
        2: lbl_import_undone[i].Font.Color := RGB(0, 255, 0);
        3: lbl_import_undone[i].Font.Color := RGB(0, 0, 255);
        4: lbl_import_undone[i].Font.Color := RGB(255, 153, 102);
        5: lbl_import_undone[i].Font.Color := RGB(255, 0, 0);
      end;

      //编辑按钮
      img_edit_undone[i].Show;
      img_edit_undone[i].Tag := ADOQuery1.FieldByName('id').AsInteger;

      //删除
      img_delete_undone[i].Show;
      img_delete_undone[i].Tag := ADOQuery1.FieldByName('id').AsInteger;

      //完成
      img_done_undone[i].Show;
      img_done_undone[i].Tag := ADOQuery1.FieldByName('id').AsInteger;

      ADOQuery1.Next;
    end;

  except

  end;
  ADOQuery1.Close;
end;

procedure TCalendarForm.lbl_MouseEnter(Sender: TObject);
begin
  //类似超链接
  (Sender as TLabel).Font.Style := [fsUnderline];
  (Sender as TLabel).Font.Color := RGB(41, 9, 138);
  (Sender as TLabel).Cursor := crHandPoint;

end;

procedure TCalendarForm.lbl_MouseLeave(Sender: TObject);
begin
  //类似超链接
  (Sender as TLabel).Font.Style := [];
  (Sender as TLabel).Font.Color := RGB(25, 5, 82);

end;

procedure TCalendarForm.lbl_Click(Sender: TObject);
begin
  //类似超链接
  ShowCalendar((Sender as TLabel).Tag);
end;

procedure TCalendarForm.btn_calendar_addClick(Sender: TObject);
begin
  AddCalendarForm.btn_add.Show;
  AddCalendarForm.btn_edt.Hide;
  AddCalendarForm.Caption := ' 工作计划管理 >> 工作计划添加';
  AddCalendarForm.Edt_title.Text:='';
  AddCalendarForm.Memo1.Clear;
  AddCalendarForm.Timer1.Enabled:=True;
  AddCalendarForm.ShowModal;
end;

procedure TCalendarForm.edit_Click(Sender: TObject);
begin
  //修改Calendar
  EditCalendar((Sender as TImage).Tag);
end;

end.

