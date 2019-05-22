program Project1;

uses
  System.StartUpCopy,
  FMX.Forms,
  Exemplo in 'Exemplo.pas' {Form1},
  SendGet in 'SendGet.pas';

{$R *.res}

begin
  Application.Initialize;
  Application.CreateForm(TForm1, Form1);
  Application.Run;
end.
