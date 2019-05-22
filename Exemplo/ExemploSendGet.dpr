program ExemploSendGet;

uses
  System.StartUpCopy,
  FMX.Forms,
  Exemplo in 'Exemplo.pas' {fExemplo},
  ShowErro in 'ShowErro.pas' {fShowErro};

{$R *.res}

begin
  Application.Initialize;
  Application.CreateForm(TfExemplo, fExemplo);
  Application.Run;
end.
