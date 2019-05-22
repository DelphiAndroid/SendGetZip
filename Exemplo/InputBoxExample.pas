unit InputBoxExample;

interface

uses
  System.SysUtils, System.Types, System.UITypes, System.Classes, System.Variants,
  FMX.Types, FMX.Controls, FMX.Forms, FMX.Graphics, FMX.Dialogs, FMX.StdCtrls,
  FMX.Edit, FMX.Controls.Presentation;

type
  TForm2 = class(TForm)
    Label1: TLabel;
    Edit1: TEdit;
    Button1: TButton;
    Edit2: TEdit;
    Label2: TLabel;
    procedure FormClose(Sender: TObject; var Action: TCloseAction);
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  Form2: TForm2;


implementation

{$R *.fmx}

uses Exemplo;



procedure TForm2.FormClose(Sender: TObject; var Action: TCloseAction);
begin
  Action := TCloseAction.CaFree;
end;

end.
