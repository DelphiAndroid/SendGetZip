unit ShowErro;

interface

uses
  System.SysUtils, System.Types, System.UITypes, System.Classes, System.Variants,
  FMX.Types, FMX.Controls, FMX.Forms, FMX.Graphics, FMX.Dialogs, FMX.StdCtrls,
  FMX.Controls.Presentation, FMX.ScrollBox, FMX.Memo;

type
  TfShowErro = class(TForm)
    Memo1: TMemo;
    Panel1: TPanel;
    fShowErro: TButton;
    procedure fShowErroClick(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
  end;

  procedure ShowMsgErro(Msg:String);

var
  fShowErro: TfShowErro;

implementation

{$R *.fmx}

procedure ShowMsgErro(Msg:String);
begin
    Application.CreateForm(TfShowErro, fShowErro);
    fShowErro.Memo1.Lines.Text := msg;
    fShowErro.ShowModal;
end;

procedure TfShowErro.fShowErroClick(Sender: TObject);
begin
  Close();
end;

end.
