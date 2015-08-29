program MGWClient;

uses
  Forms,
  MainFrm in 'MainFrm.pas' {MainForm},
  splashFrm in 'splashFrm.pas' {splashForm},
  ClientFunction in 'ClientFunction.pas',
  CalendarFrm in 'CalendarFrm.pas' {CalendarForm},
  ProgressFrm in 'ProgressFrm.pas' {ProgressForm},
  ShowCalendarFrm in 'ShowCalendarFrm.pas' {ShowCalendarForm},
  AddCalendarFrm in 'AddCalendarFrm.pas' {AddCalendarForm},
  InsertTableFrm in 'InsertTableFrm.pas' {InsertTableForm};

{$R *.res}

begin
  {
    Application.Initialize;
    Application.Title := 'Monolith Groupware Client | ��ʯȺ���ͻ���';
    Application.CreateForm(TMainForm, MainForm);
    Application.Run;
  }
  begin
    try
      splashForm := TsplashForm.Create(Application);
      splashForm.Show;
      splashForm.Update;

      Application.Initialize;
      Application.Title := 'Monolith Groupware Client | ��ʯȺ���ͻ���';
      Application.UpdateFormatSettings := FALSE;

      Application.CreateForm(TMainForm, MainForm);
      splashForm.Label1.Caption := '��ҳ��������...';
      splashForm.ProgressBar_Splash.Position := 10;
      splashForm.Update;


      Application.CreateForm(TCalendarForm, CalendarForm);
      splashForm.Label1.Caption := '���˹����ƻ�����������...';
      splashForm.ProgressBar_Splash.Position := 20;
      splashForm.Update;

      Application.CreateForm(TShowCalendarForm, ShowCalendarForm);
      splashForm.Label1.Caption := '���˹����ƻ�������ʾҳ��������...';
      splashForm.ProgressBar_Splash.Position := 30;
      splashForm.Update;

      Application.CreateForm(TAddCalendarForm, AddCalendarForm);
      splashForm.Label1.Caption := '���˹����ƻ���������ҳ��������...';
      splashForm.ProgressBar_Splash.Position := 40;
      splashForm.Update;

      Application.CreateForm(TInsertTableForm, InsertTableForm);
      splashForm.Label1.Caption := '���˹����ƻ����ű���ҳ��������...';
      splashForm.ProgressBar_Splash.Position := 50;
      splashForm.Update;


      Application.CreateForm(TProgressForm, ProgressForm);
      splashForm.Label1.Caption := '���ȴ���������...';
      splashForm.ProgressBar_Splash.Position := 100;
      splashForm.Update;




      Application.Run;
    finally
      splashForm.Close;
      splashForm.Free;
    end;
  end;
end.
